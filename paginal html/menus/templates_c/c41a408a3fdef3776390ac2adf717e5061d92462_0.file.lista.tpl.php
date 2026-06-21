<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:20:06
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\empresas\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3614f679cd84_01671842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c41a408a3fdef3776390ac2adf717e5061d92462' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\empresas\\lista.tpl',
      1 => 1781929140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_icone.tpl' => 1,
  ),
),false)) {
function content_6a3614f679cd84_01671842 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\diversos_php\\paginalhtml\\menus\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button>
    <div><p class="eyebrow">Cadastros</p><h1>Empresas</h1></div>
    <div class="topbar__actions"><a class="primary-button button-link" href="empresas.php?acao=cadastrar">＋ Cadastrar empresa</a></div>
</header>
<section class="page-body clients-page">
    <?php if (!empty($_smarty_tpl->tpl_vars['mensagem']->value)) {?><div class="alert alert--<?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>success<?php } else { ?>danger<?php }?> clients-message">
        <span class="alert__icon"><?php if ($_smarty_tpl->tpl_vars['mensagem']->value['tipo'] === 'sucesso') {?>✓<?php } else { ?>×<?php }?></span><div><strong>Empresas</strong><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mensagem']->value['texto'], ENT_QUOTES, 'UTF-8', true);?>
</p></div></div><?php }?>
    <div class="clients-summary"><div><p class="eyebrow">Empresas do sistema</p><h2><?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 empresa<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value != 1) {?>s<?php }?></h2>
        <p>Cadastros, validade da licença e situação de acesso.</p></div>
        <div class="clients-summary__icon"><?php $_smarty_tpl->_subTemplateRender("file:menu_icone.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icone'=>"bag"), 0, false);
?></div></div>
    <div class="table-card clients-table-card">
        <div class="table-toolbar"><div class="search-field"><span>⌕</span><input id="buscarEmpresa" type="search" placeholder="Buscar empresa"></div>
            <span class="table-result-count" id="quantidadeEmpresas"><?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 registros</span></div>
        <div class="table-scroll"><table class="data-table clients-table companies-table" id="tabelaEmpresas">
            <thead><tr><th>ID</th><th>Tipo</th><th>Nome</th><th>CPF/CNPJ</th><th>E-mail</th><th>Cidade/UF</th><th>Validade</th><th>Status</th><th>Ações</th></tr></thead>
            <tbody><?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['registros']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?><tr class="company-row">
                <td data-label="ID"><strong class="client-id">#<?php echo $_smarty_tpl->tpl_vars['r']->value['id_formatado'];?>
</strong></td><td data-label="Tipo"><span class="client-type"><?php echo $_smarty_tpl->tpl_vars['r']->value['tipo'];?>
</span></td>
                <td data-label="Nome"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
</strong></td><td data-label="Documento"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['documento'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td data-label="E-mail"><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['r']->value['email'] ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td><td data-label="Cidade/UF"><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['r']->value['cidade'] ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);
if ($_smarty_tpl->tpl_vars['r']->value['estado']) {?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['estado'], ENT_QUOTES, 'UTF-8', true);
}?></td>
                <td data-label="Validade"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['validade'],"%d/%m/%Y");?>
</td>
                <td data-label="Status"><span class="badge badge--<?php if ($_smarty_tpl->tpl_vars['r']->value['status'] === 'a') {?>success<?php } else { ?>neutral<?php }?>"><i></i><?php echo $_smarty_tpl->tpl_vars['r']->value['status_texto'];?>
</span></td>
                <td data-label="Ações"><div class="client-actions">
                    <a class="action-button action-button--edit" href="empresas.php?acao=editar&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/></svg></a>
                    <form method="post" class="inline-form"><input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"><input type="hidden" name="operacao" value="status"><input type="hidden" name="emp_id" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">
                        <input type="hidden" name="novo_status" value="<?php if ($_smarty_tpl->tpl_vars['r']->value['status'] === 'a') {?>i<?php } else { ?>a<?php }?>"><button class="action-button action-button--status" type="submit"><svg viewBox="0 0 24 24"><path d="<?php if ($_smarty_tpl->tpl_vars['r']->value['status'] === 'a') {?>M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10<?php } else { ?>m5 12 4 4L19 6<?php }?>"/></svg></button></form>
                    <button class="action-button action-button--delete delete-company" data-id="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
" type="button"><svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/></svg></button>
                </div></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><tr><td colspan="9"><div class="table-empty-state"><span>□</span><strong>Nenhuma empresa cadastrada</strong></div></td></tr><?php }?></tbody>
        </table></div><div class="table-empty-search" id="nenhumaEmpresa" hidden>Nenhuma empresa encontrada.</div>
    </div>
</section>
<div class="popup" id="popupExcluirEmpresa" aria-hidden="true"><div class="popup__dialog" role="dialog" aria-modal="true">
    <button class="popup__close close-company-popup" type="button">×</button><span class="popup__icon popup__icon--danger">!</span>
    <h3>Excluir empresa?</h3><p>A empresa <strong id="nomeEmpresaExcluir"></strong> será removida da listagem.</p>
    <form method="post" class="popup__actions"><input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"><input type="hidden" name="operacao" value="excluir">
        <input type="hidden" name="emp_id" id="idEmpresaExcluir"><button class="secondary-button close-company-popup" type="button">Cancelar</button><button class="danger-button">Excluir</button></form>
</div></div>

<?php }
}
