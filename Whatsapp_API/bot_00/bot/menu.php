<?php

switch(trim($texto)){

    case '1':

        $sessaoAtual = $pdo->prepare("
            SELECT *
            FROM mod_whatsapp_sessao
            WHERE ses_telefone = ?
        ");

        $sessaoAtual->execute([$telefone]);

        $sessaoAtual = $sessaoAtual->fetch(PDO::FETCH_ASSOC);

        if (!empty($sessaoAtual['ses_cliente_fk'])) {

            $pdo->prepare("
                UPDATE mod_whatsapp_sessao
                SET ses_etapa='escolher_veiculo'
                WHERE ses_telefone=?
            ")->execute([$telefone]);

            require __DIR__.'/escolher_veiculo.php';
            exit;
        }

        $pdo->prepare("
            UPDATE mod_whatsapp_sessao
            SET ses_etapa='cadastrar_cliente'
            WHERE ses_telefone=?
        ")->execute([$telefone]);

        require __DIR__.'/cadastrar_cliente.php';
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