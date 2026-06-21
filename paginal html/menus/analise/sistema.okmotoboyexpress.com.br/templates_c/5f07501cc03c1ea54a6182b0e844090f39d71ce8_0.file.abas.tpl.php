<?php
/* Smarty version 4.1.0, created on 2023-06-07 00:31:19
  from 'D:\Meus Projetos\Local Web\ProdutoresWeb.com.br\Sistema Petshop\www\template\abas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_647fb3b7724e72_44200605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f07501cc03c1ea54a6182b0e844090f39d71ce8' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\ProdutoresWeb.com.br\\Sistema Petshop\\www\\template\\abas.tpl',
      1 => 1677996877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647fb3b7724e72_44200605 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'listar') {?>active<?php }?>" aria-current="page" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;
echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
/listar">Listar</a>
  </li>
 <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar' || $_smarty_tpl->tpl_vars['pagina']->value->acao == 'listar') {?> 
	  <li class="nav-item">
		<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;
echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
/cadastrar">Cadastrar</a>
	  </li>  
  <?php } elseif ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
	  <li class="nav-item">
		<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;
echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
/alterar">Alterar</a>
	  </li>
  <?php }?>
  
</ul>
<?php }
}
