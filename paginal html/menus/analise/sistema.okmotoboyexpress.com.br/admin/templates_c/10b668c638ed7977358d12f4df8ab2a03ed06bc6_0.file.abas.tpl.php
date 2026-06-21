<?php
/* Smarty version 4.1.0, created on 2025-11-27 15:18:33
  from 'C:\xampp\htdocs\sistema.petvidafacil.com.br\localhost\admin\template\abas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_692895f95a2a19_31516128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10b668c638ed7977358d12f4df8ab2a03ed06bc6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sistema.petvidafacil.com.br\\localhost\\admin\\template\\abas.tpl',
      1 => 1764094785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_692895f95a2a19_31516128 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
<div class="titulo-aba">:: <?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</div>  
	<?php if ($_smarty_tpl->tpl_vars['pagina']->value->opcao != 'meus-dados') {?>
		  <li class="nav-item" style="margin-top: 5px;">
			<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'listar') {?>active<?php }?>" aria-current="page" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;
echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
/listar">Listar</a>
		  </li>
		<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar' || $_smarty_tpl->tpl_vars['pagina']->value->acao == 'listar') {?> 
		  <li class="nav-item" style="margin-top: 5px;margin-right: 4px;">
			<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;
echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
/cadastrar">Cadastrar</a>
		  </li>  
		<?php } elseif ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
		  <li class="nav-item" style="margin-top: 5px;margin-right: 4px;">
			<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;
echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
/alterar">Alterar</a>
		  </li>
		<?php }?>
	<?php } else { ?>
	
		  <li class="nav-item" style="margin-top: 5px;margin-right: 4px;visibility:hidden">
			<a class="nav-link" href="">Alterar</a>
		  </li>
	
	
	<?php }?>
</ul>



<!--<input type="hidden" id="pagina_debug" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->opcao;?>
">--><?php }
}
