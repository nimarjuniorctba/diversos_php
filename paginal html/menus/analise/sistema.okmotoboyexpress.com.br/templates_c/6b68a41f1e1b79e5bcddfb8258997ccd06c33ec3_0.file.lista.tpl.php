<?php
/* Smarty version 4.1.0, created on 2025-12-06 08:48:59
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\produtos_fornecedores\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6934182bdb26c9_04695639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b68a41f1e1b79e5bcddfb8258997ccd06c33ec3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\produtos_fornecedores\\lista.tpl',
      1 => 1765021730,
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
function content_6934182bdb26c9_04695639 (Smarty_Internal_Template $_smarty_tpl) {
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
					<table class="table table-bordered table-striped table-hover " style="cursor: pointer;">
					  <thead>
						<tr class="table-active ">
						  <th scope="col">Nome</th>
						  <th scope="col">Categoria</th>
						  <th scope="col">Data de cadastro</th>
						  <th scope="col">Status</th>
						  <th scope="col" colspan="2">Opções</th>
						</tr>
					  </thead>
					  <tbody>
						<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_fornecedor']->value, 'fornecedor');
$_smarty_tpl->tpl_vars['fornecedor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fornecedor']->value) {
$_smarty_tpl->tpl_vars['fornecedor']->do_else = false;
?>						 
								<tr>
								  <td><?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['nome'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['categoria'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['dt_cadastro'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['status'];?>
</td>
								  <td>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
produtos-fornecedores/alterar/<?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['idurl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png" style="width:20px;height:20px;margin-right:5px;cursor: pointer;"></a>
									  <img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png" style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="btn-excluir" data-id="<?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['idurl'];?>
">
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
js/formulario/clientes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
