<?php
/* Smarty version 4.1.0, created on 2025-12-05 08:28:44
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\admin\template\admin_empresas\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6932c1ecb24ab3_18140424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7fe93aff73612872e5b47a86ead293747ed4db7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\admin\\template\\admin_empresas\\lista.tpl',
      1 => 1764187891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:abas.tpl' => 1,
    'file:popups/excluir_registro.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_6932c1ecb24ab3_18140424 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>
<br>
<br>

<?php $_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table border principal" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>
<div style="display:none;">
filtros
</div>

				<br>
<br>
<br>				
					<div class="table-responsive-sm">
					<table class="table table-bordered table-striped table-hover " style="width: 98%;margin-left:1%;cursor: pointer;">
					  <thead>
						<tr class="table-active ">
						  <th scope="col">ID</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Login</th>
						  <th scope="col">Nome/Fantasia</th>
						  <th scope="col">Razao</th>
						  <th scope="col">Data Cadastro</th>
						  <th scope="col">Status</th>
						  <th scope="col" colspan="2">Opções</th>
						</tr>
					  </thead>
					  <tbody>
						<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa_admin']->value, 'empresa_admin');
$_smarty_tpl->tpl_vars['empresa_admin']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['empresa_admin']->value) {
$_smarty_tpl->tpl_vars['empresa_admin']->do_else = false;
?>						 
								<tr>
								  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['id'];?>
</th>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['nome'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['login'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['fantasia'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['razao'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['data_cadastro'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['status'];?>
</td>

								  <td>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
usuarios-empresas/alterar/<?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['idurl'];?>
"><button  class="btn btn-info btn-editar" style="margin-right: 4px;"><i class="medium material-icons" style="font-size: 16px;">create</i></button></a>
									  <button  class="btn btn-danger btn-excluir" data-id="<?php echo $_smarty_tpl->tpl_vars['empresa_admin']->value['idurl'];?>
"><i class="medium material-icons" style="font-size: 16px;">close</i></button>
								  </td>
								</tr>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php } else { ?>	
						
								<tr>
								  <td scope="col" colspan="8" style="text-align: center;">Sem registros</td>
								</tr>						
						
						<?php }?>					
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>


<div id="dialog-excluir" title="Confirmar exclusão" style="display: none;">

	<?php $_smarty_tpl->_subTemplateRender("file:popups/excluir_registro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
</div>



<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/empresa_admin.js"> <?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/admin_empresas.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
