<?php

// ========================================
// CONFIGURAÇÕES META
// ========================================

define('TOKEN_WHATSAPP', 'EAAa0Nz4eIgIBRinEjhAQdHVYq5NvpyOpkPkkdyyHGCIwg2rV8Ies1AZBmDPgL4iUNEIEV5IcPn608k6j1rkvs7ZBxV9B1xSnECt1AwJBNpY1DAqdCaDScAEzV7NsDUYBTTUFFxcuguVvN33DThiIgWRkgltGkKe3Q6eqa4QiZCRBEFhSozXgweCCsZCUszdXgiraejflQFsnlPFO7JdVKUiGkKdRslIJCm8evm2fmc3o16rMqJBePDwMkFZBzZAlovdYHMhZB2HZBrx8dQ2FZBehX7A7W8sZCQskixc0KNzKeq');

define('PHONE_NUMBER_ID', '100330039635650');


// ========================================
// REQUEST PADRÃO
// ========================================

function whatsappRequest(array $payload)
{
    $url =
        "https://graph.facebook.com/v23.0/"
        . PHONE_NUMBER_ID
        . "/messages";

    $ch = curl_init($url);

    curl_setopt_array($ch, [

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_POST => true,

        CURLOPT_HTTPHEADER => [

            'Authorization: Bearer ' . TOKEN_WHATSAPP,
            'Content-Type: application/json'

        ],

        CURLOPT_POSTFIELDS => json_encode($payload)

    ]);

$resposta = curl_exec($ch);

if (curl_errno($ch)) {

    file_put_contents(
        'curl_error.txt',
        curl_error($ch) . PHP_EOL,
        FILE_APPEND
    );
}

curl_close($ch);

file_put_contents(
    'meta_response.txt',
    $resposta . PHP_EOL,
    FILE_APPEND
);

return $resposta;
}


// ========================================
// TEXTO
// ========================================

function enviarTexto($telefone, $mensagem)
{
    return whatsappRequest([

        'messaging_product' => 'whatsapp',

        'to' => $telefone,

        'type' => 'text',

        'text' => [
            'preview_url' => false,
            'body' => $mensagem
        ]
    ]);
}


// ========================================
// BOTÕES
// ========================================

function enviarBotoes(
    $telefone,
    $texto,
    $botoes
)
{
    $btns = [];

    foreach ($botoes as $botao) {

        $btns[] = [

            'type' => 'reply',

            'reply' => [

                'id' => $botao['id'],

                'title' => $botao['titulo']
            ]
        ];
    }

    return whatsappRequest([

        'messaging_product' => 'whatsapp',

        'to' => $telefone,

        'type' => 'interactive',

        'interactive' => [

            'type' => 'button',

            'body' => [

                'text' => $texto
            ],

            'action' => [

                'buttons' => $btns
            ]
        ]
    ]);
}


// ========================================
// LISTA
// ========================================

function enviarLista(
    $telefone,
    $titulo,
    $texto,
    $botao,
    $itens
)
{
    $rows = [];

    foreach ($itens as $item) {

        $rows[] = [

            'id' => $item['id'],

            'title' => $item['title'],

            'description' => $item['descricao'] ?? ''
        ];
    }

    return whatsappRequest([

        'messaging_product' => 'whatsapp',
        'to' => $telefone,
        'type' => 'interactive',

        'interactive' => [

            'type' => 'list',

            'body' => [
                'text' => $texto
            ],

            'action' => [
                'button' => $botao,
                'sections' => [[
                    'title' => $titulo,
                    'rows' => $rows
                ]]
            ]
        ]
    ]);
}


// ========================================
// IMAGEM
// ========================================

function enviarImagem(
    $telefone,
    $urlImagem,
    $legenda = ''
)
{
    return whatsappRequest([

        'messaging_product' => 'whatsapp',

        'to' => $telefone,

        'type' => 'image',

        'image' => [

            'link' => $urlImagem,

            'caption' => $legenda
        ]
    ]);
}


// ========================================
// DOCUMENTO
// ========================================

function enviarDocumento(
    $telefone,
    $urlArquivo,
    $nomeArquivo
)
{
    return whatsappRequest([

        'messaging_product' => 'whatsapp',

        'to' => $telefone,

        'type' => 'document',

        'document' => [

            'link' => $urlArquivo,

            'filename' => $nomeArquivo
        ]
    ]);
}