<?php

if (!isset($pdo) || !isset($telefone)) {
    exit;
}

$sessao = $pdo->prepare("
    SELECT *
    FROM mod_whatsapp_sessao
    WHERE ses_telefone = ?
");
$sessao->execute([$telefone]);
$sessao = $sessao->fetch(PDO::FETCH_ASSOC);

$email = trim($texto);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    enviarTexto(
        $telefone,
        "❌ E-mail inválido.\n\nInforme um e-mail válido:"
    );

    exit;
}


// CADASTRA CLIENTE
$pdo->prepare("
    INSERT INTO mod_clientes
    (
        cli_nome,
        cli_email,
        cli_telefone,
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
    $email,
    $telefone
]);

$cliente_id = $pdo->lastInsertId();


// ATUALIZA SESSÃO
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
    "✅ Cadastro realizado com sucesso!\n\n".
    "Agora você já pode realizar seus agendamentos."
);

require __DIR__.'/menu.php';
exit;