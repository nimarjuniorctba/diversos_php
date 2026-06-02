<?php
/* Smarty version 4.1.0, created on 2026-04-04 01:57:24
  from 'C:\xampp\htdocs\diversos_php\agenda\templates\agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d09a342f4b88_69807715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba6853f053605467bd5fbb1b286eb5d2a05bee5a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda\\templates\\agenda.tpl',
      1 => 1775278637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d09a342f4b88_69807715 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 900px;
        background: #fff;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 6px;
        text-align: center;
    }

    th {
        background: #333;
        color: #fff;
    }

    .livre {
        background: #d4edda;
    }

    .ocupado {
        background: #f8d7da;
        font-weight: bold;
    }
</style>

<h2>Agenda do Dia</h2>

<table>
    <thead>
        <tr>
            <th>Horário</th>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                <th><?php echo $_smarty_tpl->tpl_vars['p']->value['pis_nome'];?>
</th>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
    </thead>

    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>
</td>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>

                <?php if ((($tmp = $_smarty_tpl->tpl_vars['OCUPADOS']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
                    <td class="ocupado">Ocupado</td>
                <?php } else { ?>
                    <td class="livre">Livre</td>
                <?php }?>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
