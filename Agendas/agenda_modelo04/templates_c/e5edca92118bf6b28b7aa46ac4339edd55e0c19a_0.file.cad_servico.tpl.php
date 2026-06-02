<?php
/* Smarty version 4.1.0, created on 2026-05-24 09:16:28
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_servico.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a12ec1c39aa45_76037618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5edca92118bf6b28b7aa46ac4339edd55e0c19a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_servico.tpl',
      1 => 1779624949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:abas.tpl' => 1,
  ),
),false)) {
function content_6a12ec1c39aa45_76037618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>Cadastro Serviço</h2>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Valor: <input type="text" name="valor"><br>
    Duração (min): <input type="number" name="duracao"><br>
    Cor: <input type="color" name="cor"><br>
    <button>Salvar</button>
</form><?php }
}
