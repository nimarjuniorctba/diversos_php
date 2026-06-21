<?php
/* Smarty version 4.1.0, created on 2026-06-20 02:47:40
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\usuarios_sistema\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a36297c7cc308_54330515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd1e276b508126c0ade55d6ff90d4f008087ca43' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\usuarios_sistema\\formulario.tpl',
      1 => 1781934445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a36297c7cc308_54330515 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div><p class="eyebrow"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_titulo']->value, ENT_QUOTES, 'UTF-8', true);?>
</p><h1><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Editar<?php } else { ?>Cadastrar<?php }?></h1></div>
    <div class="topbar__actions"><a class="secondary-button button-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
">Voltar</a></div>
</header>
<section class="page-body clients-page">
    <?php if (!empty($_smarty_tpl->tpl_vars['erros']->value)) {?><div class="alert alert--danger clients-message"><span class="alert__icon">×</span>
        <div><strong>Revise os dados</strong><ul class="form-error-list"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['erros']->value, 'erro');
$_smarty_tpl->tpl_vars['erro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['erro']->value) {
$_smarty_tpl->tpl_vars['erro']->do_else = false;
?><li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['erro']->value, ENT_QUOTES, 'UTF-8', true);?>
</li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div></div><?php }?>
    <form method="post" class="client-form" id="formUsuarioSistema" novalidate>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="operacao" value="salvar">
        <input type="hidden" name="registro_id" value="<?php echo $_smarty_tpl->tpl_vars['registro_formulario']->value['id'];?>
">
        <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>
        <article class="form-card client-form-card">
            <div class="form-card__header"><div><p class="eyebrow">Identificação</p>
                <h2>Dados de acesso</h2><p>Nome, e-mail e credenciais do usuário.</p></div>
                <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?><span class="client-edit-id">ID #<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['registro_formulario']->value['id']);?>
</span><?php }?>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field form-field--full"><label for="registro_nome">Nome *</label>
                    <input id="registro_nome" name="registro_nome" type="text" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro_formulario']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
" required></div>
                <div class="form-field form-field--full"><label for="registro_email">E-mail *</label>
                    <input id="registro_email" name="registro_email" type="email" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro_formulario']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" required></div>
                <?php if ($_smarty_tpl->tpl_vars['mostrar_empresa']->value) {?>
                    <div class="form-field form-field--full"><label for="registro_empresa">Empresa *</label>
                        <select id="registro_empresa" name="registro_empresa" required>
                            <option value="">Selecione</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['empresas_opcoes']->value, 'empresa');
$_smarty_tpl->tpl_vars['empresa']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
$_smarty_tpl->tpl_vars['empresa']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['registro_formulario']->value['empresa'] == $_smarty_tpl->tpl_vars['empresa']->value['id']) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['empresa']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select></div>
                <?php }?>
            </div>
        </article>
        <article class="form-card client-form-card">
            <div class="form-card__header"><div><p class="eyebrow">Segurança</p><h2>Senha</h2>
                <p><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Deixe vazio para manter a senha atual.<?php } else { ?>Defina a senha de acesso.<?php }?></p></div></div>
            <div class="sample-form client-form-grid">
                <div class="form-field"><label for="registro_senha">Senha <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>*<?php }?></label>
                    <input id="registro_senha" name="registro_senha" type="password" maxlength="255" <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>required<?php }?>></div>
                <div class="form-field"><label for="registro_senha_confirmacao">Confirmar senha <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>*<?php }?></label>
                    <input id="registro_senha_confirmacao" name="registro_senha_confirmacao" type="password" maxlength="255" <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>required<?php }?>></div>
            </div>
        </article>
        <?php }?>
        <div class="client-form-actions"><a class="secondary-button button-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
">Cancelar</a>
            <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?><button class="secondary-button" id="toggleSystemPassword" type="button">Alterar senha</button><?php }?>
            <button class="primary-button" type="submit">Salvar</button></div>
    </form>
    <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>
        <article class="form-card client-form-card separate-password-card" id="systemPasswordCard" hidden>
            <div class="form-card__header"><div><p class="eyebrow">Segurança</p><h2>Alterar senha</h2><p>Esta operação é independente do cadastro.</p></div></div>
            <form class="ajax-password-form" data-type="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_tipo_senha']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['registro_formulario']->value['id'];?>
">
                <div class="sample-form client-form-grid">
                    <div class="form-field"><label>Nova senha</label><input name="senha" type="password" required></div>
                    <div class="form-field"><label>Confirmar senha</label><input name="confirmacao" type="password" required></div>
                </div>
                <div class="password-ajax-message" role="status"></div>
                <div class="password-card-actions"><button class="primary-button" type="submit">Salvar nova senha</button></div>
            </form>
        </article>
    <?php }?>
</section>
<?php }
}
