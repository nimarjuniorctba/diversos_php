<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:20:08
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\empresas\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3614f89caad9_94176907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bd20c72c7245d5ff2d2a977fbb56f6100e3de48' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\empresas\\formulario.tpl',
      1 => 1781929152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a3614f89caad9_94176907 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar"><button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar">
    <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button>
    <div><p class="eyebrow">Empresas</p><h1><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Editar empresa<?php } else { ?>Cadastrar empresa<?php }?></h1></div>
    <div class="topbar__actions"><a class="secondary-button button-link" href="empresas.php">Voltar</a></div></header>
<section class="page-body clients-page">
<?php if (!empty($_smarty_tpl->tpl_vars['erros']->value)) {?><div class="alert alert--danger clients-message"><span class="alert__icon">×</span><div><strong>Revise os dados</strong><ul class="form-error-list"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['erros']->value, 'e');
$_smarty_tpl->tpl_vars['e']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->do_else = false;
?><li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['e']->value, ENT_QUOTES, 'UTF-8', true);?>
</li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div></div><?php }?>
<form method="post" class="client-form" id="formEmpresa"><input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"><input type="hidden" name="operacao" value="salvar"><input type="hidden" name="emp_id" value="<?php echo $_smarty_tpl->tpl_vars['empresa_formulario']->value['id'];?>
">
<article class="form-card client-form-card"><div class="form-card__header"><div><p class="eyebrow">Identificação</p><h2>Tipo de cadastro</h2></div><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?><span class="client-edit-id">ID #<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['empresa_formulario']->value['id']);?>
</span><?php }?></div>
<div class="client-type-selector"><label class="type-option"><input type="radio" name="emp_tipo_cad" value="f" <?php if ($_smarty_tpl->tpl_vars['empresa_formulario']->value['tipo'] === 'f') {?>checked<?php }?>><span><strong>Pessoa física</strong><small>CPF e nome</small></span></label>
<label class="type-option"><input type="radio" name="emp_tipo_cad" value="j" <?php if ($_smarty_tpl->tpl_vars['empresa_formulario']->value['tipo'] !== 'f') {?>checked<?php }?>><span><strong>Pessoa jurídica</strong><small>CNPJ e razão social</small></span></label></div></article>
<article class="form-card client-form-card company-pf"><div class="form-card__header"><div><h2>Dados da pessoa física</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field form-field--full"><label>Nome *</label><input name="emp_pf_nome" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pf_nome'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>CPF *</label><input name="emp_pf_cpf" data-mask="cpf" maxlength="15" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pf_cpf'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Data de nascimento</label><input name="emp_pf_dt_nascimento" data-mask="date" maxlength="10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pf_nascimento'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div></article>
<article class="form-card client-form-card company-pj"><div class="form-card__header"><div><h2>Dados da pessoa jurídica</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>CNPJ *</label><input name="emp_pj_cnpj" data-mask="cnpj" maxlength="18" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pj_cnpj'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Nome fantasia</label><input name="emp_pj_fantasia" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pj_fantasia'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field form-field--full"><label>Razão social *</label><input name="emp_pj_razao" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pj_razao'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Inscrição estadual</label><input name="emp_pj_ie" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pj_ie'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<label class="checkbox-field"><input type="checkbox" name="emp_pj_ie_isento" value="s" <?php if ($_smarty_tpl->tpl_vars['empresa_formulario']->value['pj_ie_isento'] === 's') {?>checked<?php }?>><span>Isento</span></label>
<div class="form-field form-field--full"><label>Responsável</label><input name="emp_pj_responsavel" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['pj_responsavel'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div></article>
<article class="form-card client-form-card"><div class="form-card__header"><div><h2>Endereço</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>CEP</label><input name="emp_cep" data-mask="cep" maxlength="10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['cep'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Rua</label><input name="emp_rua" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['rua'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Número</label><input name="emp_numero" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['numero'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Complemento</label><input name="emp_complemento" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['complemento'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Bairro</label><input name="emp_bairro" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['bairro'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Cidade</label><input name="emp_cidade" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['cidade'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Estado</label><input name="emp_estado" maxlength="2" class="uppercase-input" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['estado'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div></article>
<article class="form-card client-form-card"><div class="form-card__header"><div><h2>Contato e licença</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>Telefone</label><input name="emp_telefone" data-mask="phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['telefone'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Celular</label><input name="emp_celular" data-mask="phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['celular'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field form-field--full"><label>E-mail</label><input type="email" name="emp_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Facebook</label><input name="emp_facebook" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['facebook'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Instagram</label><input name="emp_instagram" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['instagram'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
<div class="form-field"><label>Validade do sistema *</label><input type="date" name="emp_validade_sistema" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa_formulario']->value['validade'], ENT_QUOTES, 'UTF-8', true);?>
" required></div></div></article>
<div class="client-form-actions"><a class="secondary-button button-link" href="empresas.php">Cancelar</a><button class="primary-button">Salvar empresa</button></div></form></section>

<?php }
}
