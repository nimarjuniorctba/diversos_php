<?php
/* Smarty version 4.1.0, created on 2026-06-20 01:15:45
  from 'C:\xampp\htdocs\diversos_php\paginal html\menus\template\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a35cda1cd7540_71127328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfac7ded3005a48204cca176109ce5fc04458678' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\paginal html\\menus\\template\\layout.tpl',
      1 => 1781910703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_lateral.tpl' => 1,
    'file:componentes.tpl' => 1,
  ),
),false)) {
function content_6a35cda1cd7540_71127328 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Base de painel administrativo com menu lateral em Smarty">
    <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['titulo_pagina']->value, ENT_QUOTES, 'UTF-8', true);?>
 | <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nome_sistema']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
    <link rel="stylesheet" href="assets/css/app.css">

        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.1.min.js" defer><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="assets/js/common.js" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/core/menu.js" defer><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="assets/js/pages/componentes.js" defer><?php echo '</script'; ?>
>
</head>
<body class="menu-collapsed">
    <div class="app-shell" id="appShell">
                <?php $_smarty_tpl->_subTemplateRender("file:menu_lateral.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <main class="main-content" id="conteudoPrincipal">
            <?php $_smarty_tpl->_subTemplateRender("file:componentes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </main>
    </div>
</body>
</html>
<?php }
}
