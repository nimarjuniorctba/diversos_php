<?php
/* Smarty version 4.1.0, created on 2026-03-07 08:38:05
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\abas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69ac0e1daefa94_37980639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e510a6b68168e73830dd3d4422b62abd7b9a854' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\abas.tpl',
      1 => 1772883483,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69ac0e1daefa94_37980639 (Smarty_Internal_Template $_smarty_tpl) {
?>

<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
<div class="titulo-aba">:: <?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</div>  
	<?php if ($_smarty_tpl->tpl_vars['pagina']->value->opcao != 'meus-dados' && $_smarty_tpl->tpl_vars['pagina']->value->opcao != 'planos' && $_smarty_tpl->tpl_vars['pagina']->value->opcao != 'minhas-compras' && $_smarty_tpl->tpl_vars['pagina']->value->opcao != 'estoque') {?>
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
