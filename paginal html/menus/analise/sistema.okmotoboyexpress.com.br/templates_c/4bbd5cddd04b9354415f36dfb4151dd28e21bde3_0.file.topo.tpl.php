<?php
/* Smarty version 4.1.0, created on 2026-03-23 08:35:59
  from 'C:\xampp\htdocs\boxLav\sistema.boxlav.com.br\template\topo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69c1259f298e48_67315337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bbd5cddd04b9354415f36dfb4151dd28e21bde3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\boxLav\\sistema.boxlav.com.br\\template\\topo.tpl',
      1 => 1765395938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c1259f298e48_67315337 (Smarty_Internal_Template $_smarty_tpl) {
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">	

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

	<div class="topo" style="display:inline-block;width:100%;height: 120px;">
			<div style="float:left;display:none;">            
			</div>	
			<div style="text-align: center;margin-top: 6px;">
				<div class="containerClock">
					<div class="clock"></div>
				</div>
			</div>	
			<div style="float: right;margin-right:30px;display:flex;cursor:pointer;">            
				<div style="background:#2d4a69;color:white;width:auto;padding: 8px;border-radius: 5px 0px 0px 5px;margin-right:0px;"><?php echo $_smarty_tpl->tpl_vars['pagina']->value->mensagem_identificacao;?>
</div>
				<div style="background:#2d4a69;color:white;width:auto;padding: 8px;border-radius: 0px 5px 5px 0px;"></div>            
			</div>
			<div style="clear:both;"></div>
			<?php if ($_smarty_tpl->tpl_vars['aviso_validade_sistema']->value == "s") {?>	
				<div style="width:100%;display: flex;justify-content: center;">
					<div style="background-color: #f3bab6;border-radius: 3px;width: 500px;text-align: center;line-height: 33px;color: rgb(177, 34, 27);;border: 1px dashed;"><span style="font-weight: 600;">Sua licença do sistema irá vencer em <?php echo $_smarty_tpl->tpl_vars['dias_faltando_validade_sistema']->value;?>
 dias</span> - <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
/planos">Renovar Agora?</a></label></div>
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['aviso_validade_sistema']->value == "v") {?>	
				<div style="width:100%;display: flex;justify-content: center;">
					<div style="background-color: #f3bab6;border-radius: 3px;width: 500px;text-align: center;line-height: 33px;color: rgb(177, 34, 27);;border: 1px dashed;"><span style="font-weight: 600;">Sua licença do sistema já venceu faz <?php echo $_smarty_tpl->tpl_vars['dias_faltando_validade_sistema']->value;?>
 dias</span> - <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
/planos">Renovar Agora?</a></label></div>
				</div>				
			<?php }?>
			
	</div>
	<div style="clear:both;"></div>


	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 67px;">
		<div style="height:100px;"></div>
		<div style="display:flex;">            
		<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/config/logo.png" class="img-topofix">    
		<div class="menu">        
			<ul style="margin-left: 260px;">
				<li style="display:none;">
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
clientes/"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/computador_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Home</a>
				</li>
				<li style="width:114px;">
					<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/cadastro_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Cadastros
					<ul>
						<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
clientes/"><li>Clientes</li></a>
					</ul>
				</li>
				<li style="">
					<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/config_branco.png" style="width:25px;height: 25px;margin-right: 7px;">
					Vendas            
				 <ul>
					<li>Cadastros
						<ul>
							<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
produtos-animais/" style="display:none;"><li>Animais</li></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
produtos-categorias/"><li>Categorias</li></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
produtos-fornecedores/"><li>Fornecedores</li></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
produtos/"><li>Produtos</li></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
estoque/"><li>Estoque</li></a>   
						</ul>
					</li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
pdv/"><li>PDV</li></a>                            
				 </ul>
				</li>				
				<li style="width:123px;">
					<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/financeiro_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Financeiro
					<ul>
					   <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
minhas-compras/"><li>Minhas compras</li></a>
					   <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
planos/"><li style="color: #fd9a30;font-weight: 600;">Renovar Planos</li></a>   
					</ul>                
				</li>
				<li>
					<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/config_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Opções
					<ul>
					   <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
meus-dados/"><li>Meus Dados</li></a>
					   <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
usuarios/"><li>Usuários</li></a>   
					</ul>                
				</li>
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
sair"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
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
