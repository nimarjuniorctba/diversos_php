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
        

        enviarTexto(
            $telefone,
            "🚗 *BOXLAV*\n\n".
            "1 - Agendar serviço\n".
            "2 - Meus agendamentos\n".
            "3 - Cancelar agendamento\n".
            "9 - Falar com atendente"
        );

        exit;
}