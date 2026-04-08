<?php
/* Smarty version 4.1.0, created on 2026-04-08 09:56:58
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_agendamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d6509aaee711_21324460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a69f06ed540fcad2f560194a74680fa73b9319db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_agendamento.tpl',
      1 => 1775652303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d6509aaee711_21324460 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Agendamento</h2>

<form method="POST">

    Data: <input type="date" name="data"><br>

    Cliente:
    <select name="cliente">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CLIENTES']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['cli_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['cli_nome'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br>

    Veículo:
    <input type="text" name="veiculo" placeholder="ID do veículo"><br>

    Serviço:
    <select name="servico">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVICOS']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['ser_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['ser_nome'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br>

    Pista:
    <select name="pista">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['pis_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['pis_nome'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br>

    Hora início:
    <select name="hora_inicio">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br>

    Hora fim:
    <select name="hora_fim">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br>

    <button>Salvar</button>

</form><?php }
}
