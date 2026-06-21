<?php
/* Smarty version 4.1.0, created on 2025-11-26 10:16:48
  from 'C:\xampp\htdocs\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\abas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6926fdc03f0537_10508411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef284c922037f9fb4a6a1e49f692a26ea4ab24c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\abas.tpl',
      1 => 1688798910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6926fdc03f0537_10508411 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
<div class="titulo-aba">:: <?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</div>  
	<?php if ($_smarty_tpl->tpl_vars['pagina']->value->opcao != 'meus-dados' && $_smarty_tpl->tpl_vars['pagina']->value->opcao != 'planos' && $_smarty_tpl->tpl_vars['pagina']->value->opcao != 'minhas-compras') {?>
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
