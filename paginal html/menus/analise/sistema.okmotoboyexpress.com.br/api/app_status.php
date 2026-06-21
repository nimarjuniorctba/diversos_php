<?php

header('Content-Type: application/json; charset=utf-8');

mysqli_report(MYSQLI_REPORT_OFF);
$con = new mysqli('localhost', 'root', '', 'okmotoboyexpress');

if ($con->connect_error) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg' => 'Erro de conexao'
    ]);
    exit;
}

$con->set_charset('utf8mb4');

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$opcao = isset($_POST['opcao']) ? strtolower(trim($_POST['opcao'])) : '';

if ($id <= 0) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'msg' => 'ID invalido'
    ]);
    exit;
}

if (!in_array($opcao, ['ligar', 'desligar'], true)) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'msg' => 'Opcao invalida'
    ]);
    exit;
}

$status = $opcao === 'ligar' ? 'a' : 'i';

$sql = $con->prepare('
    UPDATE mod_condutor
    SET con_app_status = ?
    WHERE con_id = ?
');

if (!$sql) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg' => 'Erro ao preparar atualizacao'
    ]);
    $con->close();
    exit;
}

$sql->bind_param('si', $status, $id);

if (!$sql->execute()) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg' => 'Erro ao atualizar'
    ]);
} elseif ($sql->affected_rows === 0) {
    $consulta = $con->prepare('SELECT con_id FROM mod_condutor WHERE con_id = ? LIMIT 1');
    $consulta->bind_param('i', $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows === 0) {
        http_response_code(404);
        echo json_encode([
            'status' => false,
            'msg' => 'Condutor nao encontrado'
        ]);
    } else {
        echo json_encode([
            'status' => true,
            'msg' => 'Status ja estava atualizado',
            'con_id' => $id,
            'con_app_status' => $status
        ]);
    }

    $consulta->close();
} else {
    echo json_encode([
        'status' => true,
        'msg' => 'Status atualizado',
        'con_id' => $id,
        'con_app_status' => $status
    ]);
}

$sql->close();
$con->close();