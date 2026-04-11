<?php
/* Smarty version 4.1.0, created on 2026-04-11 10:13:22
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69da48f231ae69_25581178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4a3df9e42e0a7d088f2d054f8989aa1d56cd26f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\dashboard.tpl',
      1 => 1775913198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69da48f231ae69_25581178 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>

<style>

body {
    font-family: Arial;
    background: #f4f4f4;
    margin: 0;
}

/* MENU */
.menu {
    background: #333;
    padding: 15px;
}

.menu a {
    color: #fff;
    margin-right: 15px;
    text-decoration: none;
    font-weight: bold;
}

/* CONTAINER */
.container {
    padding: 20px;
}

/* ================= CARDS ================= */
.cards {
    display: flex;
    gap: 10px;
    flex-wrap: nowrap; /* 🔥 força ficar na mesma linha */
    overflow-x: auto; /* caso não caiba, cria scroll */
}

.card {
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    min-width: 160px;
    flex: 1;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.card h3 {
    margin: 0;
    font-size: 13px;
    color: #666;
}

.card p {
    font-size: 22px;
    margin: 5px 0 0;
    font-weight: bold;
}

/* ================= GRID ================= */
.grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 15px;
    margin-top: 20px;
}

.grid-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
}

/* BLOCO */
.bloco {
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.bloco h3 {
    margin-top: 0;
}

/* TABELA */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    background: #fff;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
}

th {
    background: #333;
    color: #fff;
}

</style>

</head>
<body>

<!-- MENU -->
<div class="menu">
    <a href="home.php">🏠 Home</a>
    <a href="cad_clientes.php">👤 Clientes</a>
    <a href="cad_servico.php">🧼 Serviços</a>
    <a href="cad_pista.php">🚗 Pistas</a>
    <a href="cad_veiculo.php">🚘 Veículos</a>
    <a href="agenda.php">📅 Agenda</a>
</div>

<div class="container">

    <h2>Dashboard</h2>

    <!-- 🔥 CARDS EM LINHA -->
    <div class="cards">

        <div class="card">
            <h3>Clientes</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['TOTAL_CLIENTES']->value;?>
</p>
        </div>

        <div class="card">
            <h3>Veículos</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['TOTAL_VEICULOS']->value;?>
</p>
        </div>

        <div class="card">
            <h3>Serviços</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['TOTAL_SERVICOS']->value;?>
</p>
        </div>

        <div class="card">
            <h3>Agendamentos Hoje</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['TOTAL_AGENDAMENTOS']->value;?>
</p>
        </div>

        <div class="card">
            <h3>Faturamento Hoje</h3>
            <p>R$ <?php echo $_smarty_tpl->tpl_vars['FATURAMENTO']->value;?>
</p>
        </div>

    </div>

    <!-- 🔥 FATURAMENTO SEMANA + RESUMO -->
    <div class="grid">

        <div class="bloco">
            <h3>Faturamento últimos 7 dias</h3>
            <canvas id="graficoSemana"></canvas>
        </div>

        <div class="bloco">
            <h3>Resumo</h3>
            <p><strong>Mês atual:</strong> R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL_MES']->value;?>
</p>
            <p><strong>Total serviços:</strong> <?php echo $_smarty_tpl->tpl_vars['TOTAL_SERVICOS_ANO']->value;?>
</p>
        </div>

    </div>

    <!-- 🔥 3 BLOCOS MENORES -->
    <div class="grid-3">

        <div class="bloco">
            <h3>Faturamento por mês</h3>
            <canvas id="graficoMes"></canvas>
        </div>

        <div class="bloco">
            <h3>Serviços por mês</h3>
            <canvas id="graficoServicos"></canvas>
        </div>

        <div class="bloco">
            <h3>Resumo geral</h3>
            <p><strong>Ano atual:</strong> <?php echo $_smarty_tpl->tpl_vars['ANO_ATUAL']->value;?>
</p>
            <p><strong>Total faturado:</strong> R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL_ANO']->value;?>
</p>
        </div>

    </div>

    <!-- 🔥 ÚLTIMOS AGENDAMENTOS -->
    <h3>Últimos Agendamentos</h3>

    <table>
        <tr>
            <th>Data</th>
            <th>Cliente</th>
            <th>Veículo</th>
            <th>Serviço</th>
            <th>Valor</th>
        </tr>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AGENDAMENTOS']->value, 'a');
$_smarty_tpl->tpl_vars['a']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['age_data'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['cli_nome'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['vei_placa'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ser_nome'];?>
</td>
            <td>R$ <?php echo $_smarty_tpl->tpl_vars['a']->value['age_valor_final'];?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </table>

</div>

<!-- ================= GRÁFICOS ================= -->
<?php echo '<script'; ?>
>

// 📊 FATURAMENTO SEMANA
new Chart(document.getElementById('graficoSemana'), {
    type: 'bar',
    data: {
        labels: <?php echo $_smarty_tpl->tpl_vars['LABELS_SEMANA']->value;?>
,
        datasets: [{
            label: 'R$',
            data: <?php echo $_smarty_tpl->tpl_vars['DADOS_SEMANA']->value;?>

        }]
    }
});

// 📊 FATURAMENTO MENSAL
new Chart(document.getElementById('graficoMes'), {
    type: 'line',
    data: {
        labels: <?php echo $_smarty_tpl->tpl_vars['LABELS_MES']->value;?>
,
        datasets: [{
            label: 'R$',
            data: <?php echo $_smarty_tpl->tpl_vars['DADOS_MES']->value;?>

        }]
    }
});

// 📊 SERVIÇOS POR MÊS
new Chart(document.getElementById('graficoServicos'), {
    type: 'bar',
    data: {
        labels: <?php echo $_smarty_tpl->tpl_vars['LABELS_SERVICOS']->value;?>
,
        datasets: [{
            label: 'Qtd',
            data: <?php echo $_smarty_tpl->tpl_vars['DADOS_SERVICOS']->value;?>

        }]
    }
});

<?php echo '</script'; ?>
>

</body>
</html><?php }
}
