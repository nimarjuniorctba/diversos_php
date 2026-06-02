<?php

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$smarty = new Smarty();
$pdo = MySQL_PDO::conexao();

// 🔹 BUSCAR CLIENTES
$sql = "SELECT cli_id, cli_nome FROM mod_clientes ORDER BY cli_nome";
$clientes = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 🔹 BUSCAR SERVIÇOS
$sql = "SELECT ser_id, ser_nome FROM servicos ORDER BY ser_nome";
$servicos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 🔹 BUSCAR PISTAS
$sql = "SELECT pis_id, pis_nome FROM mod_pistas WHERE pis_status = 'A'";
$pistas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 🔹 BUSCAR HORÁRIOS
$sql = "SELECT hor_id, hor_hora FROM mod_horarios ORDER BY hor_hora";
$horarios = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 🔹 SALVAR
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $pista = $_POST['pista'];
    $servico = $_POST['servico'];
    $cliente = $_POST['cliente'];

    $sql = "INSERT INTO mod_agendamentos 
            (data, hora_id_fk, pis_id_fk, ser_id_fk, cli_id_fk)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$data, $hora, $pista, $servico, $cliente]);

    echo "<script>alert('Agendado com sucesso!');</script>";
}

// envia pro Smarty
$smarty->assign('CLIENTES', $clientes);
$smarty->assign('SERVICOS', $servicos);
$smarty->assign('PISTAS', $pistas);
$smarty->assign('HORARIOS', $horarios);

// exibe
$smarty->display('agendar.tpl');