<?php
/* Smarty version 4.1.0, created on 2023-03-13 04:06:47
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\portaldenoticias\template\nomes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640e934718cad7_62500258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fea24e53ba2daa009ab9277e1b527abf8af853b' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\portaldenoticias\\template\\nomes\\lista.tpl',
      1 => 1678676794,
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
function content_640e934718cad7_62500258 (Smarty_Internal_Template $_smarty_tpl) {
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
						  <th scope="col">CPF</th>
						  <th scope="col">Data nascimento</th>
						  <th scope="col">Local nascimento</th>
						  <th scope="col" colspan="2">Ações</th>
						</tr>
					  </thead>
					  <tbody>					 
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_nomes']->value, 'nomes');
$_smarty_tpl->tpl_vars['nomes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['nomes']->value) {
$_smarty_tpl->tpl_vars['nomes']->do_else = false;
?>						 
						<tr>
						  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['nomes']->value['id'];?>
</th>
						  <td><?php echo $_smarty_tpl->tpl_vars['nomes']->value['nome'];?>
</td>
						  <td><?php echo $_smarty_tpl->tpl_vars['nomes']->value['cpf'];?>
</td>
						  <td><?php echo $_smarty_tpl->tpl_vars['nomes']->value['dt_nascimento'];?>
</td>
						  <td><?php echo $_smarty_tpl->tpl_vars['nomes']->value['local_nascimento'];?>
</td>
						  <td>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
nomes/alterar/<?php echo $_smarty_tpl->tpl_vars['nomes']->value['idurl'];?>
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


<div id="locacao-nova" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;">

teste
	
</div>

<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
