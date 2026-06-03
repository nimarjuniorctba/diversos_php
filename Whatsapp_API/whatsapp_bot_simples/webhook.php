<?php

require 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);



try {

    $json = file_get_contents('php://input');

    // LOG BRUTO
    file_put_contents(
        'logs/bruto.txt',
        date('d/m/Y H:i:s') . PHP_EOL .
        $json . PHP_EOL .
        str_repeat('-',50) . PHP_EOL,
        FILE_APPEND
    );
	
	

    $dados = json_decode($json, true);

    // VERIFICAÇÃO DO WEBHOOK
    if(isset($_GET['hub_challenge']))
    {
        echo $_GET['hub_challenge'];
        exit;
    }

    if(
        !isset(
            $dados['entry'][0]['changes'][0]['value']['messages'][0]
        )
    )
    {
        exit;
    }

    $mensagem = $dados['entry'][0]['changes'][0]['value']['messages'][0];

    $telefone = $mensagem['from'];
    $texto = trim($mensagem['text']['body']);

    // LOG RECEBIDA
    file_put_contents(
        'logs/recebidas.txt',
        date('d/m/Y H:i:s')
        . PHP_EOL .
        'Telefone: '.$telefone
        . PHP_EOL .
        'Mensagem: '.$texto
        . PHP_EOL .
        str_repeat('-',50)
        . PHP_EOL,
        FILE_APPEND
    );

    $pdo = new PDO(
        "mysql:host=$HOST;dbname=$DBNAME;charset=utf8",
        $USER,
        $PASS
    );

    switch($texto)
    {

        case '1':

            $resposta =
                "Agendamento ainda não implementado.";

        break;


        case '2':

            $sql = "
                SELECT a.*
                FROM clientes c
                INNER JOIN agendamentos a
                ON a.cliente_id = c.id
                WHERE c.telefone = ?
                AND a.status='Agendado'
            ";

            $stm = $pdo->prepare($sql);
            $stm->execute([$telefone]);

            $lista = $stm->fetchAll(PDO::FETCH_ASSOC);

            if(!$lista)
            {
                $resposta =
                    "Nenhum agendamento encontrado.";
            }
            else
            {
                $resposta =
                    "Seus agendamentos:\n\n";

                foreach($lista as $item)
                {
                    $resposta .=
                        date(
                            'd/m/Y H:i',
                            strtotime(
                                $item['data_agendamento']
                            )
                        )
                        . "\n";
                }
            }

        break;


        case '3':

            $resposta =
                "Cancelamento ainda não implementado.";

        break;


        case '4':

            $resposta =
                "Atendente solicitado.\n".
                "Em breve alguém responderá.";

        break;
		
        case 'agendamento':

            $resposta =
                "Vou agendar pravc.";

        break;		


        default:

            $resposta =
                "O que deseja?\n\n".
                "1 - Agendamento\n".
                "2 - Ver agendamentos\n".
                "3 - Cancelar agendamento\n".
                "4 - Falar com atendente";

        break;

    }

    enviarMensagem(
        $telefone,
        $resposta,
        $TOKEN,
        $PHONE_NUMBER_ID
    );

    echo "OK";

}
catch(Exception $e)
{

    file_put_contents(
        'logs/erros.txt',
        date('d/m/Y H:i:s')
        .' - '.
        $e->getMessage()
        .PHP_EOL,
        FILE_APPEND
    );

}

function enviarMensagem(
    $telefone,
    $mensagem,
    $TOKEN,
    $PHONE_NUMBER_ID
)
{

    $dados = [

        "messaging_product" => "whatsapp",

        "to" => $telefone,

        "type" => "text",

        "text" => [
            "body" => $mensagem
        ]

    ];

    $curl = curl_init();

    curl_setopt_array($curl,[

        CURLOPT_URL =>
            "https://graph.facebook.com/v23.0/$PHONE_NUMBER_ID/messages",

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_POST => true,

        CURLOPT_HTTPHEADER => [

            "Authorization: Bearer $TOKEN",

            "Content-Type: application/json"

        ],

        CURLOPT_POSTFIELDS =>
            json_encode($dados)

    ]);

    $retorno = curl_exec($curl);

    curl_close($curl);

    file_put_contents(
        'logs/enviadas.txt',
        date('d/m/Y H:i:s')
        .PHP_EOL.
        "Para: ".$telefone
        .PHP_EOL.
        $mensagem
        .PHP_EOL.
        str_repeat('-',50)
        .PHP_EOL,
        FILE_APPEND
    );

}