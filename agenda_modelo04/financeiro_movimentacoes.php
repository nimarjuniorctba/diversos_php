<?php
require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$pdo = MySQL_PDO::conexao();

/* =========================
   AJAX (RETORNA JSON)
=========================*/
if(isset($_POST['ajax'])){

    header('Content-Type: application/json');

    error_reporting(0);
    ini_set('display_errors', 0);

    $ini    = $_POST['dataInicio'] ?? null;
    $fim    = $_POST['dataFim'] ?? null;
    $tipo   = $_POST['tipo'] ?? 'todos';
    $origem = $_POST['origem'] ?? 'todos';

    $sql = "SELECT 
                fin_id,
                fin_data,
                fin_tipo,
                fin_origem,
                fin_descricao,
                fin_valor_final
            FROM mod_financeiro
            WHERE fin_status = 'a'";

    $params = [];

    if($ini){
        $sql .= " AND fin_data >= ?";
        $params[] = $ini;
    }

    if($fim){
        $sql .= " AND fin_data <= ?";
        $params[] = $fim;
    }

    if($tipo != 'todos'){
        $sql .= " AND fin_tipo = ?";
        $params[] = $tipo;
    }

    if($origem != 'todos'){
        $sql .= " AND fin_origem = ?";
        $params[] = $origem;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

/* =========================
   PAGE
=========================*/
$smarty = new Smarty();
$smarty->display('financeiro_movimentacoes.tpl');