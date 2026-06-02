<?php

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

error_reporting(E_ALL & ~E_DEPRECATED);

$smarty = new Smarty();
$pdo = MySQL_PDO::conexao();

// =============================
// 🔹 HORÁRIOS
// =============================
$sql = "SELECT hor_id, hor_hora FROM mod_horarios ORDER BY hor_id";
$horarios = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 PISTAS
// =============================
$sql = "SELECT pis_id, pis_nome FROM mod_pistas WHERE pis_status='A' ORDER BY pis_id";
$pistas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 AGENDAMENTOS COMPLETOS
// =============================
$sql = "
SELECT 
    a.age_id,
    a.hora_id_fk,
    a.pis_id_fk,
    a.ser_id_fk,
    a.cli_id_fk,
    a.age_status,
    s.ser_nome,
    s.ser_duracao,
    c.cli_nome
FROM mod_agendamentos a
LEFT JOIN servicos s ON s.ser_id = a.ser_id_fk
LEFT JOIN mod_clientes c ON c.cli_id = a.cli_id_fk
WHERE a.data = CURDATE()
AND a.age_status = 'a'
";

$agendamentos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// =============================
// 🔹 MAPA DE POSIÇÃO DOS HORÁRIOS
// =============================
$mapa = [];

foreach ($horarios as $i => $h) {
    $mapa[$h['hor_id']] = $i;
}


// =============================
// 🔹 OCUPAÇÃO + ROWSPAN
// =============================
$ocupados = [];
$rowspan  = [];

foreach ($agendamentos as $a) {

    $horaInicial = (int)$a['hora_id_fk'];
    $pista       = (int)$a['pis_id_fk'];
    $duracao     = (int)$a['ser_duracao'];

    if (!$horaInicial || !$pista) continue;

    if ($duracao <= 0) $duracao = 5;

    // quantidade de slots (5 em 5 min)
    $slots = max(1, intval($duracao / 5));

    if (!isset($mapa[$horaInicial])) continue;

    $inicio = $mapa[$horaInicial];

    for ($i = 0; $i < $slots; $i++) {

        $pos = $inicio + $i;

        if (isset($horarios[$pos])) {

            $hid = $horarios[$pos]['hor_id'];

            // 🔴 guarda info completa
            $ocupados[$hid][$pista] = [
                'id'       => $a['age_id'],
                'cliente'  => $a['cli_nome'],
                'servico'  => $a['ser_nome']
            ];

            // 🔴 rowspan (só no primeiro slot)
            if ($i == 0) {
                $rowspan[$hid][$pista] = $slots;
            } else {
                $rowspan[$hid][$pista] = 0;
            }
        }
    }
}


// =============================
// 🔹 ENVIA PARA O TEMPLATE
// =============================
$smarty->assign('HORARIOS', $horarios);
$smarty->assign('PISTAS', $pistas);
$smarty->assign('OCUPADOS', $ocupados);
$smarty->assign('ROWSPAN', $rowspan);

// =============================
// 🔹 EXIBE
// =============================
$smarty->display('agenda.tpl');