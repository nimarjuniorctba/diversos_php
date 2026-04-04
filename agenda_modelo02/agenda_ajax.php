<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$smarty = new Smarty();
$pdo = MySQL_PDO::conexao();

$acao = $_GET['acao'] ?? '';

// =============================
// 🟢 CADASTRAR (FORM)
// =============================
if ($acao == 'cadastrar') {

    // CLIENTES
    $clientes = $pdo->query("SELECT cli_id, cli_nome FROM mod_clientes ORDER BY cli_nome")
                    ->fetchAll(PDO::FETCH_ASSOC);

    // SERVIÇOS
    $servicos = $pdo->query("SELECT ser_id, ser_nome FROM servicos ORDER BY ser_nome")
                    ->fetchAll(PDO::FETCH_ASSOC);

    // PISTAS
    $pistas = $pdo->query("SELECT pis_id, pis_nome FROM mod_pistas WHERE pis_status='A'")
                  ->fetchAll(PDO::FETCH_ASSOC);

    // HORÁRIOS
    $horarios = $pdo->query("SELECT hor_id, hor_hora FROM mod_horarios ORDER BY hor_hora")
                    ->fetchAll(PDO::FETCH_ASSOC);

    // valores vindos do clique
    $smarty->assign('horaSelecionada', $_GET['hora'] ?? '');
    $smarty->assign('pistaSelecionada', $_GET['pista'] ?? '');

    $smarty->assign('CLIENTES', $clientes);
    $smarty->assign('SERVICOS', $servicos);
    $smarty->assign('PISTAS', $pistas);
    $smarty->assign('HORARIOS', $horarios);

    $smarty->display('templates/agenda/cadastrar_agenda.tpl');
    exit;
}

// =============================
// 🔴 DESCRIÇÃO
// =============================
if ($acao == 'descricao') {

    $id = (int)$_GET['id'];

    $sql = "
    SELECT 
        a.*,
        c.cli_nome,
        c.cli_email,
        s.ser_nome,
        s.ser_valor,
        s.ser_duracao,
        h.hor_hora,
        com.com_comentario
    FROM mod_agendamentos a
    LEFT JOIN mod_clientes c ON c.cli_id = a.cli_id_fk
    LEFT JOIN servicos s ON s.ser_id = a.ser_id_fk
    LEFT JOIN mod_horarios h ON h.hor_id = a.hora_id_fk
    LEFT JOIN mod_comentario com ON com.com_id = a.com_id_fk
    WHERE a.age_id = ?
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    // calcula horário final
    $inicio = strtotime($dados['hor_hora']);
    $fim = date('H:i', $inicio + ($dados['ser_duracao'] * 60));
    $dados['hora_fim'] = $fim;

    $smarty->assign('AG', $dados);

    $smarty->display('templates/agenda/descricao.tpl');
    exit;
}

// =============================
// ❌ CANCELAR
// =============================
if ($acao == 'cancelar') {

    $id = (int)$_POST['id'];

    $stmt = $pdo->prepare("UPDATE mod_agendamentos SET age_status='c' WHERE age_id=?");
    $ok = $stmt->execute([$id]);

    echo json_encode(['status'=>$ok?'ok':'erro']);
    exit;
}

// =============================
// ✏️ EDITAR
// =============================
if ($acao == 'editar' && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $id       = $_POST['id'];
    $hora     = $_POST['hora'];
    $pista    = $_POST['pista'];
    $servico  = $_POST['servico'];
    $desconto = $_POST['desconto'];

    // pega valor do serviço
    $stmt = $pdo->prepare("SELECT ser_valor FROM servicos WHERE ser_id=?");
    $stmt->execute([$servico]);
    $ser = $stmt->fetch(PDO::FETCH_ASSOC);

    $valor = (float)$ser['ser_valor'];
    $final = $valor - (float)$desconto;

    $stmt = $pdo->prepare("
        UPDATE mod_agendamentos 
        SET hora_id_fk=?, pis_id_fk=?, ser_id_fk=?, age_desconto=?, age_valor_final=?
        WHERE age_id=?
    ");

    $ok = $stmt->execute([$hora, $pista, $servico, $desconto, $final, $id]);

    echo json_encode(['status'=>$ok?'ok':'erro']);
    exit;
}

// =============================
// 💾 SALVAR NOVO AGENDAMENTO
// =============================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data     = $_POST['data'];
    $hora     = $_POST['hora'];
    $pista    = $_POST['pista'];
    $servico  = $_POST['servico'];
    $cliente  = $_POST['cliente'];
    $desconto = $_POST['desconto'] ?? 0;
    $coment   = $_POST['comentario'] ?? '';

    // 🔹 cria comentário se existir
    $com_id = null;

    if (!empty($coment)) {
        $stmt = $pdo->prepare("INSERT INTO mod_comentario (com_comentario) VALUES (?)");
        $stmt->execute([$coment]);
        $com_id = $pdo->lastInsertId();
    }

    // 🔹 pega valor do serviço
    $stmt = $pdo->prepare("SELECT ser_valor FROM servicos WHERE ser_id=?");
    $stmt->execute([$servico]);
    $ser = $stmt->fetch(PDO::FETCH_ASSOC);

    $valor = (float)$ser['ser_valor'];
    $final = $valor - (float)$desconto;

    // 🔹 salva agendamento
    $stmt = $pdo->prepare("
        INSERT INTO mod_agendamentos 
        (data, hora_id_fk, pis_id_fk, ser_id_fk, cli_id_fk, age_desconto, age_valor_final, com_id_fk)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $ok = $stmt->execute([$data, $hora, $pista, $servico, $cliente, $desconto, $final, $com_id]);

    echo json_encode(['status'=>$ok?'ok':'erro']);
    exit;
}