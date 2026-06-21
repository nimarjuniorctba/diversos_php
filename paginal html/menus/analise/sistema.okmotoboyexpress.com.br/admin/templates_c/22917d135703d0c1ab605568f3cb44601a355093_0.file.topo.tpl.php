<?php
/* Smarty version 4.1.0, created on 2026-06-19 01:51:10
  from 'C:\xampp\htdocs\okmotoboyexpress\sistema.okmotoboyexpress.com.br\admin\template\topo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a34cabec911a2_80590555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22917d135703d0c1ab605568f3cb44601a355093' => 
    array (
      0 => 'C:\\xampp\\htdocs\\okmotoboyexpress\\sistema.okmotoboyexpress.com.br\\admin\\template\\topo.tpl',
      1 => 1781844661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a34cabec911a2_80590555 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>

	<title><?php echo $_smarty_tpl->tpl_vars['pagina']->value->empresa_nome;?>
</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.js"   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="   crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
css/style.css">
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/jquery.mask.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/geral.js"><?php echo '</script'; ?>
>

<head>
<body>
	<input type="hidden" id="host" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
">

	<div class="topo" style="display:inline-block;width:100%;height: 50px;">
		<div style="float:left;display:none;">            
		</div>	
		<div style="text-align: center;margin-top: 6px;">

		</div>	
		<div style="float: right;margin-right:30px;display:flex;">            
			<div style="background:#2d4a69;color:white;width:auto;padding: 8px;border-radius: 5px 0px 0px 5px;margin-right:0px;"><?php echo $_smarty_tpl->tpl_vars['pagina']->value->mensagem_identificacao;?>
</div>
			<div style="background:#2d4a69;color:white;width:auto;padding: 8px;border-radius: 0px 5px 5px 0px;"></div>            
		</div>
		<div style="clear:both;"></div>
		<div style="width:100%;display: none;justify-content: center;">
			<div style="background-color: #f3bab6;border-radius: 3px;width: 415px;text-align: center;line-height: 29px;color: #d74f4f;border: 1px dashed;"><a>Sua licença do sistema irá vencer em 10 dias, <a href="">Ver mais...</a></label></div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 67px;">
		<div style="height:100px;"></div>
		<div style="display:flex;">            
		<div class="menu">        
			<ul style="margin-left: 50px;">
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
/home"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/home.png" style="width:25px;height: 25px;margin-right: 7px;">
					Home</a>
				</li>
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base_cliente;?>
/mapa"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/home.png" style="width:25px;height: 25px;margin-right: 7px;">
					Mapa</a>
				</li>				
				<li style="display:none;">
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
clientes/"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/computador_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Home</a>
				</li>
				<li style="width:114px;">
					<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/cadastro_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Modulos
					<ul>
						<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
administradores/"><li>Administradores</li></a>
						<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
condutores/"><li>Condutores</li></a>						
						<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
empresas/"><li>Empresas</li></a>						
						<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
usuarios-empresas/"><li>Usuarios de empresa</li></a>
					</ul>
				</li>
				<li>
					<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/config_branco.png" style="width:25px;height: 25px;margin-right: 7px;">
					Opções
					<ul>
					   <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
meus-dados/"><li>Meus Dados</li></a>
					   <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
administradores/"><li>Administradores</li></a>   
					</ul>                
				</li>
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
/admin/sair"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/sair_branco.png" style="width:25px;height: 25px;margin-right: 7px;">
					Sair</a>
				</li>
			</ul>
		</div>
		</div>
	</nav>

	<input type="hidden" id="pagina_base" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
"> 
	<input type="hidden" id="base_upload" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->upload;?>
"> <?php }
}
