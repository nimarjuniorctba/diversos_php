<?php
/* Smarty version 4.1.0, created on 2026-04-11 10:02:09
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69da46511c3bc9_49348013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7acfd8fca271ff86833d7317fddf162bd896bd6e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\home.tpl',
      1 => 1775912518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69da46511c3bc9_49348013 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    margin: 0;
}

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

.container {
    padding: 20px;
}

.cards {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    flex: 1;
    min-width: 200px;
}

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

<div class="cards">
    <div class="card"><h3>Clientes</h3><p><?php echo $_smarty_tpl->tpl_vars['TOTAL_CLIENTES']->value;?>
</p></div>
    <div class="card"><h3>Veículos</h3><p><?php echo $_smarty_tpl->tpl_vars['TOTAL_VEICULOS']->value;?>
</p></div>
    <div class="card"><h3>Serviços</h3><p><?php echo $_smarty_tpl->tpl_vars['TOTAL_SERVICOS']->value;?>
</p></div>
    <div class="card"><h3>Hoje</h3><p><?php echo $_smarty_tpl->tpl_vars['TOTAL_AGENDAMENTOS']->value;?>
</p></div>
    <div class="card"><h3>Faturamento Hoje</h3><p>R$ <?php echo $_smarty_tpl->tpl_vars['FATURAMENTO']->value;?>
</p></div>
</div>


<h3>Faturamento Últimos 7 dias</h3>
<table>
<tr><th>Dia</th><th>Valor</th></tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SEMANA']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['dia'];?>
</td>
    <td>R$ <?php echo $_smarty_tpl->tpl_vars['s']->value['total'];?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<tr>
    <th>Total Mês</th>
    <th>R$ <?php echo $_smarty_tpl->tpl_vars['MES_TOTAL']->value;?>
</th>
</tr>
</table>


<h3>Faturamento por Mês</h3>
<table>
<tr><th>Mês</th><th>Valor</th></tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FATURAMENTO_MES']->value, 'm');
$_smarty_tpl->tpl_vars['m']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->do_else = false;
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['m']->value['mes'];?>
</td>
    <td>R$ <?php echo $_smarty_tpl->tpl_vars['m']->value['total'];?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>


<h3>Serviços por Mês</h3>
<table>
<tr><th>Mês</th><th>Qtd</th></tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVICOS_MES']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['mes'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['total'];?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<tr>
    <th>Total Ano</th>
    <th><?php echo $_smarty_tpl->tpl_vars['TOTAL_SERVICOS_ANO']->value;?>
</th>
</tr>
</table>


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

</body>
</html><?php }
}
