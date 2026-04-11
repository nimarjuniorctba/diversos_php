<?php
/* Smarty version 4.1.0, created on 2026-04-11 10:07:44
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\dashboard_cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69da47a0a11a05_95542984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7fe06a9f889e7dfc75579fb39d1725fa3363696' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\dashboard_cards.tpl',
      1 => 1775912773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69da47a0a11a05_95542984 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="grid">

<div class="box">
<h3>Clientes</h3>
<p><?php echo $_smarty_tpl->tpl_vars['TOTAL_CLIENTES']->value;?>
</p>
</div>

<div class="box">
<h3>Veículos</h3>
<p><?php echo $_smarty_tpl->tpl_vars['TOTAL_VEICULOS']->value;?>
</p>
</div>

<div class="box">
<h3>Serviços</h3>
<p><?php echo $_smarty_tpl->tpl_vars['TOTAL_SERVICOS']->value;?>
</p>
</div>

<div class="box">
<h3>Agendamentos Hoje</h3>
<p><?php echo $_smarty_tpl->tpl_vars['TOTAL_AGENDAMENTOS']->value;?>
</p>
</div>

<div class="box">
<h3>Faturamento Hoje</h3>
<p>R$ <?php echo $_smarty_tpl->tpl_vars['FATURAMENTO']->value;?>
</p>
</div>

</div><?php }
}
