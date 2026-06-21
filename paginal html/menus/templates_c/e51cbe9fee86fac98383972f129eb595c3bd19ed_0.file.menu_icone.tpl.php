<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:52:23
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\menu_icone.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a361c877c4db9_10131552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e51cbe9fee86fac98383972f129eb595c3bd19ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\menu_icone.tpl',
      1 => 1781930669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a361c877c4db9_10131552 (Smarty_Internal_Template $_smarty_tpl) {
?><svg viewBox="0 0 24 24" aria-hidden="true">
    <?php if ($_smarty_tpl->tpl_vars['icone']->value === 'home') {?>
        <path d="m3 11 9-8 9 8v9a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/>
    <?php } elseif ($_smarty_tpl->tpl_vars['icone']->value === 'users') {?>
        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
    <?php } elseif ($_smarty_tpl->tpl_vars['icone']->value === 'bag') {?>
        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/>
    <?php } elseif ($_smarty_tpl->tpl_vars['icone']->value === 'wallet') {?>
        <path d="M20 7V5a2 2 0 0 0-2-2H5a3 3 0 0 0 0 6h15v12H5a3 3 0 0 1-3-3V6M16 13h4"/>
    <?php } elseif ($_smarty_tpl->tpl_vars['icone']->value === 'chart') {?>
        <path d="M4 19V9M10 19V5M16 19v-7M22 19V2M2 19h22"/>
    <?php } elseif ($_smarty_tpl->tpl_vars['icone']->value === 'location') {?>
        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0z"/>
        <circle cx="12" cy="10" r="3"/>
    <?php } else { ?>
        <circle cx="12" cy="12" r="3"/>
        <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-2.83 2.83-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.56V21h-4v-.09A1.7 1.7 0 0 0 9 19.37a1.7 1.7 0 0 0-1.88.34l-.06.06-2.83-2.83.06-.06A1.7 1.7 0 0 0 4.63 15a1.7 1.7 0 0 0-1.56-1.03H3v-4h.09A1.7 1.7 0 0 0 4.63 9a1.7 1.7 0 0 0-.34-1.88l-.06-.06 2.83-2.83.06.06A1.7 1.7 0 0 0 9 4.63h.01A1.7 1.7 0 0 0 10.04 3H10V3h4v.09A1.7 1.7 0 0 0 15 4.63a1.7 1.7 0 0 0 1.88-.34l.06-.06 2.83 2.83-.06.06A1.7 1.7 0 0 0 19.37 9v.01A1.7 1.7 0 0 0 21 10.04V10h.01v4h-.09A1.7 1.7 0 0 0 19.4 15z"/>
    <?php }?>
</svg>
<?php }
}
