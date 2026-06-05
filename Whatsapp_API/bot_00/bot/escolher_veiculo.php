<?php


$veiculos = $pdo->prepare("
    SELECT
        vei_id,
        vei_modelo,
        vei_placa
    FROM mod_veiculos
    WHERE cli_id_fk = ?
");

$veiculos->execute([
    $sessao['ses_cliente_fk']
]);

$veiculos = $veiculos->fetchAll(PDO::FETCH_ASSOC);



if (count($veiculos) == 0) {

    $pdo->prepare("
        UPDATE mod_whatsapp_sessao
        SET ses_etapa = 'cadastro_veiculo_modelo'
        WHERE ses_telefone = ?
    ")->execute([$telefone]);

    require __DIR__.'/cadastrar_veiculo.php';
    exit;
}

$rows = [];

foreach($veiculos as $v){

    $rows[] = [
        'id' => 'veiculo_'.$v['vei_id'],
        'title' => $v['vei_modelo'],
        'descricao' => $v['vei_placa']
    ];
}

$rows[] = [
    'id' => 'novo_veiculo',
    'title' => '➕ Novo Veículo'
];

enviarLista(
    $telefone,
    'Veículos',
    'Escolha o veículo',
    'Selecionar',
    $rows
);

exit;