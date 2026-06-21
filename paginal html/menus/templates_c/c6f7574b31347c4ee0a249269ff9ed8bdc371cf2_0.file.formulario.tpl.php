<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:02:41
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\clientes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3610e1ba4b26_52996709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6f7574b31347c4ee0a249269ff9ed8bdc371cf2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\clientes\\formulario.tpl',
      1 => 1781928114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a3610e1ba4b26_52996709 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button
        class="icon-button mobile-menu-button"
        id="mobileMenuButton"
        type="button"
        aria-label="Abrir menu"
        aria-expanded="false"
        aria-controls="sidebar">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div>
        <p class="eyebrow">Clientes</p>
        <h1><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Editar cliente<?php } else { ?>Cadastrar cliente<?php }?></h1>
    </div>

    <div class="topbar__actions">
        <a class="secondary-button button-link" href="clientes.php">Voltar à lista</a>
    </div>
</header>

<section class="page-body clients-page">
    <?php if (!empty($_smarty_tpl->tpl_vars['erros']->value)) {?>
        <div class="alert alert--danger clients-message">
            <span class="alert__icon">×</span>
            <div>
                <strong>Revise os dados informados</strong>
                <ul class="form-error-list">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['erros']->value, 'erro');
$_smarty_tpl->tpl_vars['erro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['erro']->value) {
$_smarty_tpl->tpl_vars['erro']->do_else = false;
?>
                        <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['erro']->value, ENT_QUOTES, 'UTF-8', true);?>
</li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
    <?php }?>

    <form method="post" class="client-form" id="formCliente" novalidate>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="operacao" value="salvar">
        <input type="hidden" name="cli_id" value="<?php echo $_smarty_tpl->tpl_vars['cliente_formulario']->value['id'];?>
">

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Identificação</p>
                    <h2>Tipo de cadastro</h2>
                    <p>Escolha pessoa física ou jurídica para exibir os campos correspondentes.</p>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>
                    <span class="client-edit-id">ID #<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['cliente_formulario']->value['id']);?>
