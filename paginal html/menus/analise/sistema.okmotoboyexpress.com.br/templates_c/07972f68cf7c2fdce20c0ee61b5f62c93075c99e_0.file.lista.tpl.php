<?php
/* Smarty version 4.1.0, created on 2023-10-25 10:20:14
  from 'E:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\minhas_compras\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6539160e165504_96282531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07972f68cf7c2fdce20c0ee61b5f62c93075c99e' => 
    array (
      0 => 'E:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\minhas_compras\\lista.tpl',
      1 => 1688800655,
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
function content_6539160e165504_96282531 (Smarty_Internal_Template $_smarty_tpl) {
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
						  <th scope="col">Pedido</th>
						  <th scope="col">Data</th>
						  <th scope="col">Serviço</th>
						  <th scope="col">Valor</th>
						  <th scope="col">Forma Pgto.</th>
						  <th scope="col">Status</th>
						  <th scope="col" colspan="2">Opções</th>
						</tr>
					  </thead>
					  <tbody>
						<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_clientes']->value, 'clientes');
$_smarty_tpl->tpl_vars['clientes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['clientes']->value) {
$_smarty_tpl->tpl_vars['clientes']->do_else = false;
?>						 
								<tr>
								  <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['pedido'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['data'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['servico'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['valor'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['forma_pgto'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['status'];?>
</td>
								  <td>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
minhas-compras/visualizar/<?php echo $_smarty_tpl->tpl_vars['clientes']->value['idurl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lupa.png"></a>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
clientes/alterar/<?php echo $_smarty_tpl->tpl_vars['clientes']->value['idurl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/nota-6.png" title="Aguardando Emissão" style="height: 34px;"></a>
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
