<?php

if (!isset($pdo) || !isset($telefone)) {
    exit;
}

// =====================================================
// BUSCA DADOS DA SESSÃO
// =====================================================
$sessao = $pdo->prepare("
    SELECT *
    FROM mod_whatsapp_sessao
    WHERE ses_telefone = ?
");
$sessao->execute([$telefone]);
$sessao = $sessao->fetch(PDO::FETCH_ASSOC);

if (!$sessao) {
    exit;
}

// =====================================================
// PEGA SERVIÇO (DURAÇÃO)
// =====================================================
$servico = $pdo->prepare("
    SELECT ser_duracao
    FROM mod_servicos
    WHERE ser_id = ?
");
$servico->execute([$sessao['ses_servico_fk']]);
$duracao = (int)$servico->fetchColumn();

if (!$duracao) {
    enviarTexto($telefone, "❌ Serviço inválido.");
    exit;
}

// =====================================================
// INPUT DO USUÁRIO (HORÁRIO)
// =====================================================
$hora = trim($texto ?? '');

if (!preg_match('/^\d{2}:\d{2}$/', $hora)) {

    enviarTexto($telefone,
        "🕒 Informe o horário no formato correto:\nEx: 14:30"
    );
    exit;
}

// =====================================================
// CONVERTE HORÁRIO
// =====================================================
//$inicio = strtotime($hora);
$stmt = $pdo->prepare("
    SELECT hor_id, hor_hora
    FROM mod_horarios
    WHERE hor_hora = ?
    LIMIT 1
");
$stmt->execute([$hora]);
$horario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$horario) {
    enviarTexto($telefone, "❌ Horário inválido.");
    exit;
}




$inicio_id = $horario['hor_id'];
$config = $pdo->query("
    SELECT *
    FROM mod_configuracao_agenda
    LIMIT 1
")->fetch(PDO::FETCH_ASSOC);

$horarios = $pdo->prepare("
    SELECT hor_id, hor_hora
    FROM mod_horarios
    WHERE hor_id BETWEEN ? AND ?
    ORDER BY hor_id
");

$horarios->execute([
    $config['cfg_hora_inicio_fk'],
    $config['cfg_hora_fim_fk']
]);

$horarios = $horarios->fetchAll(PDO::FETCH_ASSOC);

$mapa = [];
foreach ($horarios as $i => $h) {
    $mapa[$h['hor_id']] = $i;
}

$inicio_id = $horario['hor_id'];

$inicioIndex = $mapa[$inicio_id];
$slots = ceil($duracao / 5);

$fimIndex = $inicioIndex + $slots - 1;

$ids = array_keys($mapa);

$fim_id = $ids[$fimIndex] ?? null;

if (!$fim_id) {
    enviarTexto($telefone, "❌ Não há tempo suficiente no dia.");
    exit;
}

// =====================================================
// VERIFICA CONFLITO NA PISTA
// =====================================================
$stmt = $pdo->prepare("
    SELECT a.*, s.ser_duracao
    FROM mod_agendamentos a
    INNER JOIN mod_servicos s ON s.ser_id = a.ser_id_fk
    WHERE a.age_data = CURDATE()
    AND a.pis_id_fk = ?
    AND a.age_status = 'a'
");

$stmt->execute([$sessao['ses_pista_fk']]);

$agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);



$conflito = false;

foreach ($agendamentos as $ag) {

    $agInicio = $mapa[$ag['age_hora_inicio_fk']] ?? null;
    if ($agInicio === null) continue;

    $agSlots = ceil($ag['ser_duracao'] / 5);
    $agFim = $agInicio + $agSlots - 1;

    if ($inicioIndex <= $agFim && $fimIndex >= $agInicio) {
        $conflito = true;
        break;
    }
}



// =====================================================
// SE HORÁRIO LIVRE
// =====================================================
if ($conflito == 0) {

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET ses_horario_fk = ?,
            ses_etapa = 'confirmar_agendamento'
        WHERE ses_telefone = ?
    ")->execute([$inicio, $telefone]);

    enviarBotoes(
        $telefone,
        "✔ Horário disponível!\n\nConfirma agendamento às {$hora}?",
        [
            [
                'id' => 'confirmar_sim',
                'titulo' => 'Sim'
            ],
            [
                'id' => 'confirmar_nao',
                'titulo' => 'Não'
            ]
        ]
    );

    exit;
}

// =====================================================
// SE HORÁRIO OCUPADO → BUSCAR SUGESTÕES
// =====================================================
enviarTexto($telefone,
    "❌ Esse horário não está disponível.\n\nBuscando alternativas..."
);

// =====================================================
// SUGESTÕES DE HORÁRIOS (DEPOIS)
// =====================================================

//$sugestoes->execute([$hora]);
//$depois = $sugestoes->fetchAll(PDO::FETCH_COLUMN);

// =====================================================
// SUGESTÕES ANTES
// =====================================================

//$sugestoes2->execute([$hora]);
//$antes = $sugestoes2->fetchAll(PDO::FETCH_COLUMN);

$todos = $horarios; // já filtrados pela config

$sugestoes_antes = [];
$sugestoes_depois = [];

$inicioBase = $inicioIndex;

// ----------------------
// procura depois
// ----------------------
for ($i = $inicioBase + 1; $i < count($ids); $i++) {

    $fimTeste = $i + $slots - 1;

    if (!isset($ids[$fimTeste])) break;

    $conflito = false;

    foreach ($agendamentos as $ag) {

        $agInicio = $mapa[$ag['age_hora_inicio_fk']] ?? null;
        if ($agInicio === null) continue;

        $agSlots = ceil($ag['ser_duracao'] / 5);
        $agFim = $agInicio + $agSlots - 1;

        if ($i <= $agFim && $fimTeste >= $agInicio) {
            $conflito = true;
            break;
        }
    }

    if (!$conflito) {
        $sugestoes_depois[] = $horarios[$i]['hor_hora'];
    }

    if (count($sugestoes_depois) >= 5) break;
}

// ----------------------
// procura antes
// ----------------------
for ($i = $inicioBase - 1; $i >= 0; $i--) {

    $fimTeste = $i + $slots - 1;

    if (!isset($ids[$fimTeste])) break;

    $conflito = false;

    foreach ($agendamentos as $ag) {

        $agInicio = $mapa[$ag['age_hora_inicio_fk']] ?? null;
        if ($agInicio === null) continue;

        $agSlots = ceil($ag['ser_duracao'] / 5);
        $agFim = $agInicio + $agSlots - 1;

        if ($i <= $agFim && $fimTeste >= $agInicio) {
            $conflito = true;
            break;
        }
    }

    if (!$conflito) {
        $sugestoes_antes[] = $horarios[$i]['hor_hora'];
    }

    if (count($sugestoes_antes) >= 3) break;
}

// =====================================================
// SE NÃO TEM NADA
// =====================================================
if (!$sugestoes_antes && !$sugestoes_depois) {

    enviarTexto($telefone,
        "❌ Não temos horários disponíveis próximos a esse."
    );
    exit;
}

// =====================================================
// MONTA RESPOSTA
// =====================================================
$itens = [];

// horários depois
foreach ($sugestoes_depois as $h) {

    $itens[] = [
        'id' => 'hora_'.$h,
        'title' => $h
    ];
}

// horários antes
foreach ($sugestoes_antes as $h) {

    $itens[] = [
        'id' => 'hora_'.$h,
        'title' => $h
    ];
}

enviarLista(
    $telefone,
    'Horários disponíveis',
    'Veja alguns horários disponiveis:',
    'Selecionar horário',
    $itens
);

exit;