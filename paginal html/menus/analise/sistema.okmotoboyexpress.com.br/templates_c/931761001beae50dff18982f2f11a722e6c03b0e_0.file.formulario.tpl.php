<?php
/* Smarty version 4.1.0, created on 2025-12-04 22:09:08
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\produtos_categoria\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_693230b49af904_06346388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '931761001beae50dff18982f2f11a722e6c03b0e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\produtos_categoria\\formulario.tpl',
      1 => 1764896940,
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
function content_693230b49af904_06346388 (Smarty_Internal_Template $_smarty_tpl) {
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
								<input type="hidden" id="cat_idurl" name="cat_idurl" value="<?php echo $_smarty_tpl->tpl_vars['cat_idurl']->value;?>
">
						<?php }?>			
						
							<br>
							<br>
							<div>
								<div>
									<label>Nome*</label>
									<input type="text" class="form-control" id="cat_nome" name="cat_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cat_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>						
								<div>
									<label>Descrição (Opcional)</label>
									<input type="text" class="form-control" id="cat_descricao" name="cat_descricao"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cat_descricao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>																		
							</div>
					<div>				
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>		
							<div>
								<label style="font-weight: 600;">Status do produto</label>
								<div class="form-check form-check-inline" style="margin-left: 5px;">
									<input class="form-check-input cat_status" type="radio" name="cat_status" value="a" style="margin-top: 5px;" <?php if ($_smarty_tpl->tpl_vars['cat_status']->value == 'a') {?>checked<?php }?> >
									<label class="form-check-label" for="cat_status">Ativo</label>
								</div>	
								<div class="form-check form-check-inline">
									<input class="form-check-input cat_status" type="radio" name="cat_status" style="margin-top: 5px;" value="i" <?php if ($_smarty_tpl->tpl_vars['cat_status']->value == 'i') {?>checked<?php }?>>
									<label class="form-check-label" for="cat_status">Inativo</label>
								</div>										
							</div>						
						<?php }?>					
					</div>							
							<div style="margin-top:30px;">
								<input type="submit" value="<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>cadastrar<?php } else { ?>Alterar<?php }?>" name="submit" id="salvar-nome" class="btn btn-success bg-primary" >
							</div>
						</form>
					</div>																
		</td>
    </tr>
</table>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/clientes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
