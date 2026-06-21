<?php
/* Smarty version 4.1.0, created on 2026-06-20 02:25:26
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\relatorios\condutores.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a36244641a193_92106236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f00e22c145ee1855312ea2bceea749384141e4f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\relatorios\\condutores.tpl',
      1 => 1781932996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a36244641a193_92106236 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\diversos_php\\paginalhtml\\menus\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"><?php echo '</script'; ?>
>
<header class="topbar"><button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button><div><p class="eyebrow">Relatórios</p><h1>Condutores</h1></div></header>
<section class="page-body tracking-page report-driver-page">
<form method="get" class="tracking-filters report-filters"><div class="form-field"><label>Condutor *</label><select name="condutor" required><option value="">Selecione um condutor</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['condutores']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['con_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['condutor_selecionado']->value == $_smarty_tpl->tpl_vars['c']->value['con_id']) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['con_nome'], ENT_QUOTES, 'UTF-8', true);?>
 - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['con_placa'], ENT_QUOTES, 'UTF-8', true);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div>
<div class="form-field"><label>Data inicial</label><input type="date" name="data_inicio" value="<?php echo $_smarty_tpl->tpl_vars['data_inicio']->value;?>
"></div><div class="form-field"><label>Hora inicial</label><input type="time" name="hora_inicio" value="<?php echo $_smarty_tpl->tpl_vars['hora_inicio']->value;?>
"></div>
<div class="form-field"><label>Data final</label><input type="date" name="data_fim" value="<?php echo $_smarty_tpl->tpl_vars['data_fim']->value;?>
"></div><div class="form-field"><label>Hora final</label><input type="time" name="hora_fim" value="<?php echo $_smarty_tpl->tpl_vars['hora_fim']->value;?>
"></div>
<div class="form-field"><label>Valor por km (R$)</label><input type="number" name="valor_km" value="<?php echo $_smarty_tpl->tpl_vars['valor_km_input']->value;?>
" min="0" step="0.01"></div><button class="primary-button" type="submit">Calcular</button></form>
<div class="tracking-actions"><div><strong><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['nome_condutor']->value ?? null)===null||$tmp==='' ? 'Selecione um condutor' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['placa_condutor']->value) {?>- <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['placa_condutor']->value, ENT_QUOTES, 'UTF-8', true);
}?></strong><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data_inicio']->value,"%d/%m/%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['hora_inicio']->value;?>
 até <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data_fim']->value,"%d/%m/%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['hora_fim']->value;?>
</span></div><button class="secondary-button" id="openReportPopup" type="button">Exportar PDF</button></div>
<div class="tracking-stats report-stats"><article><span>Pontos GPS</span><strong><?php echo $_smarty_tpl->tpl_vars['total_pontos']->value;?>
</strong></article><article><span>Distância percorrida</span><strong><?php echo $_smarty_tpl->tpl_vars['distancia_km']->value;?>
 km</strong></article><article><span>Velocidade média</span><strong><?php echo $_smarty_tpl->tpl_vars['velocidade_media']->value;?>
 km/h</strong></article><article><span>Valor por km</span><strong>R$ <?php echo $_smarty_tpl->tpl_vars['valor_km']->value;?>
</strong></article><article class="report-total-card"><span>Valor calculado</span><strong>R$ <?php echo $_smarty_tpl->tpl_vars['valor_total']->value;?>
</strong></article></div>
<article class="tracking-map-card"><div class="dashboard-section-title"><div><p class="eyebrow">Trajeto calculado</p><h2>Mapa do período pesquisado</h2></div></div><div id="reportTrackingMap"></div><?php echo '<script'; ?>
 id="reportTrackingPoints" type="application/json"><?php echo $_smarty_tpl->tpl_vars['pontos_json']->value;
echo '</script'; ?>
></article>
</section>
<div class="popup" id="reportExportPopup" aria-hidden="true"><div class="popup__dialog report-popup" role="dialog" aria-modal="true"><button class="popup__close close-report-popup" type="button">×</button><span class="popup__icon popup__icon--info">PDF</span><h3>Montar relatório</h3><p>Escolha os blocos que deseja incluir no arquivo.</p>
<form method="post" action="relatorio_condutores_pdf.php" target="_blank" class="report-options-form">
<input type="hidden" name="condutor" value="<?php echo $_smarty_tpl->tpl_vars['condutor_selecionado']->value;?>
"><input type="hidden" name="data_inicio" value="<?php echo $_smarty_tpl->tpl_vars['data_inicio']->value;?>
"><input type="hidden" name="data_fim" value="<?php echo $_smarty_tpl->tpl_vars['data_fim']->value;?>
"><input type="hidden" name="hora_inicio" value="<?php echo $_smarty_tpl->tpl_vars['hora_inicio']->value;?>
"><input type="hidden" name="hora_fim" value="<?php echo $_smarty_tpl->tpl_vars['hora_fim']->value;?>
"><input type="hidden" name="valor_km" value="<?php echo $_smarty_tpl->tpl_vars['valor_km_input']->value;?>
">
<label><input type="checkbox" name="incluir_cabecalho" value="1" checked><span><strong>Cabeçalho institucional</strong><small>Logo, nome fantasia, CNPJ, e-mail e WhatsApp.</small></span></label>
<label><input type="checkbox" name="incluir_resumo" value="1" checked><span><strong>Resumo do cálculo</strong><small>Período, distância, velocidade, valor por km e total.</small></span></label>
<label><input type="checkbox" name="incluir_mapa" value="1" checked><span><strong>Mapa do trajeto</strong><small>Desenho completo do percurso, com início e fim.</small></span></label>
<label><input type="checkbox" name="incluir_detalhes" value="1"><span><strong>Detalhamento dos pontos</strong><small>Lista de coordenadas e horários registrados.</small></span></label>
<div class="popup__actions"><button class="secondary-button close-report-popup" type="button">Cancelar</button><button class="primary-button" type="submit">Gerar PDF</button></div></form></div></div>
<?php }
}
