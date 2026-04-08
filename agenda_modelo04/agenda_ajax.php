<?php

error_reporting(E_ALL & ~E_DEPRECATED);

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$smarty = new Smarty();
$pdo = MySQL_PDO::conexao();

$acao = $_GET['acao'] ?? '';


// =============================
// 📅 LISTA DA AGENDA (AJAX)
// =============================
if ($acao == 'lista') {

    $data = $_GET['data'] ?? date('Y-m-d');

    $horarios = $pdo->query("
        SELECT hor_id, hor_hora 
        FROM mod_horarios 
        ORDER BY hor_id
    ")->fetchAll(PDO::FETCH_ASSOC);

    $pistas = $pdo->query("
        SELECT pis_id, pis_nome 
        FROM mod_pistas 
        WHERE pis_status='a'
    ")->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("
        SELECT 
            a.age_id,
            a.age_hora_inicio_fk,
            a.pis_id_fk,
            s.ser_nome,
            s.ser_duracao,
            s.ser_cor,
            c.cli_nome,
            v.vei_placa
        FROM mod_agendamentos a
        LEFT JOIN mod_servicos s ON s.ser_id = a.ser_id_fk
        LEFT JOIN mod_clientes c ON c.cli_id = a.cli_id_fk
        LEFT JOIN mod_veiculos v ON v.vei_id = a.vei_id_fk
        WHERE a.age_data = ?
        AND a.age_status = 'a'
    ");

    $stmt->execute([$data]);
    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $mapa = [];
    foreach ($horarios as $i => $h) {
        $mapa[$h['hor_id']] = $i;
    }

    $ocupados = [];
    $rowspan  = [];

    foreach ($agendamentos as $a) {

        if (!isset($mapa[$a['age_hora_inicio_fk']])) continue;

        $inicio = $mapa[$a['age_hora_inicio_fk']];
        $slots  = max(1, ceil($a['ser_duracao'] / 5));

        for ($i = 0; $i < $slots; $i++) {

            $pos = $inicio + $i;

            if (isset($horarios[$pos])) {

                $hid = $horarios[$pos]['hor_id'];

                $ocupados[$hid][$a['pis_id_fk']] = [
                    'id'       => $a['age_id'],
                    'cliente'  => $a['cli_nome'],
                    'servico'  => $a['ser_nome'],
                    'placa'    => $a['vei_placa'],
                    'cor'      => $a['ser_cor']
                ];

                $rowspan[$hid][$a['pis_id_fk']] = ($i == 0) ? $slots : 0;
            }
        }
    }

    $smarty->assign('HORARIOS', $horarios);
    $smarty->assign('PISTAS', $pistas);
    $smarty->assign('OCUPADOS', $ocupados);
    $smarty->assign('ROWSPAN', $rowspan);

    $smarty->display('templates/agenda/agenda_lista.tpl');
    exit;
}


// =============================
// 🟢 CADASTRAR
// =============================
if ($acao == 'cadastrar') {

    $clientes = $pdo->query("
        SELECT cli_id, cli_nome 
        FROM mod_clientes 
        WHERE cli_status='a'
        ORDER BY cli_nome
    ")->fetchAll(PDO::FETCH_ASSOC);

    $servicos = $pdo->query("
        SELECT ser_id, ser_nome, ser_cor 
        FROM mod_servicos 
        WHERE ser_status='a'
        ORDER BY ser_nome
    ")->fetchAll(PDO::FETCH_ASSOC);

    $pistas = $pdo->query("
        SELECT pis_id, pis_nome 
        FROM mod_pistas 
        WHERE pis_status='a'
    ")->fetchAll(PDO::FETCH_ASSOC);

    $horarios = $pdo->query("
        SELECT hor_id, hor_hora 
        FROM mod_horarios 
        ORDER BY hor_hora
    ")->fetchAll(PDO::FETCH_ASSOC);

    $smarty->assign('CLIENTES', $clientes);
    $smarty->assign('SERVICOS', $servicos);
    $smarty->assign('PISTAS', $pistas);
    $smarty->assign('HORARIOS', $horarios);

    $smarty->assign('horaSelecionada', $_GET['hora'] ?? '');
    $smarty->assign('pistaSelecionada', $_GET['pista'] ?? '');
    $smarty->assign('dataSelecionada', $_GET['data'] ?? date('Y-m-d'));

    $smarty->display('templates/agenda/cadastrar_agenda.tpl');
    exit;
}


// =============================
// 🔴 DESCRIÇÃO
// =============================
if ($acao == 'descricao') {

    $id = (int)$_GET['id'];

    $stmt = $pdo->prepare("
        SELECT 
            a.*,
            c.cli_nome,
            c.cli_email,
            v.vei_placa,
            v.vei_modelo,
            s.ser_nome,
            s.ser_valor,
            s.ser_duracao,
            s.ser_cor,
            h.hor_hora,
            com.com_comentario
        FROM mod_agendamentos a
        LEFT JOIN mod_clientes c ON c.cli_id = a.cli_id_fk
        LEFT JOIN mod_veiculos v ON v.vei_id = a.vei_id_fk
        LEFT JOIN mod_servicos s ON s.ser_id = a.ser_id_fk
        LEFT JOIN mod_horarios h ON h.hor_id = a.age_hora_inicio_fk
        LEFT JOIN mod_comentario com ON com.age_id_fk = a.age_id
        WHERE a.age_id = ?
    ");

    $stmt->execute([$id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    $inicio = strtotime($dados['hor_hora']);
    $dados['hora_fim'] = date('H:i', $inicio + ($dados['ser_duracao'] * 60));

    $smarty->assign('AG', $dados);
    $smarty->display('templates/agenda/descricao.tpl');
    exit;
}