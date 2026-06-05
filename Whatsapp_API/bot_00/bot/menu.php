<?php

switch(trim($texto)){

    case '1':

        $pdo->prepare("
            UPDATE mod_whatsapp_sessao
            SET ses_etapa='escolher_servico'
            WHERE ses_telefone=?
        ")->execute([$telefone]);

        require __DIR__.'/agendar.php';
        exit;

    case '2':

        enviarTexto(
            $telefone,
            "📅 Em desenvolvimento."
        );
        exit;

    case '3':

        enviarTexto(
            $telefone,
            "❌ Em desenvolvimento."
        );
        exit;

    case '9':

        enviarTexto(
            $telefone,
            "👨‍💼 Você será transferido para um atendente."
        );
        exit;

    default:

        enviarImagem(
            $telefone,
            'https://tableful-cuddly-federal.ngrok-free.dev/boxlav/sistema.boxlav.com.br/imagens/config/logo.png',
            '🚗 Alpha Lavacar Cic - Faça já sua reserva'
        );

        enviarLista(
            $telefone,
            'Veja as opções',
            'Selecione uma opção para começar:',
            'Menu Principal',
            [
                [
                    'id' => '1',
                    'title' => 'Agendar serviço'
                ],
                [
                    'id' => '2',
                    'title' => 'Meus agendamentos'
                ],
                [
                    'id' => '3',
                    'title' => 'Cancelar agendamento'
                ]
            ]
        );

        exit;
}