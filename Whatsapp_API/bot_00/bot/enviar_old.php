<?php

require_once __DIR__ . '/../config.php';

function enviarMensagem($telefone, $mensagem)
{
    $url =
    "https://graph.facebook.com/v23.0/" .
    WPP_PHONE_ID .
    "/messages";

    $dados = [

        "messaging_product" => "whatsapp",

        "to" => $telefone,

        "type" => "text",

        "text" => [
            "body" => $mensagem
        ]
    ];

    $ch = curl_init($url);

    curl_setopt_array($ch, [

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_POST => true,

        CURLOPT_HTTPHEADER => [

            "Authorization: Bearer " . WPP_TOKEN,

            "Content-Type: application/json"
        ],

        CURLOPT_POSTFIELDS =>
            json_encode($dados)
    ]);

    $retorno = curl_exec($ch);

    curl_close($ch);

    return $retorno;
}