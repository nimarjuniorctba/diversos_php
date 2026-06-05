<?php

if (!isset($pdo) || !isset($telefone)) {
    exit;
}

// =====================================================
// BUSCA SESSÃO ATUAL
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

file_put_contents(
    'confirmar_debug.txt',
    "Entrou confirmar\n",
    FILE_APPEND
);

// =====================================================
// BUSCA DURAÇÃO DO SERVIÇO
// =====================================================
$servico = $pdo->prepare("
    SELECT ser_valor, ser_duracao
    FROM mod_servicos
    WHERE ser_id = ?
");
$servico->execute([$sessao['ses_servico_fk']]);
$servico = $servico->fetch(PDO::FETCH_ASSOC);

if (!$servico) {
    enviarTexto($telefone, "❌ Serviço inválido.");
    exit;
}

file_put_contents(
    'confirmar_debug.txt',
    "Servico OK\n",
    FILE_APPEND
);

// =====================================================
// HORÁRIO
// =====================================================
$inicio = (int)$sessao['ses_horario_fk'];
$fim = $inicio + ($servico['ser_duracao'] * 60);

// =====================================================
// DUPLA CHECAGEM DE CONFLITO (SEGURANÇA)
// =====================================================
$stmt = $pdo->prepare("
    SELECT COUNT(*)
    FROM mod_agendamentos
    WHERE pis_id_fk = ?
    AND age_status = 'a'
    AND (
        (? < age_hora_fim_fk AND ? > age_hora_inicio_fk)
    )
");

$stmt->execute([
    $sessao['ses_pista_fk'],
    $inicio,
    $inicio
]);

if ($stmt->fetchColumn() > 0) {

    enviarTexto($telefone,
        "❌ Esse horário acabou de ser ocupado.\nTente outro horário."
    );

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET ses_etapa = 'escolher_horario'
        WHERE ses_telefone = ?
    ")->execute([$telefone]);

    exit;
}

// =====================================================
// INSERE AGENDAMENTO
// =====================================================
$pdo->prepare("
    INSERT INTO mod_agendamentos (
        age_data,
        age_hora_inicio_fk,
        age_hora_fim_fk,
        pis_id_fk,
        ser_id_fk,
        cli_id_fk,
        vei_id_fk,
        age_valor_final,
        age_status
    ) VALUES (
        CURDATE(),
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        'a'
    )
")->execute([
    $inicio,
    $fim,
    $sessao['ses_pista_fk'],
    $sessao['ses_servico_fk'],
    $sessao['ses_cliente_fk'],
    $sessao['ses_veiculo_fk'],
    $servico['ser_valor']
]);

file_put_contents(
    'confirmar_debug.txt',
    "Inseriu\n",
    FILE_APPEND
);

// =====================================================
// LIMPA / RESETA SESSÃO
// =====================================================
$pdo->prepare("
    UPDATE mod_whatsapp_sessao
    SET ses_etapa = 'menu',
        ses_servico_fk = NULL,
        ses_pista_fk = NULL,
        ses_horario_fk = NULL
    WHERE ses_telefone = ?
")->execute([$telefone]);

// =====================================================
// CONFIRMAÇÃO
// =====================================================
$hora = date('H:i', $inicio);

enviarTexto($telefone,
"✔ Agendamento confirmado!\n\n".
"🕒 Horário: {$hora}\n".
"💰 Valor: R$ {$servico['ser_valor']}\n\n".
"Obrigado!"
);

exit;