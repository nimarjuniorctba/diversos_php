<?php
/* Smarty version 4.1.0, created on 2023-03-04 18:45:07
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Bitoder\Modelos\Projeto Modelo\template\clientes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640383a32279d5_18020362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b142b4beccd688b37d114676e550db1cf79a499' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Bitoder\\Modelos\\Projeto Modelo\\template\\clientes\\lista.tpl',
      1 => 1677951904,
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
function content_640383a32279d5_18020362 (Smarty_Internal_Template $_smarty_tpl) {
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
				<br>
					<div class="table-responsive-sm">
					<table class="table table-bordered" style="width: 75%;margin-left:5%">
					  <thead>
						<tr class="table-active">
						  <th scope="col">Codigo</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Email</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
					 
						<tr>
						  <th scope="row">001</th>
						  <td>nome</td>
						  <td>email</td>
						  <td>
                              <button  class="btn btn-info btn-editar" ><i class="medium material-icons" style="font-size: 16px;">create</i></button>
                              <a rel="modal:open" href="#locacao-nova"><button  class="btn btn-danger btn-excluir" ><i class="medium material-icons" style="font-size: 16px;">delete</i></button></a>
							  </td>
						</tr>
						
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>

<div style="margin-right:5px;"><a rel="modal:open" href="#locacao-nova"><button  class="btn btn-success btn-novo-locacao"><i class="large material-icons">shopping_cart</i>Nova locação</button></a></div>

<div id="locacao-nova" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;">

teste
	
</div>

<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
