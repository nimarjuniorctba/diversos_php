<?php
/* Smarty version 4.1.0, created on 2026-04-11 10:07:44
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\dashboard_financeiro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69da47a0a1d572_04706621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa4fd1b03a9292e1dfc24ff77a6ac9417bec307c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\dashboard_financeiro.tpl',
      1 => 1775912798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69da47a0a1d572_04706621 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box">
<h3>Faturamento últimos 7 dias</h3>
<canvas id="graficoSemana"></canvas>
</div>

<div class="box">
<h3>Faturamento por mês</h3>
<canvas id="graficoMes"></canvas>
</div>

<div class="box">
<h3>Serviços por mês</h3>
<canvas id="graficoServico"></canvas>
</div>

<div class="box">
<h3>Resumo</h3>
<p><strong>Mês atual:</strong> R$ <?php echo $_smarty_tpl->tpl_vars['FATURAMENTO_MES']->value;?>
</p>
</div><?php }
}
