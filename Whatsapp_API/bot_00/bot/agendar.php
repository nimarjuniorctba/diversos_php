<?php

if (!isset($pdo) || !isset($telefone)) {
    exit;
}

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
        'title' => $s['ser_nome']
    ];
}

try {

    enviarLista(
        $telefone,
        'Agendamento',
        'Escolha um serviço',
        'Serviços disponíveis',
        $rows
    );

} catch (Exception $e) {

    file_put_contents(
        'erro_lista.txt',
        $e->getMessage().PHP_EOL,
        FILE_APPEND
    );

}

exit;