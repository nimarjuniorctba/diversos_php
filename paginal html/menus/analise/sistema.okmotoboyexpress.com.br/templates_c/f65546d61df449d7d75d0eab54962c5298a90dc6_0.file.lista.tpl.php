<?php
/* Smarty version 4.1.0, created on 2023-03-11 04:25:58
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\Admin\template\cartoes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640bf4c6c4d4a0_38180543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f65546d61df449d7d75d0eab54962c5298a90dc6' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\Admin\\template\\cartoes\\lista.tpl',
      1 => 1678505148,
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
function content_640bf4c6c4d4a0_38180543 (Smarty_Internal_Template $_smarty_tpl) {
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
						  <th scope="col">Id</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Numero</th>
						  <th scope="col">Banco</th>
						  <th scope="col">Level</th>
						  <th scope="col">Status</th>
						  <th scope="col">Obs</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
					 
						<tr>
						  <th scope="row">001</th>
						  <td>nome</td>
						  <td>1234 65xx xxxx 1234</td>
						  <td>Santander</td>
						  <td>Classic</td>
						  <td>LIVE</td>
						  <td>2</td>
						  <td>
                              <button  class="btn btn-info btn-editar" ><i class="medium material-icons" style="font-size: 16px;">create</i></button>
                              <a rel="modal:open" href="#ex1"><button  class="btn btn-danger btn-excluir" ><i class="medium material-icons" style="font-size: 16px;">delete</i></button></a>
							  </td>
						</tr>
											 
						<tr>
						  <th scope="row">001</th>
						  <td>nome</td>
						  <td>1234 65xx xxxx 1234</td>
						  <td>Santander</td>
						  <td>Classic</td>
						  <td>DEAD</td>
						  <td>2</td>
						  <td>
                              <button  class="btn btn-info btn-editar" ><i class="medium material-icons" style="font-size: 16px;">create</i></button>
                              <a href="#ex1" rel="modal:open"><button  class="btn btn-danger btn-excluir" class="btn-excluir" ><i class="medium material-icons" style="font-size: 16px;">delete</i></button></a>
							  </td>
						</tr>
						
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
