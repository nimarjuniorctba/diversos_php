<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:52:31
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\logs_rastreamento\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a361c8f15bca1_15959424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb8e8184bb4ba85bf75b4640405f6ea6801884db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\logs_rastreamento\\lista.tpl',
      1 => 1781931106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a361c8f15bca1_15959424 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\diversos_php\\paginalhtml\\menus\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"><?php echo '</script'; ?>
>
<header class="topbar"><button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button><div><p class="eyebrow">Configurações</p><h1>Logs de rastreamento</h1></div></header>
<section class="page-body tracking-page">
<form method="get" class="tracking-filters"><div class="form-field"><label>Condutor *</label><select name="condutor" required><option value="">Selecione um condutor</option><?php
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
<button class="primary-button" type="submit">Filtrar trajeto</button></form>
<div class="tracking-actions"><div><strong><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['nome_condutor']->value ?? null)===null||$tmp==='' ? 'Selecione um condutor' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</strong><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data_inicio']->value,"%d/%m/%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['hora_inicio']->value;?>
 até <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data_fim']->value,"%d/%m/%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['hora_fim']->value;?>
</span></div>
<a class="secondary-button button-link" target="_blank" href="logs_rastreamento_pdf.php?condutor=<?php echo $_smarty_tpl->tpl_vars['condutor_selecionado']->value;?>
&data_inicio=<?php echo $_smarty_tpl->tpl_vars['data_inicio']->value;?>
&data_fim=<?php echo $_smarty_tpl->tpl_vars['data_fim']->value;?>
&hora_inicio=<?php echo $_smarty_tpl->tpl_vars['hora_inicio']->value;?>
&hora_fim=<?php echo $_smarty_tpl->tpl_vars['hora_fim']->value;?>
">Exportar PDF</a></div>
<div class="tracking-stats"><article><span>Pontos encontrados</span><strong><?php echo $_smarty_tpl->tpl_vars['total_logs']->value;?>
</strong></article><article><span>Velocidade média</span><strong><?php echo $_smarty_tpl->tpl_vars['velocidade_media']->value;?>
 km/h</strong></article><article><span>Primeiro registro</span><strong><?php if ($_smarty_tpl->tpl_vars['total_logs']->value) {
echo $_smarty_tpl->tpl_vars['primeiro_log']->value['data'];
} else { ?>—<?php }?></strong></article><article><span>Último registro</span><strong><?php if ($_smarty_tpl->tpl_vars['total_logs']->value) {
echo $_smarty_tpl->tpl_vars['ultimo_log']->value['data'];
} else { ?>—<?php }?></strong></article></div>
<article class="tracking-map-card"><div class="dashboard-section-title"><div><p class="eyebrow">Trajeto</p><h2>Mapa do período</h2></div></div><div id="trackingMap"></div><?php echo '<script'; ?>
 id="trackingPoints" type="application/json"><?php echo $_smarty_tpl->tpl_vars['pontos_json']->value;
echo '</script'; ?>
></article>
<article class="table-card"><div class="table-toolbar"><strong>Registros encontrados</strong><span class="table-result-count">Máximo exibido: 5.000 pontos</span></div><div class="table-scroll"><table class="data-table tracking-table"><thead><tr><th>ID</th><th>Condutor</th><th>Latitude</th><th>Longitude</th><th>Velocidade</th><th>Data e hora</th></tr></thead><tbody><?php if ($_smarty_tpl->tpl_vars['total_logs']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logs']->value, 'l');
$_smarty_tpl->tpl_vars['l']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->do_else = false;
?><tr><td>#<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
</td><td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value['condutor'], ENT_QUOTES, 'UTF-8', true);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['l']->value['latitude'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['l']->value['longitude'];?>
</td><td><?php echo (($tmp = $_smarty_tpl->tpl_vars['l']->value['velocidade'] ?? null)===null||$tmp==='' ? '0' ?? null : $tmp);?>
 km/h</td><td><?php echo $_smarty_tpl->tpl_vars['l']->value['data'];?>
</td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><tr><td colspan="6"><div class="table-empty-state"><strong>Nenhum ponto encontrado nesse período.</strong></div></td></tr><?php }?></tbody></table></div></article>
</section>
<?php }
}
