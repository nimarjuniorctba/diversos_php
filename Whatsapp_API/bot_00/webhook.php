<?php

require_once 'classes/Autoload.class.php';
require_once 'config.php';
require_once 'bot/enviar.php';

$pdo = MySQL_PDO::conexao();


// =====================================
// VERIFICAÇÃO META
// =====================================
if (isset($_GET['hub_challenge'])) {

    echo $_GET['hub_challenge'];
    exit;
}


// =====================================
// RECEBE WEBHOOK
// =====================================
$json = file_get_contents('php://input');

file_put_contents(
    'logs_whatsapp.txt',
    date('d/m/Y H:i:s') . PHP_EOL .
    $json .
    PHP_EOL . PHP_EOL,
    FILE_APPEND
);

$data = json_decode($json, true);

if (
    !isset(
        $data['entry'][0]['changes'][0]['value']['messages'][0]
    )
) {
    exit;
}

$msg = $data['entry'][0]['changes'][0]['value']['messages'][0];

$telefone = $msg['from'];
$texto = '';

if(isset($msg['text']['body'])){

    $texto = trim($msg['text']['body']);
}

if(isset($msg['interactive']['list_reply']['id'])){

    $texto = trim($msg['interactive']['list_reply']['id']);
}

if(isset($msg['interactive']['button_reply']['id'])){

    $texto = trim($msg['interactive']['button_reply']['id']);
}

if (isset($msg['interactive']['list_reply']['id'])) {

    $id = $msg['interactive']['list_reply']['id'];

    // =========================
    // SERVIÇO
    // =========================
    if (str_starts_with($id, 'servico_')) {

        $servico_id = str_replace('servico_', '', $id);

        $pdo->prepare("
            UPDATE mod_whatsapp_sessao
            SET ses_servico_fk = ?,
                ses_etapa = 'escolher_pista'
            WHERE ses_telefone = ?
        ")->execute([$servico_id, $telefone]);

        $sessao['ses_etapa'] = 'escolher_pista';
    }

    // =========================
    // PISTA
    // =========================
    if (str_starts_with($id, 'pista_')) {

        $pista_id = str_replace('pista_', '', $id);

        $pdo->prepare("
            UPDATE mod_whatsapp_sessao
            SET ses_pista_fk = ?,
                ses_etapa = 'escolher_horario'
            WHERE ses_telefone = ?
        ")->execute([$pista_id, $telefone]);

        $sessao['ses_etapa'] = 'escolher_horario';
    }


    // =========================
    // HORÁRIO SUGERIDO
    // =========================
    if (str_starts_with($id, 'hora_')) {

        $hora = str_replace('hora_', '', $id);

        $texto = $hora;
    }   
    
}



// =====================================
// BUSCA SESSÃO
// =====================================
$stmt = $pdo->prepare("
    SELECT *
    FROM mod_whatsapp_sessao
    WHERE ses_telefone = ?
");

$stmt->execute([$telefone]);

$sessao = $stmt->fetch(PDO::FETCH_ASSOC);


// =====================================
// CRIA SESSÃO
// =====================================
if (!$sessao) {

    $pdo->prepare("
        INSERT INTO mod_whatsapp_sessao
        (
            ses_telefone,
            ses_etapa
        )
        VALUES
        (
            ?,
            'menu'
        )
    ")->execute([$telefone]);

    $sessao = [
        'ses_etapa' => 'menu'
    ];
}


// =====================================
// ROTEADOR
// =====================================
switch ($sessao['ses_etapa']) {

    case 'escolher_servico':
        require 'bot/agendar.php';
    break;

    case 'escolher_pista':
        require 'bot/agendar_pista.php';
    break;

    case 'escolher_horario':
        require 'bot/agendar_horario.php';
    break;

    case 'confirmar_agendamento':
        require 'bot/agendar_confirmar.php';
    break;

    default:
        require 'bot/menu.php';
    break;
}