<?php
/* Smarty version 4.1.0, created on 2026-06-20 00:38:28
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\clientes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a360b344398e8_81521229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ae087c52bc760c481c3405e2a2aad19132d0c15' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\clientes\\lista.tpl',
      1 => 1781926550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_icone.tpl' => 1,
  ),
),false)) {
function content_6a360b344398e8_81521229 (Smarty_Internal_Template $_smarty_tpl) {
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
        <p class="eyebrow">Cadastros</p>
        <h1>Clientes</h1>
    </div>

    <div class="topbar__actions">
        <a class="primary-button button-link" href="clientes.php?acao=cadastrar">
            <span aria-hidden="true">＋</span>
            Cadastrar cliente
        </a>
    </div>
</header>

<section class="page-body clients-page">
    <?php if (!empty($_smarty_tpl->tpl_vars['mensagem']->value)) {?>
        <div class="alert alert--<?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>success<?php } else { ?>danger<?php }?> clients-message">
            <span class="alert__icon"><?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>✓<?php } else { ?>×<?php }?></span>
            <div>
                <strong><?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>Tudo certo!<?php } else { ?>Não foi possível concluir<?php }?></strong>
                <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mensagem']->value['texto'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
        </div>
    <?php }?>

    <div class="clients-summary">
        <div>
            <p class="eyebrow">Base de clientes</p>
            <h2><?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 cliente<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value != 1) {?>s<?php }?></h2>
            <p>Gerencie os dados, o status e os cadastros da empresa.</p>
        </div>
        <div class="clients-summary__icon" aria-hidden="true">
            <?php $_smarty_tpl->_subTemplateRender("file:menu_icone.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icone'=>"users"), 0, false);
?>
        </div>
    </div>

    <div class="table-card clients-table-card">
        <div class="table-toolbar">
            <div class="search-field">
                <span aria-hidden="true">⌕</span>
                <input
                    id="buscarCliente"
                    type="search"
                    placeholder="Buscar por nome, e-mail, celular ou ID"
                    autocomplete="off">
            </div>
            <span class="table-result-count" id="quantidadeVisivel">
                <?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 registro<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value != 1) {?>s<?php }?>
            </span>
        </div>

        <div class="table-scroll">
            <table class="data-table clients-table" id="tabelaClientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome / Razão social</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Data de criação</th>
                        <th>Status</th>
                        <th class="clients-actions-column">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_clientes']->value, 'cliente');
$_smarty_tpl->tpl_vars['cliente']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
$_smarty_tpl->tpl_vars['cliente']->do_else = false;
?>
                            <tr class="client-row">
                                <td data-label="ID">
                                    <strong class="client-id">#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['id_formatado'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
                                </td>
                                <td data-label="Tipo">
                                    <span class="client-type"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['tipo_sigla'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                    <small class="client-type-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['tipo'], ENT_QUOTES, 'UTF-8', true);?>
</small>
                                </td>
                                <td data-label="Nome / Razão social">
                                    <strong><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['cliente']->value['nome'] ?? null)===null||$tmp==='' ? 'Não informado' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</strong>
                                </td>
                                <td data-label="Celular"><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['cliente']->value['celular'] ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td data-label="E-mail">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value['email'])) {?>
                                        <a class="client-email" href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                    <?php } else { ?>
                                        —
                                    <?php }?>
                                </td>
                                <td data-label="Data de criação"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['dt_cadastro'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td data-label="Status">
                                    <span class="badge badge--<?php if ($_smarty_tpl->tpl_vars['cliente']->value['status'] === 'a') {?>success<?php } else { ?>neutral<?php }?>">
                                        <i></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['status_texto'], ENT_QUOTES, 'UTF-8', true);?>

                                    </span>
                                </td>
                                <td data-label="Ações">
                                    <div class="client-actions">
                                        <a
                                            class="action-button action-button--edit"
                                            href="clientes.php?acao=editar&id=<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
"
                                            title="Editar cliente"
                                            aria-label="Editar cliente <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/>
                                            </svg>
                                        </a>

                                        <form method="post" class="inline-form">
                                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                                            <input type="hidden" name="operacao" value="status">
                                            <input type="hidden" name="cli_id" value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
">
                                            <input
                                                type="hidden"
                                                name="novo_status"
                                                value="<?php if ($_smarty_tpl->tpl_vars['cliente']->value['status'] === 'a') {?>i<?php } else { ?>a<?php }?>">
                                            <button
                                                class="action-button action-button--status"
                                                type="submit"
                                                title="<?php if ($_smarty_tpl->tpl_vars['cliente']->value['status'] === 'a') {?>Desativar<?php } else { ?>Ativar<?php }?> cliente"
                                                aria-label="<?php if ($_smarty_tpl->tpl_vars['cliente']->value['status'] === 'a') {?>Desativar<?php } else { ?>Ativar<?php }?> cliente <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <?php if ($_smarty_tpl->tpl_vars['cliente']->value['status'] === 'a') {?>
                                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10"/>
                                                    </svg>
                                                <?php } else { ?>
                                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="m5 12 4 4L19 6"/>
                                                    </svg>
                                                <?php }?>
                                            </button>
                                        </form>

                                        <button
                                            class="action-button action-button--delete delete-client-button"
                                            type="button"
                                            data-client-id="<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
"
                                            data-client-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
"
                                            title="Excluir cliente"
                                            aria-label="Excluir cliente <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cliente']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr class="empty-table-row">
                            <td colspan="8">
                                <div class="table-empty-state">
                                    <span aria-hidden="true">□</span>
                                    <strong>Nenhum cliente cadastrado</strong>
                                    <p>Comece adicionando o primeiro cliente da empresa.</p>
                                    <a class="primary-button button-link" href="clientes.php?acao=cadastrar">
                                        Cadastrar cliente
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="table-empty-search" id="nenhumClienteEncontrado" hidden>
            Nenhum cliente corresponde à sua busca.
        </div>
    </div>

    <footer class="page-footer">
        <span>© <?php echo $_smarty_tpl->tpl_vars['ano_atual']->value;?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_sistema']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
        <span>Cadastro de clientes</span>
    </footer>
</section>

<div class="popup" id="popupExcluirCliente" aria-hidden="true">
    <div
        class="popup__dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="tituloExcluirCliente">
        <button class="popup__close close-delete-popup" type="button" aria-label="Fechar">×</button>
        <span class="popup__icon popup__icon--danger" aria-hidden="true">!</span>
        <h3 id="tituloExcluirCliente">Excluir cliente?</h3>
        <p>
            O cadastro de <strong id="nomeClienteExcluir"></strong> será removido
            da listagem. Esta ação usa exclusão lógica.
        </p>
        <form method="post" class="popup__actions">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="operacao" value="excluir">
            <input type="hidden" name="cli_id" id="idClienteExcluir" value="">
            <button class="secondary-button close-delete-popup" type="button">Cancelar</button>
            <button class="danger-button" type="submit">Sim, excluir</button>
        </form>
    </div>
</div>

<?php }
}
