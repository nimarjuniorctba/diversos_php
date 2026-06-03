<?php

$servicos = $pdo->query("
    SELECT ser_id, ser_nome
    FROM mod_servicos
    WHERE ser_status='a'
    ORDER BY ser_nome
")->fetchAll(PDO::FETCH_ASSOC);

if(!$servicos){

    enviarTexto(
        $telefone,
        "Nenhum serviço cadastrado."
    );

    exit;
}

$rows = [];

foreach($servicos as $s){

    $rows[] = [
        'id' => 'servico_'.$s['ser_id'],
        'titulos' => $s['ser_nome']
    ];
}

enviarLista(
    $telefone,
    'Agendamento',
    'Escolha um serviço',
    'Selecionar',
    $rows
);

$pdo->prepare("
    UPDATE mod_whatsapp_sessao
    SET ses_etapa='aguardando_servico'
    WHERE ses_telefone=?
")->execute([$telefone]);

exit;