<?php
/* Smarty version 4.1.0, created on 2026-04-08 09:53:53
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_pista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d64fe1d79d65_92803170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17a007eb07b125d7e1d4bcb0b98fafd00688772b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_pista.tpl',
      1 => 1775652226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d64fe1d79d65_92803170 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Cadastro Pista</h2>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Comentário: <textarea name="comentario"></textarea><br>
    <button>Salvar</button>
</form><?php }
}
