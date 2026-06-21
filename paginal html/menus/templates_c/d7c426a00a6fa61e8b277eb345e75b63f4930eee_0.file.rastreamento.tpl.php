<?php
/* Smarty version 4.1.0, created on 2026-06-20 07:49:16
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\rastreamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3629dc6811d2_83423808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7c426a00a6fa61e8b277eb345e75b63f4930eee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\rastreamento.tpl',
      1 => 1781934214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a3629dc6811d2_83423808 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="topbar">
    <button class="icon-button mobile-menu-button" id="mobileMenuButton" type="button" aria-label="Abrir menu" aria-controls="sidebar">
        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div><p class="eyebrow">Monitoramento</p><h1>Rastreamento</h1></div>
    <div class="topbar__actions">
        <a class="secondary-button button-link" target="_blank" href="http://localhost/okmotoboyexpress/sistema.okmotoboyexpress.com.br/mapa/">Abrir em nova janela</a>
    </div>
</header>
<section class="embedded-map-page">
    <iframe
        class="embedded-map-frame"
        src="http://localhost/okmotoboyexpress/sistema.okmotoboyexpress.com.br/mapa/"
        title="Mapa de rastreamento"
        loading="eager">
    </iframe>
</section>
<?php }
}
