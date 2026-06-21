<?php
/* Smarty version 4.1.0, created on 2023-03-12 03:19:53
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\portaldenoticias\template\abas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640d36c9c1ede4_54957882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c62d9df3d1a532308c6e192151eabf5b8132b2d' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\portaldenoticias\\template\\abas.tpl',
      1 => 1677996877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640d36c9c1ede4_54957882 (Smarty_Internal_Template $_smarty_tpl) {
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
