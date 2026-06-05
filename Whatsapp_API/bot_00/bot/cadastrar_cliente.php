<?php

if (!isset($pdo) || !isset($telefone)) {
    exit;
}

// busca sessão
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
// INÍCIO DO CADASTRO
// ======================================
if ($sessao['ses_etapa'] == 'cadastrar_cliente') {

    enviarTexto(
        $telefone,
        "👋 Bem-vindo!\n\n".
        "Para realizar agendamentos precisamos do seu cadastro.\n\n".
        "📱 Seu telefone será registrado automaticamente.\n\n".
        "Informe seu nome:"
    );

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET ses_etapa = 'cadastro_nome'
        WHERE ses_telefone = ?
    ")->execute([$telefone]);

    exit;
}

// ======================================
// ETAPA 1 - NOME
// ======================================
if ($sessao['ses_etapa'] == 'cadastro_nome') {

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET
            ses_nome_temp = ?,
            ses_etapa = 'cadastro_email'
        WHERE ses_telefone = ?
    ")->execute([
        $texto,
        $telefone
    ]);

    enviarTexto(
        $telefone,
        "📧 Agora informe seu e-mail:"
    );

    exit;
}

// ======================================
// ETAPA 2 - EMAIL
// ======================================
if ($sessao['ses_etapa'] == 'cadastro_email') {

    $pdo->prepare("
        INSERT INTO mod_clientes
        (
            cli_nome,
            cli_telefone,
            cli_email,
            cli_status
        )
        VALUES
        (
            ?,
            ?,
            ?,
            'a'
        )
    ")->execute([
        $sessao['ses_nome_temp'],
        $telefone,
        $texto
    ]);

    $cliente_id = $pdo->lastInsertId();

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET
            ses_cliente_fk = ?,
            ses_nome_temp = NULL,
            ses_etapa = 'menu'
        WHERE ses_telefone = ?
    ")->execute([
        $cliente_id,
        $telefone
    ]);

    enviarTexto(
        $telefone,
        "✅ Cadastro realizado com sucesso!"
    );

    require __DIR__.'/menu.php';
    exit;
}