<?php
/* Smarty version 4.1.0, created on 2026-04-09 17:11:02
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\agenda\agenda_lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d807d6d74415_86906477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6afc1365e8bacf1508e9b86ae84146e0df7e3d2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\agenda\\agenda_lista.tpl',
      1 => 1775765460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d807d6d74415_86906477 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
table {
    border-collapse: collapse;
    width: 100%;
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
    cursor: pointer;
}

.ocupado {
    color: #fff;
    font-weight: bold;
    font-size: 12px;
    cursor: pointer;
    border-radius: 4px;
}

.ocupado small {
    display:block;
    font-size:10px;
}
</style>

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

<?php $_smarty_tpl->_assignInScope('info', (($tmp = $_smarty_tpl->tpl_vars['OCUPADOS']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? null ?? null : $tmp));
$_smarty_tpl->_assignInScope('span', (($tmp = $_smarty_tpl->tpl_vars['ROWSPAN']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp));?>

<?php if ($_smarty_tpl->tpl_vars['info']->value) {?>

    <?php if ($_smarty_tpl->tpl_vars['span']->value > 0) {?>
        <td class="ocupado"
            rowspan="<?php echo $_smarty_tpl->tpl_vars['span']->value;?>
"
            data-id="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
"
            style="background: <?php echo (($tmp = $_smarty_tpl->tpl_vars['info']->value['cor'] ?? null)===null||$tmp==='' ? '#dc3545' ?? null : $tmp);?>
;">

            <strong><?php echo $_smarty_tpl->tpl_vars['info']->value['cliente'];?>
</strong>

            <small><?php echo $_smarty_tpl->tpl_vars['info']->value['servico'];?>
</small>

            <small>
                🚗 <?php echo (($tmp = $_smarty_tpl->tpl_vars['info']->value['placa'] ?? null)===null||$tmp==='' ? "---" ?? null : $tmp);?>

            </small>

        </td>
    <?php }?>

<?php } else { ?>

    <td class="livre"
        data-hora="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
"
        data-pista="<?php echo $_smarty_tpl->tpl_vars['p']->value['pis_id'];?>
">
        Livre
    </td>

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
