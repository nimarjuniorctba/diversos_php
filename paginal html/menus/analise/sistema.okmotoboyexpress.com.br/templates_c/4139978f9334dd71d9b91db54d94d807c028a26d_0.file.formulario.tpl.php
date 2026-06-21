<?php
/* Smarty version 4.1.0, created on 2025-11-26 11:03:06
  from 'C:\xampp\htdocs\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\usuarios\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6927089ae5f9f7_64578734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4139978f9334dd71d9b91db54d94d807c028a26d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\usuarios\\formulario.tpl',
      1 => 1764165770,
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
function content_6927089ae5f9f7_64578734 (Smarty_Internal_Template $_smarty_tpl) {
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
			<br>
			<div class="table-responsive-sm">
				<form name="form" method="POST" class="formulario">
					<div>
						<div>
							<label>Nome:</label>
							<input type="text" class="form-control" id="emp_admin_nome" name="emp_admin_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_admin_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>
						<div>
							<label>Email:</label>
							<input type="text" class="form-control"  id="emp_admin_email" name="emp_admin_email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_admin_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>	
							<br>
							<div>
								<label style="font-weight: 600;">Deseja alterar a senha ?</label>
								<div class="form-check form-check-inline" style="margin-left: 5px;">
									<input class="form-check-input emp_admin_senha" type="radio" name="emp_admin_senha" value="n" style="margin-top: 5px;" checked>
									<label class="form-check-label" for="emp_admin_senha0">Não</label>
								</div>	
								<div class="form-check form-check-inline">
									<input class="form-check-input emp_admin_senha" type="radio" name="emp_admin_senha" style="margin-top: 5px;" value="s">
									<label class="form-check-label" for="emp_admin_senha1">Sim</label>
								</div>										
							</div>		
							<div style="clear:both;"></div>
							<div id="alterar_senha" style="display:none;">
								<div style="display:flex;">
									<div style="width: 300px;margin-right: 10px;">
										<label>Senha:</label>
										<input type="password" class="form-control" id="emp_admin_senha" name="emp_admin_senha"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_admin_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>
									<div style="width: 300px;">
										<label>Confirma senha:</label>
										<input type="password" class="form-control" id="emp_admin_senha2" name="emp_admin_senha2"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_admin_senha2']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>
									<span style="margin-left: 10px;margin-top: 23px;">
										<button name="cancelar"  id="cancelar-senha"  class="btn btn-secondary">Cancelar</button>
										<button name="alterar"  id="alterar-senha" class="btn bg-primary" style="color:white;">Alterar senha</button>
									</span>									
								</div>
								<div id="alert-senha" style="display:none;">
									<div class="alert alert-danger" role="alert" style="margin-top: 10px;width: 609px;border: 1px dashed #721c24;text-align: center;">
										<div class=""><span id="info-senha">As senhas devem ser iguais1.</span></div>
									</div>						
								</div>								
							</div>
						<?php } else { ?>
							<div style="display:flex;">
								<div style="width: 300px;margin-right: 10px;">
									<label>Senha:</label>
									<input type="password" class="form-control" id="emp_admin_senha" name="emp_admin_senha"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_admin_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>
								<div style="width: 300px;">
									<label>Confirma senha:</label>
									<input type="password" class="form-control" id="emp_admin_senha2" name="emp_admin_senha2"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_admin_senha2']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>							
							</div>										
						<?php }?>						
					</div>	
					<div style="margin-top:30px;">
						<input type="submit" name="submit" <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'alterar') {?>value="cadastrar"<?php } else { ?>value="Alterar"<?php }?>id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
					</div>					
				</form>
			</div>			
	</td>
    </tr>
</table>

<input type="hidden" id="usu_id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/usuarios.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
