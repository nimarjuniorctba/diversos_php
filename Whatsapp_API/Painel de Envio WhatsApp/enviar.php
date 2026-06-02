<?php

require 'config.php';

$numero = $_POST['numero'];
$mensagem = $_POST['mensagem'];

$dados = [
    "messaging_product" => "whatsapp",
    "to" => $numero,
    "type" => "text",
    "text" => [
        "body" => $mensagem
    ]
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://graph.facebook.com/v23.0/$PHONE_ID/messages",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $TOKEN",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($dados)
]);

$resposta = curl_exec($curl);

curl_close($curl);

echo "<pre>";
print_r(json_decode($resposta, true));