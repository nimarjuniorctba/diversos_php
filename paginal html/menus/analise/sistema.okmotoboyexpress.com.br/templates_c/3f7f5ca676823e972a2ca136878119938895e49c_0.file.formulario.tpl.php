<?php
/* Smarty version 4.1.0, created on 2025-12-06 09:23:01
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\produtos_fornecedores\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69342025cbb8c0_01257466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f7f5ca676823e972a2ca136878119938895e49c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\produtos_fornecedores\\formulario.tpl',
      1 => 1765023775,
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
function content_69342025cbb8c0_01257466 (Smarty_Internal_Template $_smarty_tpl) {
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
								<input type="hidden" id="for_idurl" name="for_idurl" value="<?php echo $_smarty_tpl->tpl_vars['for_idurl']->value;?>
">
						<?php }?>			
						
							<br>
							<br>
							<div>
								<div>
									<label>Categoria*</label>
									<select type="text" class="form-control" id="for_cat_id" name="for_cat_id" >
									<option value="" <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>selected<?php }?> >Escolha uma categoria</option>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_produtos_categorias']->value, 'categorias');
$_smarty_tpl->tpl_vars['categorias']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categorias']->value) {
$_smarty_tpl->tpl_vars['categorias']->do_else = false;
?>	
										<option value=<?php echo $_smarty_tpl->tpl_vars['categorias']->value['idurl'];?>
 <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'cadastrar' && $_smarty_tpl->tpl_vars['categorias']->value['id'] == $_smarty_tpl->tpl_vars['produto_categoria']->value['categoria']) {?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['categorias']->value['nome'];?>
</option>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</select>									
								</div>								
								<div>
									<label>Nome*</label>
									<input type="text" class="form-control" id="for_nome" name="for_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['for_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>													
								<div>
									<label>CNPJ(Opcional)</label>
									<input type="text" class="form-control" id="for_cnpj" name="for_cnpj"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['for_cnpj']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								
								<div>
									<label>Email(Opcional)</label>
									<input type="text" class="form-control" id="for_email" name="for_email"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['for_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>													
								<div>
									<label>Telefone(Opcional)</label>
									<input type="text" class="form-control" id="for_telefone" name="for_telefone"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['for_telefone']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>	
								<div>
									<label>Celular(Opcional)</label>
									<input type="text" class="form-control" id="for_celular" name="for_celular"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['for_celular']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>													
								<div>
									<label>Descrição(Opcional)</label>
									<input type="text" class="form-control" id="for_descricao" name="for_descricao"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['for_descricao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>
								<div <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>style="display:none;"<?php }?>>
									<label>Status</label>
									<select name="for_status" id="for_status" class="form-control">
										<option value="a" <?php if ($_smarty_tpl->tpl_vars['for_status']->value == 'a') {?>selected<?php }?>>Ativo</option>
										<option value="i" <?php if ($_smarty_tpl->tpl_vars['for_status']->value == 'i') {?>selected<?php }?>>Inativo</option>
									</select>								
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


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/ghj.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
