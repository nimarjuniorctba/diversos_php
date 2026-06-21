<?php
/* Smarty version 4.1.0, created on 2023-06-16 15:27:32
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\cartoes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_648c6344c17552_97059107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dffeb6e7a004e5806cafa6f8aeac04d243236d7' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\cartoes\\lista.tpl',
      1 => 1686922050,
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
function content_648c6344c17552_97059107 (Smarty_Internal_Template $_smarty_tpl) {
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
						  <th scope="col">Número</th>
						  <th scope="col">Validade</th>
						  <th scope="col">Level</th>
						  <th scope="col">Data Colhida</th>
						  <th scope="col">Obs.</th>
						  <th scope="col" colspan="2">Ações</th>
						</tr>
					  </thead>
					  <tbody>
						<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_cartoes']->value, 'cartoes');
$_smarty_tpl->tpl_vars['cartoes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cartoes']->value) {
$_smarty_tpl->tpl_vars['cartoes']->do_else = false;
?>						 
								<tr>
								  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['id'];?>
</th>
								  <td><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['nome'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['numero'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['dt_vencimento'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['level'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['data_colhida'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['cartoes']->value['comentarios'];?>
</td>
								  <td>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
cartoes/alterar/<?php echo $_smarty_tpl->tpl_vars['cartoes']->value['idurl'];?>
"><button  class="btn btn-info btn-editar" style="margin-right: 4px;"><i class="medium material-icons" style="font-size: 16px;">create</i></button></a>
									  <button  class="btn btn-danger btn-excluir" data-id="<?php echo $_smarty_tpl->tpl_vars['cartoes']->value['idurl'];?>
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
js/formulario/cartoes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