</span>
                <?php }?>
            </div>

            <div class="client-type-selector">
                <label class="type-option">
                    <input
                        type="radio"
                        name="cli_tipo_cad"
                        value="f"
                        <?php if ($_smarty_tpl->tpl_vars['cliente_formulario']->value['tipo_cadastro'] !== 'j') {?>checked<?php }?>>
                    <span>
                        <strong>Pessoa física</strong>
                        <small>Cadastro com nome e CPF</small>
                    </span>
                </label>
                <label class="type-option">
                    <input
                        type="radio"
                        name="cli_tipo_cad"
                        value="j"
                        <?php if ($_smarty_tpl->tpl_vars['cliente_formulario']->value['tipo_cadastro'] === 'j') {?>checked<?php }?>>
                    <span>
                        <strong>Pessoa jurídica</strong>
                        <small>Cadastro com razão social e CNPJ</small>
                    </span>
                </label>
            </div>
        </article>

        <article class="form-card client-form-card client-fields-pf">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Pessoa física</p>
                    <h2>Dados pessoais</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field form-field--full">
                    <label for="cli_pf_nome">Nome completo *</label>
                    <input
                        id="cli_pf_nome"
                        name="cli_pf_nome"
                        type="text"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pf_nome'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="Nome completo do cliente">
                </div>
                <div class="form-field">
                    <label for="cli_pf_cpf">CPF *</label>
                    <input
                        id="cli_pf_cpf"
                        name="cli_pf_cpf"
                        type="text"
                        maxlength="14"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pf_cpf'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="000.000.000-00"
                        data-mask="cpf">
                </div>
                <div class="form-field">
                    <label for="cli_pf_dt_nascimento">Data de nascimento</label>
                    <input
                        id="cli_pf_dt_nascimento"
                        name="cli_pf_dt_nascimento"
                        type="text"
                        maxlength="10"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pf_dt_nascimento'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="00/00/0000"
                        data-mask="date">
                </div>
            </div>
        </article>

        <article class="form-card client-form-card client-fields-pj">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Pessoa jurídica</p>
                    <h2>Dados da empresa</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="cli_pj_cnpj">CNPJ *</label>
                    <input
                        id="cli_pj_cnpj"
                        name="cli_pj_cnpj"
                        type="text"
                        maxlength="18"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pj_cnpj'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="00.000.000/0000-00"
                        data-mask="cnpj">
                </div>
                <div class="form-field">
                    <label for="cli_pj_fantasia">Nome fantasia</label>
                    <input
                        id="cli_pj_fantasia"
                        name="cli_pj_fantasia"
                        type="text"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pj_fantasia'], ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="form-field form-field--full">
                    <label for="cli_pj_razao">Razão social *</label>
                    <input
                        id="cli_pj_razao"
                        name="cli_pj_razao"
                        type="text"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pj_razao'], ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="form-field">
                    <label for="cli_pj_ie">Inscrição estadual</label>
                    <input
                        id="cli_pj_ie"
                        name="cli_pj_ie"
                        type="text"
                        maxlength="45"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pj_ie'], ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <label class="checkbox-field client-ie-checkbox">
                    <input
                        id="cli_pj_ie_isento"
                        name="cli_pj_ie_isento"
                        type="checkbox"
                        value="s"
                        <?php if ($_smarty_tpl->tpl_vars['cliente_formulario']->value['pj_ie_isento'] === 's') {?>checked<?php }?>>
                    <span>Cliente isento de inscrição estadual</span>
                </label>
                <div class="form-field form-field--full">
                    <label for="cli_pj_responsavel">Responsável</label>
                    <input
                        id="cli_pj_responsavel"
                        name="cli_pj_responsavel"
                        type="text"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['pj_responsavel'], ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
            </div>
        </article>

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Contato</p>
                    <h2>Telefones e e-mail</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="cli_telefone">Telefone</label>
                    <input
                        id="cli_telefone"
                        name="cli_telefone"
                        type="text"
                        maxlength="15"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['telefone'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="(00) 0000-0000"
                        data-mask="phone">
                </div>
                <div class="form-field">
                    <label for="cli_celular">Celular</label>
                    <input
                        id="cli_celular"
                        name="cli_celular"
                        type="text"
                        maxlength="15"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['celular'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="(00) 00000-0000"
                        data-mask="phone">
                </div>
                <div class="form-field form-field--full">
                    <label for="cli_email">E-mail *</label>
                    <input
                        id="cli_email"
                        name="cli_email"
                        type="email"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="cliente@exemplo.com">
                </div>
            </div>
        </article>

        <article class="form-card client-form-card">
            <div class="form-card__header">
                <div>
                    <p class="eyebrow">Redes sociais</p>
                    <h2>Perfis do cliente</h2>
                </div>
            </div>
            <div class="sample-form client-form-grid">
                <div class="form-field">
                    <label for="cli_facebook">Facebook</label>
                    <input
                        id="cli_facebook"
                        name="cli_facebook"
                        type="text"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['facebook'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="Link ou nome do perfil">
                </div>
                <div class="form-field">
                    <label for="cli_instagram">Instagram</label>
                    <input
                        id="cli_instagram"
                        name="cli_instagram"
                        type="text"
                        maxlength="255"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente_formulario']->value['instagram'], ENT_QUOTES, 'UTF-8', true);?>
"
                        placeholder="@usuario">
                </div>
            </div>
        </article>

        <div class="client-form-actions">
            <a class="secondary-button button-link" href="clientes.php">Cancelar</a>
            <button class="primary-button" type="submit">
                <?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Salvar alterações<?php } else { ?>Cadastrar cliente<?php }?>
            </button>
        </div>
    </form>

    <footer class="page-footer">
        <span>© <?php echo $_smarty_tpl->tpl_vars['ano_atual']->value;?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_sistema']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
        <span><?php if ($_smarty_tpl->tpl_vars['modo_edicao']->value) {?>Edição<?php } else { ?>Cadastro<?php }?> de cliente</span>
    </footer>
</section>
<?php }
}
