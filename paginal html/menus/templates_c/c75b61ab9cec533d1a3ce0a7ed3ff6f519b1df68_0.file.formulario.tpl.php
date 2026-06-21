<?php
/* Smarty version 4.1.0, created on 2026-06-20 02:49:18
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\condutores\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3629de796399_08760041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c75b61ab9cec533d1a3ce0a7ed3ff6f519b1df68' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\condutores\\formulario.tpl',
      1 => 1781934433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a3629de796399_08760041 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div>
        <p class="eyebrow">Condutores</p>
        <h1><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Editar condutor<?php } else { ?>Cadastrar condutor<?php }?></h1>
    </div>
    <div class="topbar__actions">
        <a class="secondary-button button-link" href="condutores.php">Voltar à lista</a>
    </div>
</header>

<section class="page-body clients-page">
    <?php if (!empty($_smarty_tpl->tpl_vars['erros']->value)) {?>
        <div class="alert alert--danger clients-message">
            <span class="alert__icon">×</span>
            <div><strong>Revise os dados informados</strong>
                <ul class="form-error-list"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['erros']->value, 'erro');
$_smarty_tpl->tpl_vars['erro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['erro']->value) {
$_smarty_tpl->tpl_vars['erro']->do_else = false;
?><li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['erro']->value, ENT_QUOTES, 'UTF-8', true);?>
</li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul>
            </div>
        </div>
    <?php }?>

    <form method="post" class="client-form" id="formCondutor" novalidate>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="operacao" value="salvar">
        <input type="hidden" name="con_id" value="<?php echo $_smarty_tpl->tpl_vars['condutor_formulario']->value['id'];?>
">

        <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>
        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Identificação</p>
                    <h2>Dados do condutor</h2>
                    <p>Informações utilizadas na administração e no aplicativo.</p>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?><span class="client-edit-id">ID #<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['condutor_formulario']->value['id']);?>
</span><?php }?>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field form-field--full">
                    <label for="con_nome">Nome completo *</label>
                    <input id="con_nome" name="con_nome" type="text" maxlength="100"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor_formulario']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
" required>
                </div>
                <div class="form-field">
                    <label for="con_telefone">Telefone *</label>
                    <input id="con_telefone" name="con_telefone" type="text" maxlength="20"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor_formulario']->value['telefone'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="(00) 00000-0000"
                        data-mask="phone" required>
                </div>
                <div class="form-field">
                    <label for="con_placa">Placa do veículo *</label>
                    <input id="con_placa" name="con_placa" type="text" maxlength="10"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor_formulario']->value['placa'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="ABC1D23"
                        class="uppercase-input" required>
                </div>
                <div class="form-field form-field--full">
                    <label for="con_email">E-mail de acesso *</label>
                    <input id="con_email" name="con_email" type="email" maxlength="100"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor_formulario']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="condutor@exemplo.com" required>
                </div>
            </div>
        </article>

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Segurança</p>
                    <h2><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Alterar senha<?php } else { ?>Senha de acesso<?php }?></h2>
                    <p><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Deixe os campos vazios para manter a senha atual.<?php } else { ?>Senha usada pelo condutor no aplicativo.<?php }?></p>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="con_senha">Senha <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>*<?php }?></label>
                    <input id="con_senha" name="con_senha" type="password" maxlength="100"
                        autocomplete="new-password" <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>required<?php }?>>
                </div>
                <div class="form-field">
                    <label for="con_senha_confirmacao">Confirmar senha <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>*<?php }?></label>
                    <input id="con_senha_confirmacao" name="con_senha_confirmacao" type="password"
                        maxlength="100" autocomplete="new-password" <?php if (!$_smarty_tpl->tpl_vars['modo_edicao']->value) {?>required<?php }?>>
                    <small id="senhaCondutorAviso"></small>
                </div>
            </div>
        </article>
        <?php }?>

        <div class="client-form-actions">
            <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>
                <button class="danger-button edit-driver-action" type="button" data-action="excluir">Excluir</button>
                <button class="secondary-button edit-driver-action" type="button" data-action="<?php if ($_smarty_tpl->tpl_vars['condutor_formulario']->value['status'] === 'a') {?>desativar<?php } else { ?>ativar<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['condutor_formulario']->value['status'] === 'a') {?>Desativar<?php } else { ?>Ativar<?php }?>
                </button>
                <button class="secondary-button" id="toggleDriverPassword" type="button">Alterar senha</button>
            <?php }?>
            <a class="secondary-button button-link" href="condutores.php">Cancelar</a>
            <button class="primary-button" type="submit">
                <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Salvar alterações<?php } else { ?>Cadastrar condutor<?php }?>
            </button>
        </div>
    </form>

    <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>
        <article class="form-card client-form-card separate-password-card" id="driverPasswordCard" hidden>
            <div class="form-card__header"><div><p class="eyebrow">Segurança</p><h2>Alterar senha</h2><p>A senha será salva separadamente por AJAX.</p></div></div>
            <form class="ajax-password-form" data-type="condutor">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['condutor_formulario']->value['id'];?>
">
                <div class="sample-form client-form-grid">
                    <div class="form-field"><label>Nova senha</label><input name="senha" type="password" required></div>
                    <div class="form-field"><label>Confirmar senha</label><input name="confirmacao" type="password" required></div>
                </div>
                <div class="password-ajax-message" role="status"></div>
                <div class="password-card-actions"><button class="primary-button" type="submit">Salvar nova senha</button></div>
            </form>
        </article>
        <form method="post" id="driverEditActionForm" hidden>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="operacao" id="driverEditOperation">
            <input type="hidden" name="con_id" value="<?php echo $_smarty_tpl->tpl_vars['condutor_formulario']->value['id'];?>
">
            <input type="hidden" name="novo_status" id="driverEditStatus">
        </form>
    <?php }?>
</section>
<?php }
}
