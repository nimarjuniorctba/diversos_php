<?php

if (!isset($pdo) || !isset($telefone)) {
    exit;
}

// ======================================
// BUSCA SESSÃO
// ======================================
$stmt = $pdo->prepare("
    SELECT *
    FROM mod_whatsapp_sessao
    WHERE ses_telefone = ?
");

$stmt->execute([$telefone]);

$sessao = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$sessao) {
    exit;
}

// ======================================
// INÍCIO
// ======================================
if (
    $sessao['ses_etapa'] == 'cadastro_veiculo_modelo'
    && empty($sessao['ses_modelo_temp'])
) {

    enviarTexto(
        $telefone,
        "🚗 Cadastro de veículo\n\n".
        "Informe o modelo do veículo:"
    );

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET ses_modelo_temp = '__aguardando__'
        WHERE ses_telefone = ?
    ")->execute([$telefone]);

    exit;
}

// ======================================
// RECEBE MODELO
// ======================================
if (
    $sessao['ses_etapa'] == 'cadastro_veiculo_modelo'
    && $sessao['ses_modelo_temp'] == '__aguardando__'
) {

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET
            ses_modelo_temp = ?,
            ses_etapa = 'cadastro_veiculo_marca'
        WHERE ses_telefone = ?
    ")->execute([
        trim($texto),
        $telefone
    ]);

    enviarTexto(
        $telefone,
        "🏭 Informe a marca do veículo:"
    );

    exit;
}

// ======================================
// RECEBE MARCA
// ======================================
if ($sessao['ses_etapa'] == 'cadastro_veiculo_marca') {

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET
            ses_marca_temp = ?,
            ses_etapa = 'cadastro_veiculo_cor'
        WHERE ses_telefone = ?
    ")->execute([
        trim($texto),
        $telefone
    ]);

    enviarTexto(
        $telefone,
        "🎨 Informe a cor do veículo:"
    );

    exit;
}

// ======================================
// RECEBE COR
// ======================================
if ($sessao['ses_etapa'] == 'cadastro_veiculo_cor') {

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET
            ses_cor_temp = ?,
            ses_etapa = 'cadastro_veiculo_placa'
        WHERE ses_telefone = ?
    ")->execute([
        trim($texto),
        $telefone
    ]);

    enviarTexto(
        $telefone,
        "🔤 Informe a placa do veículo:"
    );

    exit;
}

// ======================================
// RECEBE PLACA E CADASTRA
// ======================================
if ($sessao['ses_etapa'] == 'cadastro_veiculo_placa') {

    $pdo->prepare("
        INSERT INTO mod_veiculos
        (
            cli_id_fk,
            vei_modelo,
            vei_marca,
            vei_cor,
            vei_placa,
            vei_status
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            'a'
        )
    ")->execute([
        $sessao['ses_cliente_fk'],
        $sessao['ses_modelo_temp'],
        $sessao['ses_marca_temp'],
        $sessao['ses_cor_temp'],
        strtoupper(trim($texto))
    ]);

    $veiculo_id = $pdo->lastInsertId();

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET
            ses_veiculo_fk = ?,
            ses_modelo_temp = NULL,
            ses_marca_temp = NULL,
            ses_cor_temp = NULL,
            ses_etapa = 'escolher_servico'
        WHERE ses_telefone = ?
    ")->execute([
        $veiculo_id,
        $telefone
    ]);

    enviarTexto(
        $telefone,
        "✅ Veículo cadastrado com sucesso!"
    );

    require __DIR__.'/agendar.php';
    exit;
}