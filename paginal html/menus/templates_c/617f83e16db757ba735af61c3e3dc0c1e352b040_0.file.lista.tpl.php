<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:19:57
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\usuarios_sistema\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3614ede7cef1_07038817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '617f83e16db757ba735af61c3e3dc0c1e352b040' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\usuarios_sistema\\lista.tpl',
      1 => 1781928854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_icone.tpl' => 1,
  ),
),false)) {
function content_6a3614ede7cef1_07038817 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div><p class="eyebrow">Cadastros</p><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_titulo']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
    <div class="topbar__actions">
        <a class="primary-button button-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
?acao=cadastrar">＋ Cadastrar</a>
    </div>
</header>

<section class="page-body clients-page">
    <?php if (!empty($_smarty_tpl->tpl_vars['mensagem']->value)) {?>
        <div class="alert alert--<?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>success<?php } else { ?>danger<?php }?> clients-message">
            <span class="alert__icon"><?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>✓<?php } else { ?>×<?php }?></span>
            <div><strong><?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>Tudo certo!<?php } else { ?>Não foi possível concluir<?php }?></strong>
                <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mensagem']->value['texto'], ENT_QUOTES, 'UTF-8', true);?>
</p></div>
        </div>
    <?php }?>

    <div class="clients-summary">
        <div><p class="eyebrow">Controle de acesso</p>
            <h2><?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 registro<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value != 1) {?>s<?php }?></h2>
            <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_descricao']->value, ENT_QUOTES, 'UTF-8', true);?>
</p></div>
        <div class="clients-summary__icon" aria-hidden="true"><?php $_smarty_tpl->_subTemplateRender("file:menu_icone.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icone'=>"users"), 0, false);
?></div>
    </div>

    <div class="table-card clients-table-card">
        <div class="table-toolbar">
            <div class="search-field"><span>⌕</span>
                <input id="buscarRegistroSistema" type="search" placeholder="Buscar por ID, nome ou e-mail">
            </div>
            <span class="table-result-count" id="quantidadeRegistrosSistema"><?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 registros</span>
        </div>
        <div class="table-scroll">
            <table class="data-table clients-table system-users-table" id="tabelaRegistrosSistema">
                <thead><tr><th>ID</th><th>Nome</th><th>E-mail</th>
                    <?php if ($_smarty_tpl->tpl_vars['mostrar_empresa']->value) {?><th>Empresa</th><?php }?>
                    <th>Data de criação</th><th>Status</th><th>Ações</th></tr></thead>
                <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['registros']->value, 'registro');
$_smarty_tpl->tpl_vars['registro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['registro']->value) {
$_smarty_tpl->tpl_vars['registro']->do_else = false;
?>
                            <tr class="system-user-row">
                                <td data-label="ID"><strong class="client-id">#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['id_formatado'], ENT_QUOTES, 'UTF-8', true);?>
</strong></td>
                                <td data-label="Nome"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
</strong></td>
                                <td data-label="E-mail"><a class="client-email" href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</a></td>
                                <?php if ($_smarty_tpl->tpl_vars['mostrar_empresa']->value) {?><td data-label="Empresa"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['empresa_nome'], ENT_QUOTES, 'UTF-8', true);?>
</td><?php }?>
                                <td data-label="Data de criação"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['dt_cadastro'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td data-label="Status"><span class="badge badge--<?php if ($_smarty_tpl->tpl_vars['registro']->value['status'] === 'a') {?>success<?php } else { ?>neutral<?php }?>"><i></i><?php echo $_smarty_tpl->tpl_vars['registro']->value['status_texto'];?>
</span></td>
                                <td data-label="Ações"><div class="client-actions">
                                    <a class="action-button action-button--edit" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
?acao=editar&id=<?php echo $_smarty_tpl->tpl_vars['registro']->value['id'];?>
">
                                        <svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/></svg>
                                    </a>
                                    <form method="post" class="inline-form">
                                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                                        <input type="hidden" name="operacao" value="status">
                                        <input type="hidden" name="registro_id" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['id'];?>
">
                                        <input type="hidden" name="novo_status" value="<?php if ($_smarty_tpl->tpl_vars['registro']->value['status'] === 'a') {?>i<?php } else { ?>a<?php }?>">
                                        <button class="action-button action-button--status" type="submit">
                                            <svg viewBox="0 0 24 24"><path d="<?php if ($_smarty_tpl->tpl_vars['registro']->value['status'] === 'a') {?>M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10<?php } else { ?>m5 12 4 4L19 6<?php }?>"/></svg>
                                        </button>
                                    </form>
                                    <button class="action-button action-button--delete delete-system-user" type="button"
                                        data-id="<?php echo $_smarty_tpl->tpl_vars['registro']->value['id'];?>
" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['registro']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/></svg>
                                    </button>
                                </div></td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr><td colspan="<?php if ($_smarty_tpl->tpl_vars['mostrar_empresa']->value) {?>7<?php } else { ?>6<?php }?>"><div class="table-empty-state">
                            <span>□</span><strong>Nenhum registro cadastrado</strong>
                            <p>Use o botão cadastrar para adicionar o primeiro registro.</p>
                        </div></td></tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="table-empty-search" id="nenhumRegistroSistema" hidden>Nenhum registro corresponde à busca.</div>
    </div>
</section>

<div class="popup" id="popupExcluirUsuarioSistema" aria-hidden="true">
    <div class="popup__dialog" role="dialog" aria-modal="true">
        <button class="popup__close close-system-user-popup" type="button">×</button>
        <span class="popup__icon popup__icon--danger">!</span>
        <h3>Excluir registro?</h3><p>O cadastro de <strong id="nomeUsuarioSistemaExcluir"></strong> será removido.</p>
        <form method="post" class="popup__actions">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="operacao" value="excluir">
            <input type="hidden" name="registro_id" id="idUsuarioSistemaExcluir">
            <button class="secondary-button close-system-user-popup" type="button">Cancelar</button>
            <button class="danger-button" type="submit">Sim, excluir</button>
        </form>
    </div>
</div>

<?php }
}
