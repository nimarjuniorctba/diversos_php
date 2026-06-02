<?php
/* Smarty version 4.1.0, created on 2026-05-24 09:16:26
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a12ec1a01b9f0_91885313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19b5411ca1e343cca9991ab00ead43e2b8a1d169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_cliente.tpl',
      1 => 1779624917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:abas.tpl' => 1,
  ),
),false)) {
function content_6a12ec1a01b9f0_91885313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>Cadastro Cliente</h2>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="text" name="email"><br>
    Comentário: <textarea name="comentario"></textarea><br>
    <button>Salvar</button>
</form><?php }
}
