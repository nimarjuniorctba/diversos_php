<?php

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$smarty = new Smarty();
$pdo = MySQL_PDO::conexao();

// =============================
// 🔹 CLIENTES
// =============================
$clientes = $pdo->query("
    SELECT cli_id, cli_nome 
    FROM mod_clientes 
    WHERE cli_status='a'
    ORDER BY cli_nome
")->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 SERVIÇOS
// =============================
$servicos = $pdo->query("
    SELECT ser_id, ser_nome, ser_valor, ser_duracao, ser_cor
    FROM mod_servicos
    WHERE ser_status='a'
    ORDER BY ser_nome
")->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 PISTAS
// =============================
$pistas = $pdo->query("
    SELECT pis_id, pis_nome 
    FROM mod_pistas 
    WHERE pis_status='a'
")->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 HORÁRIOS
// =============================
$horarios = $pdo->query("
    SELECT hor_id, hor_hora 
    FROM mod_horarios 
    ORDER BY hor_hora
")->fetchAll(PDO::FETCH_ASSOC);


// =============================
// 💾 SALVAR
// =============================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        $pdo->beginTransaction(); // 🔥 segurança total

        $data     = $_POST['data'];
        $hora_ini = $_POST['hora_inicio'];
        $pista    = $_POST['pista'];
        $servico  = $_POST['servico'];
        $cliente  = $_POST['cliente'];
        $veiculo  = $_POST['veiculo'];
        $desconto = $_POST['desconto'] ?? 0;
        $forma    = $_POST['forma_pagamento'] ?? null;

        // =============================
        // 🔹 DADOS DO SERVIÇO
        // =============================
        $stmt = $pdo->prepare("
            SELECT ser_valor, ser_duracao, ser_nome
            FROM mod_servicos 
            WHERE ser_id=?
        ");
        $stmt->execute([$servico]);
        $ser = $stmt->fetch(PDO::FETCH_ASSOC);

        $valor = (float)$ser['ser_valor'];
        $duracao = (int)$ser['ser_duracao'];
        $descricao = $ser['ser_nome'];

        // =============================
        // 🔹 CALCULAR HORÁRIO FINAL
        // =============================
        $slots = max(1, intval($duracao / 5));
        $hora_fim = $hora_ini + $slots;

        // =============================
        // 🔹 VALOR FINAL
        // =============================
        $valor_final = $valor - (float)$desconto;

        // =============================
        // 🔹 SALVAR AGENDAMENTO
        // =============================
        $stmt = $pdo->prepare("
            INSERT INTO mod_agendamentos
            (age_data, age_hora_inicio_fk, age_hora_fim_fk, pis_id_fk, ser_id_fk, cli_id_fk, vei_id_fk, age_desconto, age_valor_final)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data,
            $hora_ini,
            $hora_fim,
            $pista,
            $servico,
            $cliente,
            $veiculo,
            $desconto,
            $valor_final
        ]);

        $age_id = $pdo->lastInsertId();

        // =============================
        // 🔹 SALVAR FINANCEIRO
        // =============================
        $stmt = $pdo->prepare("
            INSERT INTO mod_financeiro
            (
                fin_data,
                fin_hora_fk,
                fin_tipo,
                fin_origem,
                fin_valor,
                fin_desconto,
                fin_valor_final,
                fin_descricao,
                age_id_fk,
                ser_id_fk,
                for_id_fk,
                cli_id_fk,
                vei_id_fk,
                pis_id_fk
            )
            VALUES (?, ?, 'entrada', 'agenda', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data,
            $hora_ini,
            $valor,
            $desconto,
            $valor_final,
            $descricao,
            $age_id,
            $servico,
            $forma,
            $cliente,
            $veiculo,
            $pista
        ]);

        $pdo->commit();

        echo "<script>alert('Agendamento e financeiro salvos com sucesso!');</script>";

    } catch (Exception $e) {

        $pdo->rollBack();
        echo "<script>alert('Erro: ".$e->getMessage()."');</script>";
    }
}


// =============================
// TEMPLATE
// =============================
$smarty->assign('CLIENTES', $clientes);
$smarty->assign('SERVICOS', $servicos);
$smarty->assign('PISTAS', $pistas);
$smarty->assign('HORARIOS', $horarios);

$smarty->display('templates/agenda/cadastrar_agendamento.tpl');