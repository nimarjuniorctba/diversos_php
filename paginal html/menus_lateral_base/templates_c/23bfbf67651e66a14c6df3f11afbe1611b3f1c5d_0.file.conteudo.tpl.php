<?php
/* Smarty version 4.1.0, created on 2026-06-20 00:16:39
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\conteudo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a35bfc708a1b0_65865687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23bfbf67651e66a14c6df3f11afbe1611b3f1c5d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\conteudo.tpl',
      1 => 1781907297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a35bfc708a1b0_65865687 (Smarty_Internal_Template $_smarty_tpl) {
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
        <p class="eyebrow">Área administrativa</p>
        <h1>Visão geral</h1>
    </div>

    <div class="topbar__actions">
        <button class="icon-button notification-button" type="button" aria-label="Notificações">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/>
            </svg>
            <span aria-hidden="true"></span>
        </button>
        <button class="primary-button" type="button">
            <span aria-hidden="true">＋</span>
            Novo registro
        </button>
    </div>
</header>

<section class="page-body" id="visao-geral">
    <div class="welcome-card">
        <div>
            <span class="status-pill">Base pronta</span>
            <h2>Seu novo projeto começa aqui.</h2>
            <p>
                Esta é uma página de demonstração. O menu lateral é o componente
                principal: ele funciona em computadores, tablets e celulares.
            </p>
        </div>
        <div class="welcome-card__art" aria-hidden="true">
            <span></span><span></span><span></span>
        </div>
    </div>

    <div class="stats-grid">
        <article class="stat-card">
            <p>Clientes ativos</p>
            <strong>1.284</strong>
            <small class="positive">↑ 8,4% este mês</small>
        </article>
        <article class="stat-card">
            <p>Pedidos abertos</p>
            <strong>86</strong>
            <small>Atualizado agora</small>
        </article>
        <article class="stat-card">
            <p>Faturamento</p>
            <strong>R$ 48,2 mil</strong>
            <small class="positive">↑ 12,1% este mês</small>
        </article>
    </div>

    <article class="sample-panel">
        <div class="sample-panel__header">
            <div>
                <p class="eyebrow">Conteúdo de exemplo</p>
                <h2>Como usar esta base</h2>
            </div>
            <span>Smarty + PHP</span>
        </div>
        <p>
            Edite o array <code>$menu_itens</code> no arquivo <code>index.php</code>
            para adicionar, remover ou reorganizar opções. O template monta os
            links e submenus automaticamente.
        </p>
    </article>

    <footer class="page-footer">
        <span>© <?php echo $_smarty_tpl->tpl_vars['ano_atual']->value;?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_sistema']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
        <span>Base de interface reutilizável</span>
    </footer>
</section>

<?php }
}
