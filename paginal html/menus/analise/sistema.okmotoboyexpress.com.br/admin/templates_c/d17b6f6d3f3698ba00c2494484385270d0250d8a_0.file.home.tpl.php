<?php
/* Smarty version 4.1.0, created on 2025-11-27 18:28:39
  from 'C:\xampp\htdocs\PetVidaFacil\sistema.petvidafacil.com.br\admin\template\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6928c2876569c3_70235560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd17b6f6d3f3698ba00c2494484385270d0250d8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PetVidaFacil\\sistema.petvidafacil.com.br\\admin\\template\\home.tpl',
      1 => 1764278910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_6928c2876569c3_70235560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:topo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>
<br>
<br>

<div class="clear-both"></div>
<div class="centralizar">
    <div class="corpo">
        <div class="conteudo">
			<table class="table table-bordered table-striped table-hover " style="width: 98%;margin-left:1%;cursor: pointer;">
				<tr>
					<td>
						<h2><span>:: SEJA BEM VINDO A &Aacute;REA ADMINISTRATIVA</span></h2>
						<br>						
						<ul class="chamadas-home" style="list-style-type: none;display: flex;flex-wrap: wrap;">
					   
							<li style="margin-right: 20px;">
								<p style="font-weight: bold;font-size: 20px;" ><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/user_admins.png"  style="width:50px;height:50px;margin-right: 10px;" />Usu&aacute;rios</p>
								<div class="texto-chamada">Acesso r&aacute;pido para cadastro de usu&aacute;rios administrativos no sistema.</div>
								<span><a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
administradores/cadastrar/" style="margin-right: 18px;">&#8227; Cadastrar</a>  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
administradores/">&#8227; Listar</a></span>
							</li>
							<li style="margin-right: 10px;">
								<p style="font-weight: bold;font-size: 20px;width:316px;" ><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/empresa.png"  style="width:50px;height:50px;margin-right: 10px;" />Empresa</p>
								<div class="texto-chamada">Acesso r&aacute;pido para cadastro de empresas no sistema.</div>
								<span><a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
empresas/cadastrar/" style="margin-right: 18px;">&#8227; Cadastrar</a>  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
empresas/">&#8227; Listar</a></span>
							</li>
							<li style="margin-right: 10px;">
								<p style="font-weight: bold;font-size: 20px;" ><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/user_empresas.png"  style="width:50px;;height:50px;margin-right: 10px;" />Usu&aacute;rios de empresas</p>
								<div class="texto-chamada">Acesso r&aacute;pido para cadastro dos usu&aacute;rios de empresas no sistema.</div>
								<span><a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
usuarios-empresas/cadastrar/" style="margin-right: 18px;">&#8227; Cadastrar</a><a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
usuarios-empresas/">&#8227; Listar</a></span>
							</li>
							<li style="display:none;">
								<p style="font-weight: bold;font-size: 20px;" ><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/docs.png"  style="width:50px;;height:50px;margin-right: 10px;" />Contas Banc&aacute;rias</p>
								<div class="texto-chamada">Acesso r&aacute;pido para listagem das contas banc&aacute;rias.</div>
								<span><a href="contas-bancarias/listar/">&#8227; Listar</a></span>
							</li>				
						</ul>
					</td>				
				</tr>
			</table>			
        </div>
    </div>
</div>
<div class="clear-both"></div>
<?php $_smarty_tpl->_subTemplateRender('file:rodape.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
