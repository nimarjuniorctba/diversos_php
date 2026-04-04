<?php
/* Smarty version 4.1.0, created on 2026-04-04 08:53:18
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo02\templates\agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d0fbae90b862_00730691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cec090b896a9ef388b555cb80b04456324c86a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo02\\templates\\agenda.tpl',
      1 => 1775303595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d0fbae90b862_00730691 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    body {
        font-family: Arial;
        background: #f4f4f4;
        padding: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 1100px;
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
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        font-weight: bold;
        font-size: 12px;
        vertical-align: middle;
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

                <?php $_smarty_tpl->_assignInScope('info', (($tmp = $_smarty_tpl->tpl_vars['OCUPADOS']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? null ?? null : $tmp));?>
                <?php $_smarty_tpl->_assignInScope('span', (($tmp = $_smarty_tpl->tpl_vars['ROWSPAN']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? null ?? null : $tmp));?>

                <?php if ($_smarty_tpl->tpl_vars['info']->value) {?>

                    <?php if ($_smarty_tpl->tpl_vars['span']->value > 0) {?>
                        <td class="ocupado" rowspan="<?php echo $_smarty_tpl->tpl_vars['span']->value;?>
">
                            <strong><?php echo $_smarty_tpl->tpl_vars['info']->value['cliente'];?>
</strong><br>
                            <small><?php echo $_smarty_tpl->tpl_vars['info']->value['servico'];?>
</small><br>
                            <small><?php echo $_smarty_tpl->tpl_vars['info']->value['duracao'];?>
 min</small>
                        </td>
                    <?php }?>

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
