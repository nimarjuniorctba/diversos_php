<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/db.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

function jsonResponse(array $data, int $status = 200): never
{
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function periodRange(string $period): array
{
    $now = new DateTimeImmutable('now');
    $today = $now->setTime(0, 0);

    return match ($period) {
        'ontem' => [$today->modify('-1 day'), $today],
        'semana' => [$today->modify('monday this week'), $now],
        'mes' => [$today->modify('first day of this month'), $now],
        default => [$today, $now],
    };
}

function haversine(float $lat1, float $lon1, float $lat2, float $lon2): float
{
    $earthRadiusKm = 6371.0088;
    $latDelta = deg2rad($lat2 - $lat1);
    $lonDelta = deg2rad($lon2 - $lon1);
    $a = sin($latDelta / 2) ** 2
        + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($lonDelta / 2) ** 2;

    return $earthRadiusKm * 2 * atan2(sqrt($a), sqrt(1 - $a));
}

try {
    $period = (string) ($_GET['periodo'] ?? 'hoje');
    if (!in_array($period, ['hoje', 'ontem', 'semana', 'mes'], true)) {
        $period = 'hoje';
    }

    $driverId = filter_input(INPUT_GET, 'condutor', FILTER_VALIDATE_INT);
    $driverId = $driverId !== false && $driverId !== null && $driverId > 0 ? $driverId : null;
    $appStatus = (string) ($_GET['status'] ?? '');
    if (!in_array($appStatus, ['a', 'i'], true)) {
        $appStatus = '';
    }
    [$start, $end] = periodRange($period);

    $driversSql = "
        SELECT con_id, con_nome, con_placa, con_telefone, con_app_status
        FROM mod_condutor
        WHERE con_cad_status = 'a'
    ";
    $driversParams = [];
    if ($appStatus !== '') {
        $driversSql .= ' AND con_app_status = :status_app';
        $driversParams[':status_app'] = $appStatus;
    }
    $driversSql .= ' ORDER BY con_nome';

    $driversStatement = db()->prepare($driversSql);
    $driversStatement->execute($driversParams);
    $availableDrivers = $driversStatement->fetchAll();

    $statusTotals = db()->query("
        SELECT
            SUM(con_app_status = 'a') AS online,
            SUM(con_app_status = 'i') AS offline
        FROM mod_condutor
        WHERE con_cad_status = 'a'
    ")->fetch();

    $sql = "
        SELECT
            l.loc_id,
            CAST(l.loc_latitude AS DECIMAL(10,8)) AS latitude,
            CAST(l.loc_longitude AS DECIMAL(11,8)) AS longitude,
            l.loc_velocidade AS velocidade,
            DATE_FORMAT(l.loc_dt_cadastro, '%Y-%m-%d %H:%i:%s') AS enviado_em,
            c.con_id,
            c.con_nome,
            c.con_placa,
            c.con_telefone,
            c.con_app_status
        FROM mod_localizacao l
        INNER JOIN mod_condutor c ON c.con_id = l.con_id_fk
        WHERE c.con_cad_status = 'a'
          AND l.loc_dt_cadastro >= :inicio
          AND l.loc_dt_cadastro <= :fim
          AND l.loc_latitude IS NOT NULL
          AND l.loc_longitude IS NOT NULL
          AND l.loc_latitude BETWEEN -90 AND 90
          AND l.loc_longitude BETWEEN -180 AND 180
    ";

    $params = [
        ':inicio' => $start->format('Y-m-d H:i:s'),
        ':fim' => $end->format('Y-m-d H:i:s'),
    ];

    if ($driverId !== null) {
        $sql .= ' AND c.con_id = :condutor';
        $params[':condutor'] = $driverId;
    }

    if ($appStatus !== '') {
        $sql .= ' AND c.con_app_status = :status_app';
        $params[':status_app'] = $appStatus;
    }

    $sql .= ' ORDER BY c.con_id, l.loc_dt_cadastro, l.loc_id';
    $statement = db()->prepare($sql);
    $statement->execute($params);

    $drivers = [];
    $lastReceived = null;
    $pointCount = 0;
    $totalDistance = 0.0;

    foreach ($statement->fetchAll() as $row) {
        $id = (int) $row['con_id'];
        if (!isset($drivers[$id])) {
            $drivers[$id] = [
                'id' => $id,
                'nome' => $row['con_nome'] ?: 'Condutor sem nome',
                'placa' => $row['con_placa'] ?: 'Sem placa',
                'telefone' => $row['con_telefone'],
                'app_ativo' => $row['con_app_status'] === 'a',
                'distancia_km' => 0.0,
                'pontos' => [],
            ];
        }

        $point = [
            'id' => (int) $row['loc_id'],
            'latitude' => (float) $row['latitude'],
            'longitude' => (float) $row['longitude'],
            'velocidade' => $row['velocidade'] !== null ? (float) $row['velocidade'] : null,
            'enviado_em' => $row['enviado_em'],
        ];

        $points =& $drivers[$id]['pontos'];
        $previous = $points !== [] ? $points[array_key_last($points)] : null;
        if ($previous !== null) {
            $segment = haversine(
                $previous['latitude'],
                $previous['longitude'],
                $point['latitude'],
                $point['longitude']
            );
            $drivers[$id]['distancia_km'] += $segment;
            $totalDistance += $segment;
        }

        $points[] = $point;
        unset($points);
        $pointCount++;

        if ($lastReceived === null || $row['enviado_em'] > $lastReceived) {
            $lastReceived = $row['enviado_em'];
        }
    }

    foreach ($drivers as &$driver) {
        $driver['distancia_km'] = round($driver['distancia_km'], 2);
        $driver['ultima_posicao'] = $driver['pontos'][array_key_last($driver['pontos'])] ?? null;
    }
    unset($driver);

    jsonResponse([
        'ok' => true,
        'periodo' => [
            'tipo' => $period,
            'inicio' => $start->format(DateTimeInterface::ATOM),
            'fim' => $end->format(DateTimeInterface::ATOM),
        ],
        'condutores_disponiveis' => array_map(static fn(array $driver): array => [
            'id' => (int) $driver['con_id'],
            'nome' => $driver['con_nome'] ?: 'Condutor sem nome',
            'placa' => $driver['con_placa'] ?: 'Sem placa',
            'app_ativo' => $driver['con_app_status'] === 'a',
        ], $availableDrivers),
        'condutores' => array_values($drivers),
        'resumo' => [
            'condutores' => count($drivers),
            'online' => (int) ($statusTotals['online'] ?? 0),
            'offline' => (int) ($statusTotals['offline'] ?? 0),
            'pontos' => $pointCount,
            'distancia_km' => round($totalDistance, 2),
            'ultimo_recebimento' => $lastReceived,
        ],
        'atualizado_em' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
    ]);
} catch (Throwable $error) {
    error_log($error->getMessage());
    jsonResponse([
        'ok' => false,
        'mensagem' => 'Não foi possível consultar as localizações. Confira o banco de dados.',
    ], 500);
}
