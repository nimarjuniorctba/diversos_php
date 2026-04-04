<?php
/* Smarty version 4.1.0, created on 2026-04-04 01:52:58
  from 'C:\xampp\htdocs\diversos_php\agenda\templates\agendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d0992a2b2190_18545135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30d773a2cb9c882e2a952a8ead466e3f3f169879' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda\\templates\\agendar.tpl',
      1 => 1775277872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d0992a2b2190_18545135 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    body {
        font-family: Arial;
        background: #f4f4f4;
        padding: 20px;
    }

    form {
        background: #fff;
        padding: 20px;
        max-width: 400px;
        border-radius: 8px;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    select, input, button {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
    }

    button {
        background: #28a745;
        color: #fff;
        border: none;
        margin-top: 15px;
        cursor: pointer;
    }
</style>

<h2>Novo Agendamento</h2>

<form method="POST">

    <label>Data</label>
    <input type="date" name="data" required>

    <label>Horário</label>
    <select name="hora" required>
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
    </select>

    <label>Pista</label>
    <select name="pista" required>
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
    </select>

    <label>Cliente</label>
    <select name="cliente" required>
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
    </select>

    <label>Serviço</label>
    <select name="servico" required>
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
    </select>

    <button type="submit">Agendar</button>

</form><?php }
}
