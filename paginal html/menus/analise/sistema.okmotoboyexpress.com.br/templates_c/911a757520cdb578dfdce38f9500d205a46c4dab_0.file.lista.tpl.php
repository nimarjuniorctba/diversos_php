<?php
/* Smarty version 4.1.0, created on 2023-03-26 06:08:54
  from 'D:\Meus Projetos\Local Host\Alfa\portaldenoticias\template\cartoes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_641fc5566512b6_30372393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '911a757520cdb578dfdce38f9500d205a46c4dab' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Host\\Alfa\\portaldenoticias\\template\\cartoes\\lista.tpl',
      1 => 1678662229,
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
function content_641fc5566512b6_30372393 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>
<div style="margin-left:32px;"><h6><?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</h6></div>
<br>

<?php $_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

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
						  <th scope="col">ID</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Número</th>
						  <th scope="col">Validade</th>
						  <th scope="col">Level</th>
						  <th scope="col">Data Colhida</th>
						  <th scope="col">Obs</th>
						  <th scope="col" colspan="2">Ações</th>
						</tr>
					  </thead>
					  <tbody>					 
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
						  <td>0</td>
						  <td>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
cartoes/alterar/<?php echo $_smarty_tpl->tpl_vars['cartoes']->value['idurl'];?>
"><button  class="btn btn-info btn-editar" ><i class="medium material-icons" style="font-size: 16px;">create</i></button></a>
                              <a href="#ex1" rel="modal:open"><button  class="btn btn-danger btn-excluir" class="btn-excluir" ><i class="medium material-icons" style="font-size: 16px;">delete</i></button></a>
						  </td>
						</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>

<div id="ex1" class="modal">

	<div style="display:flex;">	
	<div>
	<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/atencao.png" style="width: 103px;height: 80px;margin-top: 10px;margin-right: 25px;">
	</div>
		<div>	
			<div>	
				<h2 class="text-danger">Atenção</h2>
				<p>Deseja excluir esse registro ?</p>
			</div>
			<div style="width:100%;">
				<a href="#" rel="modal:close"><button  class="btn btn-warning btn-editar " style="margin-right:10px;"><i class="large material-icons" style="font-size: 16px;">close</i>Cancelar</button></a>
				<a href="#" rel="modal:close"><button  class="btn btn-success btn-editar " style="margin-right: 10px;float: right;"><i class="large material-icons" style="font-size: 16px;">check</i>Confirmar</button></a>
			</div>
		</div>
	</div>

</div> 

<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
