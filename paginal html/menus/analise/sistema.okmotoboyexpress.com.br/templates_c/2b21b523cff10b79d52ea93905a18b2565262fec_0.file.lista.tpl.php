<?php
/* Smarty version 4.1.0, created on 2026-03-07 08:38:05
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\produtos_estoque\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69ac0e1dabc244_29637122',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b21b523cff10b79d52ea93905a18b2565262fec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\produtos_estoque\\lista.tpl',
      1 => 1772883440,
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
function content_69ac0e1dabc244_29637122 (Smarty_Internal_Template $_smarty_tpl) {
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
						  <th scope="col">Produto</th>
						  <th scope="col">Estoque</th>
						<!--  <th scope="col" colspan="2">Opções</th>-->
						</tr>
					  </thead>
					  <tbody>
						<?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>					  
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_produtos']->value, 'produto');
$_smarty_tpl->tpl_vars['produto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['produto']->value) {
$_smarty_tpl->tpl_vars['produto']->do_else = false;
?>						 
								<tr>
								  <td><?php echo $_smarty_tpl->tpl_vars['produto']->value['titulo'];?>
</td>
								  <td><?php echo $_smarty_tpl->tpl_vars['produto']->value['quantidade'];?>
</td>
					<!--			  <td>
									  <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
produtos-categorias/alterar/<?php echo $_smarty_tpl->tpl_vars['produto']->value['idurl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png" style="width:20px;height:20px;margin-right:5px;cursor: pointer;"></a>
									  <img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png" style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="btn-excluir" data-id="<?php echo $_smarty_tpl->tpl_vars['produto']->value['idurl'];?>
">
								  </td>-->
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
