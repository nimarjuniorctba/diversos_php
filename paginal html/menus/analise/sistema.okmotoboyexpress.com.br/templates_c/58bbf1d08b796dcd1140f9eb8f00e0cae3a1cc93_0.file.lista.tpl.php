<?php
/* Smarty version 4.1.0, created on 2023-04-24 03:16:51
  from 'D:\Meus Projetos\Local Web\Alfa\portaldenoticias\template\empresas\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6445d8835ed0c2_95018835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58bbf1d08b796dcd1140f9eb8f00e0cae3a1cc93' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Alfa\\portaldenoticias\\template\\empresas\\lista.tpl',
      1 => 1682299009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:abas.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_6445d8835ed0c2_95018835 (Smarty_Internal_Template $_smarty_tpl) {
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
				<br>
				<br>
				<div style="margin-left:32px;"><h6><?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</h6></div>
				<br>				
					<div class="table-responsive-sm">
					<table class="table table-bordered" style="width: 75%;margin-left:5%">
					  <thead>
						<tr class="table-active">
						  <th scope="col">Código</th>
						  <th scope="col">CNPJ</th>
						  <th scope="col">Razao Social</th>
						  <th scope="col">Fantasia</th>
						  <th scope="col">Data abertura</th>
						  <th scope="col">Comentarios</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
						<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
					
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa']->value, 'empresa');
$_smarty_tpl->tpl_vars['empresa']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
$_smarty_tpl->tpl_vars['empresa']->do_else = false;
?>									
								<tr>
								  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['id'];?>
</th>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['emp_cnpj'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['emp_razao_social'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['emp_fantasia'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['empresa']->value['emp_abertura'];?>
</td>
								  <td><!--<?php echo (($tmp = $_smarty_tpl->tpl_vars['cartoes']->value['total_comentarios'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
--></td>
								  <td>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
empresas/alterar/<?php echo $_smarty_tpl->tpl_vars['empresa']->value['idurl'];?>
"><button  class="btn btn-info btn-editar" style="margin-right: 4px;"><i class="medium material-icons" style="font-size: 16px;">create</i></button></a>
									  <button  class="btn btn-danger btn-excluir" data-id="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['idurl'];?>
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

<div id="locacao-nova" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;">
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
