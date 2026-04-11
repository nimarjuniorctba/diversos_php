<?php
/* Smarty version 4.1.0, created on 2026-04-11 10:07:44
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\dashboard_tabela.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69da47a0a31ec9_12303945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b807392dfac1b86a540296e9d109df61acc35fd3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\dashboard_tabela.tpl',
      1 => 1775912827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69da47a0a31ec9_12303945 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Últimos Agendamentos</h3>

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

</table><?php }
}
