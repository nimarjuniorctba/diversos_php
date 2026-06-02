<?php
/* Smarty version 4.1.0, created on 2026-05-29 19:32:15
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_pista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a1a13ef3df7c4_87883722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17a007eb07b125d7e1d4bcb0b98fafd00688772b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_pista.tpl',
      1 => 1779624933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:abas.tpl' => 1,
  ),
),false)) {
function content_6a1a13ef3df7c4_87883722 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>Cadastro Pista</h2>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Comentário: <textarea name="comentario"></textarea><br>
    <button>Salvar</button>
</form><?php }
}
