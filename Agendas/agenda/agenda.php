<?php

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$smarty = new Smarty();
$pdo = MySQL_PDO::conexao();

// =============================
// 🔹 HORÁRIOS
// =============================
$sql = "SELECT hor_id, hor_hora FROM agenda.mod_horarios ORDER BY hor_id";
$horarios = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 PISTAS
// =============================
$sql = "SELECT pis_id, pis_nome FROM agenda.mod_pistas WHERE pis_status = 'A' ORDER BY pis_id";
$pistas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// =============================
// 🔹 AGENDAMENTOS + DURAÇÃO
// =============================
$sql = "
SELECT 
    a.hora_id_fk,
    a.pis_id_fk,
    COALESCE(s.ser_duracao, 5) AS duracao
FROM agenda.mod_agendamentos a
LEFT JOIN servicos s ON s.ser_id = a.ser_id_fk
WHERE a.data = CURDATE()
";

$agendamentos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// =============================
// 🔹 MAPA DE HORÁRIOS (ID → POSIÇÃO)
// =============================
$mapa = [];
foreach ($horarios as $i => $h) {
    $mapa[$h['hor_id']] = $i;
}


// =============================
// 🔹 OCUPAÇÃO COM DURAÇÃO
// =============================
$ocupados = [];

foreach ($agendamentos as $a) {

    $horaInicial = (int)$a['hora_id_fk'];
    $pista       = (int)$a['pis_id_fk'];
    $duracao     = (int)$a['duracao'];

    if (!$horaInicial || !$pista) continue;

    // garante mínimo 1 slot
    if ($duracao <= 0) $duracao = 5;

    $slots = max(1, intval($duracao / 5));

    if (!isset($mapa[$horaInicial])) continue;

    $inicio = $mapa[$horaInicial];

    for ($i = 0; $i < $slots; $i++) {

        $pos = $inicio + $i;

        if (isset($horarios[$pos])) {
            $hid = $horarios[$pos]['hor_id'];
            $ocupados[$hid][$pista] = true;
        }
    }
}


// =============================
// 🔹 ENVIA PARA SMARTY
// =============================
$smarty->assign('HORARIOS', $horarios);
$smarty->assign('PISTAS', $pistas);
$smarty->assign('OCUPADOS', $ocupados);


// =============================
// 🔹 EXIBE
// =============================
$smarty->display('agenda.tpl');