<?php

$token = 'EAAa0Nz4eIgIBRtX92z8ea7DUvhSNfwIv6ZBip9bB95oVpOnAhAiAUMJjqZBQyLhidqTiGSUEokIUTObejL0cODU3AIfIm80lhGy32CFzY5459WnmlIvHIQrQxK7YD3gfSdZAj2K2wgNyUKvW5WGXvX7f1xsTuU6UNJBtNSZBfjIlJ1sAKx18QpeON2pLD3khqNYAvc8SyoOEFXuCO7PxQa3xUSUblNOBKNDv5JtkO7MH2ZBLZCJgHPPXraL86yZAmZC0WAFmsjNIVTfd6IutxbHufVLZBYXJd0tUBVrzgOQZDZD';
$phone_number_id = '100330039635650';

$dados = [
    "messaging_product" => "whatsapp",
    "to" => "554195478268",
    "type" => "text",
    "text" => [
        "body" => "Teste enviado pelo PHP!"
    ]
];

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://graph.facebook.com/v23.0/$phone_number_id/messages",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $token",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($dados)
]);

$resposta = curl_exec($ch);

curl_close($ch);

echo $resposta;