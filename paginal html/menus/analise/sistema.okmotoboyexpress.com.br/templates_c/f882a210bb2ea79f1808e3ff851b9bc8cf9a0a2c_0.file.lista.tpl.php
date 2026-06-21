<?php
/* Smarty version 4.1.0, created on 2026-06-18 16:53:22
  from 'C:\xampp\htdocs\okmotoboyexpress\sistema.okmotoboyexpress.com.br\template\usuarios\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a344cb269f165_24538634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f882a210bb2ea79f1808e3ff851b9bc8cf9a0a2c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\okmotoboyexpress\\sistema.okmotoboyexpress.com.br\\template\\usuarios\\lista.tpl',
      1 => 1781365210,
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
function content_6a344cb269f165_24538634 (Smarty_Internal_Template $_smarty_tpl) {
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
		<div class="table-responsive-sm">
		<table class="table table-bordered table-striped table-hover " style="width: 98%;margin-left:1%;cursor: pointer;">
		  <thead>
			<tr class="table-active ">
			  <th scope="col">Nome</th>
			  <th scope="col">Login</th>
			  <th scope="col">Status</th>
			  <th scope="col">Data cadastro</th>
			  <th scope="col" colspan="2">Opções</th>
			</tr>
		  </thead>
		  <tbody>
			<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_usuarios']->value, 'usuarios');
$_smarty_tpl->tpl_vars['usuarios']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['usuarios']->value) {
$_smarty_tpl->tpl_vars['usuarios']->do_else = false;
?>						
					<tr>
					  <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value['nome'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value['email'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value['status'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value['dt_cadastro'];?>
</td>
					  <td>
						  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
usuarios/alterar/<?php echo $_smarty_tpl->tpl_vars['usuarios']->value['idurl'];?>
"><button  class="btn btn-info btn-editar" style="margin-right: 4px;"><i class="medium material-icons" style="font-size: 16px;">create</i></button></a>
						  <button  class="btn btn-danger btn-excluir" data-id="<?php echo $_smarty_tpl->tpl_vars['usuarios']->value['idurl'];?>
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



<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/usuarios.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
