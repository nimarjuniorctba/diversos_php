<?php
/* Smarty version 4.1.0, created on 2025-12-07 13:30:19
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\produtos\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6935ab9ba2d244_14087182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d9a9393f7eccac2f4bb3dd1477a7f69eab34507' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\produtos\\formulario.tpl',
      1 => 1765125014,
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
function content_6935ab9ba2d244_14087182 (Smarty_Internal_Template $_smarty_tpl) {
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
			<div>
				<?php echo (($tmp = $_smarty_tpl->tpl_vars['mensagem']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

			</div>
					<div class="table-responsive-sm">
						<form name="form" method="POST"  class="formulario">
						
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<input type="hidden" id="pro_idurl" name="pro_idurl" value="<?php echo $_smarty_tpl->tpl_vars['pro_idurl']->value;?>
">
						<?php }?>			
						
							<br>
							<br>
							<div>
								<br>
								<h5>PRODUTO</h5>		
								<hr>	
								<div <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?> style="display:none;"<?php }?>>
									<label>Status</label>
									<select type="text" class="form-control" id="pro_status" name="pro_status" >
										<option value="a" <?php if ($_smarty_tpl->tpl_vars['pro_status']->value == 'a') {?>selected<?php }?>>Ativo</option>
										<option value="i" <?php if ($_smarty_tpl->tpl_vars['pro_status']->value != 'a') {?>selected<?php }?>>Inativo</option>
									</select>									
								</div>									
								<div>
									<label>Categoria*</label>
									<select type="text" class="form-control" id="pro_categoria" name="pro_categoria" >
									<option value="" <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>selected<?php }?> >Escolha uma categoria</option>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_categoria']->value, 'categorias');
$_smarty_tpl->tpl_vars['categorias']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categorias']->value) {
$_smarty_tpl->tpl_vars['categorias']->do_else = false;
?>	
										<option value=<?php echo $_smarty_tpl->tpl_vars['categorias']->value['idurl'];?>
 <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'cadastrar' && $_smarty_tpl->tpl_vars['categorias']->value['id'] == $_smarty_tpl->tpl_vars['pro_categoria']->value) {?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['categorias']->value['categoria'];?>
</option>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</select>									
								</div>		
								<div>
									<label>Fornecedor*</label>
									<select type="text" class="form-control" id="pro_fornecedor" name="pro_fornecedor" >
									<option value="" <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>selected<?php }?> >Escolha uma categoria</option>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_fornecedor']->value, 'fornecedor');
$_smarty_tpl->tpl_vars['fornecedor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fornecedor']->value) {
$_smarty_tpl->tpl_vars['fornecedor']->do_else = false;
?>	
										<option value=<?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['idurl'];?>
 <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'cadastrar' && $_smarty_tpl->tpl_vars['fornecedor']->value['id'] == $_smarty_tpl->tpl_vars['pro_fornecedor']->value) {?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['fornecedor']->value['fornecedor'];?>
</option>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<option value="0" >Deixar em branco</option>									
									</select>									
								</div>														
								<div>
									<label>Título*</label>
									<input type="text" class="form-control" id="pro_titulo" name="pro_titulo"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_titulo']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>									
								<div>
									<label>Descrição (Opcional)</label>
									<input type="text" class="form-control" id="pro_descricao" name="pro_descricao"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_descricao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								
								<div>
									<label>Código de Barras - GTIN/EAN</label>
									<input type="text" class="form-control" id="pro_codigobaras" name="pro_codigobaras"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_codigobaras']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>													
								<div style="display:flex;">
									<div style="width: 230px;">
										<label>Valor de Custo (R$)*</label>
										<input type="text" class="form-control" id="pro_valor_custo" name="pro_valor_custo"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_valor_custo']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>										
									<div style="width: 230px;margin-left: 20px;">
										<label>Valor de Venda (R$)*</label>
										<input type="text" class="form-control" id="pro_valor_venda" name="pro_valor_venda"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_valor_venda']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</div>																		
								</div>									
								<div style="display:none;">
									<div style="width: 230px;">
										<label>Lucro por unidade (R$)</label>
										<input type="text" class="form-control" id="pro_lucro" name="pro_lucro"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_lucro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>																											
								</div>	
								<br>
								<div>
									<h5 style="font-size: 18px;">Este produto possui estoque?*</h5>
									<div style="clear:both"></div>							
									<div style="display:flex;">
										<label style="width: 140px;"><input type="radio" class="pro_estoque" name="pro_estoque"  value="f" style="margin-right: 2px;" checked>Sim</label>
										<label><input type="radio" class="pro_estoque" name="pro_estoque"  value="j" style="margin-right: 2px;">Não</label>
									</div>
								</div>								
								<br>
								<h5>ESTOQUE</h5>		
								<hr>								
								<div  style="width: 230px;">
									<label>Quantidade*</label>
									<input type="text" class="form-control" id="pro_quantidade" name="pro_quantidade"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['pro_quantidade']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>									
							</div>
					<div>				
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>		
						
						<?php }?>					
					</div>							
							<div style="margin-top:30px;">
								<input type="submit" value="<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?>" name="submit" id="salvar-nome" class="btn btn-success bg-primary" >
							</div>
						</form>
					</div>																
		</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/clientes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
