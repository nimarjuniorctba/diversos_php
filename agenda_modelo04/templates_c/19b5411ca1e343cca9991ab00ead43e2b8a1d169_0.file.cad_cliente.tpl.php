<?php
/* Smarty version 4.1.0, created on 2026-04-08 09:46:40
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d64e30652b95_93337205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19b5411ca1e343cca9991ab00ead43e2b8a1d169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_cliente.tpl',
      1 => 1775652101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d64e30652b95_93337205 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Cadastro Cliente</h2>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="text" name="email"><br>
    Comentário: <textarea name="comentario"></textarea><br>
    <button>Salvar</button>
</form><?php }
}
