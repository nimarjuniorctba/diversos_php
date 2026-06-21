<?php
/* Smarty version 4.1.0, created on 2023-03-03 03:03:08
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Bitoder\Modelos\Projeto Modelo\template\abas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6401555ccaa329_76365001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ab70aefe01d557206c5fbec87c153f0736e6161' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Bitoder\\Modelos\\Projeto Modelo\\template\\abas.tpl',
      1 => 1677808986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6401555ccaa329_76365001 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'listar') {?>active<?php }?>" aria-current="page" href="clientes.php?id=1">Listar</a>
  </li>
 <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar' || $_smarty_tpl->tpl_vars['pagina']->value->acao == 'listar') {?> 
	  <li class="nav-item">
		<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>active<?php }?>" href="clientes.php?id=2">Cadastrar</a>
	  </li>  
  <?php } elseif ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
	  <li class="nav-item">
		<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>active<?php }?>" href="clientes.php?id=3">Alterar</a>
	  </li>
  <?php }?>
  
</ul>

<?php }
}
