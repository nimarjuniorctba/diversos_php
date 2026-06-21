<?php
/* Smarty version 4.1.0, created on 2026-06-20 02:49:20
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\condutores\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3629e0b54663_17382948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '763101399fe6e93ee7843df6e2cb1238b86339fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\condutores\\lista.tpl',
      1 => 1781934421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a3629e0b54663_17382948 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button"
        aria-label="Abrir menu" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div>
        <p class="eyebrow">Cadastros</p>
        <h1>Condutores</h1>
    </div>
    <div class="topbar__actions">
        <a class="primary-button button-link" href="condutores.php?acao=cadastrar">
            <span aria-hidden="true">＋</span>Cadastrar condutor
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

    <div class="clients-summary driver-summary">
        <div>
            <p class="eyebrow">Equipe de entregas</p>
            <h2><?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 condutor<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value != 1) {?>es<?php }?></h2>
            <p>Gerencie os acessos, veículos e situação dos condutores.</p>
        </div>
        <div class="clients-summary__icon driver-summary__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 21v-2a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v2M8 3h8"/>
            </svg>
        </div>
    </div>

    <div class="table-card clients-table-card">
        <div class="table-toolbar">
            <div class="search-field">
                <span aria-hidden="true">⌕</span>
                <input id="buscarCondutor" type="search"
                    placeholder="Buscar por nome, e-mail, telefone, placa ou ID" autocomplete="off">
            </div>
            <span class="table-result-count" id="quantidadeCondutoresVisiveis">
                <?php echo $_smarty_tpl->tpl_vars['qte_registros']->value;?>
 registro<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value != 1) {?>s<?php }?>
            </span>
        </div>

        <div class="table-scroll">
            <table class="data-table clients-table drivers-table" id="tabelaCondutores">
                <thead>
                    <tr>
                        <th>ID</th><th>Nome</th><th>Telefone</th><th>E-mail</th>
                        <th>Placa</th><th>Cadastro</th><th>Aplicativo</th>
                        <th>Data de criação</th><th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_condutores']->value, 'condutor');
$_smarty_tpl->tpl_vars['condutor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['condutor']->value) {
$_smarty_tpl->tpl_vars['condutor']->do_else = false;
?>
                            <tr class="driver-row">
                                <td data-label="ID"><strong class="client-id">#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['id_formatado'], ENT_QUOTES, 'UTF-8', true);?>
</strong></td>
                                <td data-label="Nome"><strong><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['condutor']->value['nome'] ?? null)===null||$tmp==='' ? 'Não informado' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</strong></td>
                                <td data-label="Telefone"><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['condutor']->value['telefone_formatado'] ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td data-label="E-mail"><a class="client-email" href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</a></td>
                                <td data-label="Placa"><span class="vehicle-plate"><?php echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['condutor']->value['placa'] ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                                <td data-label="Cadastro">
                                    <span class="badge badge--<?php if ($_smarty_tpl->tpl_vars['condutor']->value['status'] === 'a') {?>success<?php } else { ?>neutral<?php }?>">
                                        <i></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['status_texto'], ENT_QUOTES, 'UTF-8', true);?>

                                    </span>
                                </td>
                                <td data-label="Aplicativo">
                                    <span class="badge badge--<?php if ($_smarty_tpl->tpl_vars['condutor']->value['app_status'] === 'a') {?>info<?php } else { ?>neutral<?php }?>">
                                        <i></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['app_status_texto'], ENT_QUOTES, 'UTF-8', true);?>

                                    </span>
                                </td>
                                <td data-label="Data de criação"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['dt_cadastro'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td data-label="Ações">
                                    <div class="client-actions">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['condutor']->value['whatsapp'])) {?>
                                            <a class="action-button action-button--whatsapp"
                                                href="https://wa.me/55<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['whatsapp'], ENT_QUOTES, 'UTF-8', true);?>
"
                                                target="_blank"
                                                rel="noopener"
                                                title="Enviar mensagem pelo WhatsApp">
                                                <svg viewBox="0 0 24 24"><path d="M20.5 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20l1.2-4.7a8.5 8.5 0 1 1 16.3-3.8zM8.5 7.5c.4 3 2.3 5 5.5 6l1.2-1.2c.2-.2.5-.2.7-.1l2 .9"/></svg>
                                            </a>
                                        <?php }?>
                                        <a class="action-button action-button--edit"
                                            href="condutores.php?acao=editar&id=<?php echo $_smarty_tpl->tpl_vars['condutor']->value['id'];?>
"
                                            title="Editar condutor" aria-label="Editar condutor <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4z"/></svg>
                                        </a>
                                        <form method="post" class="inline-form">
                                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                                            <input type="hidden" name="operacao" value="status">
                                            <input type="hidden" name="con_id" value="<?php echo $_smarty_tpl->tpl_vars['condutor']->value['id'];?>
">
                                            <input type="hidden" name="novo_status" value="<?php if ($_smarty_tpl->tpl_vars['condutor']->value['status'] === 'a') {?>i<?php } else { ?>a<?php }?>">
                                            <button class="action-button action-button--status" type="submit"
                                                title="<?php if ($_smarty_tpl->tpl_vars['condutor']->value['status'] === 'a') {?>Desativar<?php } else { ?>Ativar<?php }?> condutor">
                                                <?php if ($_smarty_tpl->tpl_vars['condutor']->value['status'] === 'a') {?>
                                                    <svg viewBox="0 0 24 24"><path d="M18.4 5.6a9 9 0 1 1-12.8 0M12 2v10"/></svg>
                                                <?php } else { ?>
                                                    <svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg>
                                                <?php }?>
                                            </button>
                                        </form>
                                        <button class="action-button action-button--delete delete-driver-button"
                                            type="button" data-driver-id="<?php echo $_smarty_tpl->tpl_vars['condutor']->value['id'];?>
"
                                            data-driver-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condutor']->value['nome'], ENT_QUOTES, 'UTF-8', true);?>
" title="Excluir condutor">
                                            <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v6M14 11v6"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr class="empty-table-row"><td colspan="9">
                            <div class="table-empty-state">
                                <span aria-hidden="true">□</span>
                                <strong>Nenhum condutor cadastrado</strong>
                                <p>Comece adicionando o primeiro condutor.</p>
                                <a class="primary-button button-link" href="condutores.php?acao=cadastrar">Cadastrar condutor</a>
                            </div>
                        </td></tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="table-empty-search" id="nenhumCondutorEncontrado" hidden>
            Nenhum condutor corresponde à sua busca.
        </div>
    </div>
</section>

<div class="popup" id="popupExcluirCondutor" aria-hidden="true">
    <div class="popup__dialog" role="dialog" aria-modal="true" aria-labelledby="tituloExcluirCondutor">
        <button class="popup__close close-driver-popup" type="button" aria-label="Fechar">×</button>
        <span class="popup__icon popup__icon--danger" aria-hidden="true">!</span>
        <h3 id="tituloExcluirCondutor">Excluir condutor?</h3>
        <p>O cadastro de <strong id="nomeCondutorExcluir"></strong> será removido e o acesso ao aplicativo ficará offline.</p>
        <form method="post" class="popup__actions">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="operacao" value="excluir">
            <input type="hidden" name="con_id" id="idCondutorExcluir" value="">
            <button class="secondary-button close-driver-popup" type="button">Cancelar</button>
            <button class="danger-button" type="submit">Sim, excluir</button>
        </form>
    </div>
</div>
<?php }
}
