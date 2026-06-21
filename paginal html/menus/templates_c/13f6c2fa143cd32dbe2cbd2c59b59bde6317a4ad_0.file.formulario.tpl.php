<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:52:28
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\meus_dados\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a361c8ce01502_97782215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13f6c2fa143cd32dbe2cbd2c59b59bde6317a4ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\meus_dados\\formulario.tpl',
      1 => 1781930848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a361c8ce01502_97782215 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar"><button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button><div><p class="eyebrow">Configurações</p><h1>Meus dados</h1></div></header>
<section class="page-body clients-page"><?php if (!empty($_smarty_tpl->tpl_vars['mensagem']->value)) {?><div class="alert alert--success clients-message"><span class="alert__icon">✓</span><div><strong>Tudo certo!</strong><p><?php echo $_smarty_tpl->tpl_vars['mensagem']->value['texto'];?>
</p></div></div><?php }?>
<form method="post" class="client-form"><input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"><input type="hidden" name="sis_id" value="<?php echo $_smarty_tpl->tpl_vars['sistema']->value['id'];?>
">
<article class="form-card client-form-card"><div class="form-card__header"><div><p class="eyebrow">Identidade</p><h2>Dados do sistema</h2></div></div><div class="sample-form client-form-grid">
<div class="form-field"><label>CNPJ</label><input name="sis_cnpj" data-mask="cnpj" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['cnpj'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Nome fantasia</label><input name="sis_nome_fantasia" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['fantasia'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field form-field--full"><label>Razão social</label><input name="sis_razao" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['razao'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Inscrição estadual</label><input name="sis_ie" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['ie'], ENT_QUOTES, 'UTF-8', true);?>
"></div><label class="checkbox-field"><input type="checkbox" name="sis_ie_isento" <?php if ($_smarty_tpl->tpl_vars['sistema']->value['isento'] === 's') {?>checked<?php }?>><span>Isento</span></label><div class="form-field form-field--full"><label>Responsável</label><input name="sis_responsavel" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['responsavel'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div></article>
<article class="form-card client-form-card"><div class="form-card__header"><div><h2>Endereço</h2></div></div><div class="sample-form client-form-grid"><div class="form-field"><label>CEP</label><input name="sis_cep" data-mask="cep" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['cep'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Rua</label><input name="sis_rua" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['rua'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Número</label><input name="sis_numero" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['numero'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Complemento</label><input name="sis_complemento" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['complemento'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Bairro</label><input name="sis_bairro" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['bairro'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Cidade</label><input name="sis_cidade" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['cidade'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Estado</label><input name="sis_estado" maxlength="2" class="uppercase-input" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['estado'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div></article>
<article class="form-card client-form-card"><div class="form-card__header"><div><h2>Contato</h2></div></div><div class="sample-form client-form-grid"><div class="form-field"><label>Telefone</label><input name="sis_telefone" data-mask="phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['telefone'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Celular</label><input name="sis_celular" data-mask="phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['celular'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>WhatsApp</label><input name="sis_whatsapp" data-mask="phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['whatsapp'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>E-mail</label><input type="email" name="sis_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Facebook</label><input name="sis_facebook" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['facebook'], ENT_QUOTES, 'UTF-8', true);?>
"></div><div class="form-field"><label>Instagram</label><input name="sis_instagram" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sistema']->value['instagram'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div></article>
<div class="client-form-actions"><button class="primary-button" type="submit">Salvar meus dados</button></div></form></section>
<?php }
}
