<?php
/* Smarty version 4.1.0, created on 2023-07-03 00:31:19
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\usuarios\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64a1fab7983e72_72180406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '408307ce8c1f994139b09973efd30605652afd18' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\usuarios\\formulario.tpl',
      1 => 1688337069,
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
function content_64a1fab7983e72_72180406 (Smarty_Internal_Template $_smarty_tpl) {
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
							<input type="text" class="form-control" id="usu_nome" name="usu_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>
						<div>
							<label>Email:</label>
							<input type="text" class="form-control"  id="usu_email" name="usu_email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>	
							<br>
							<div>
								<label style="font-weight: 600;">Deseja alterar a senha ?</label>
								<div class="form-check form-check-inline" style="margin-left: 5px;">
									<input class="form-check-input usu_altera_senha" type="radio" name="usu_altera_senha" value="n" style="margin-top: 5px;" checked>
									<label class="form-check-label" for="usu_altera_senha0">Não</label>
								</div>	
								<div class="form-check form-check-inline">
									<input class="form-check-input usu_altera_senha" type="radio" name="usu_altera_senha" style="margin-top: 5px;" value="s">
									<label class="form-check-label" for="usu_altera_senha1">Sim</label>
								</div>										
							</div>		
							<div style="clear:both;"></div>
							<div id="alterar_senha" style="display:none;">
								<div style="display:flex;">
									<div style="width: 300px;margin-right: 10px;">
										<label>Senha:</label>
										<input type="text" class="form-control" id="usu_senha" name="usu_senha"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>
									<div style="width: 300px;">
										<label>Confirma senha:</label>
										<input type="text" class="form-control" id="usu_senha2" name="usu_senha2"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_senha2']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
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
									<input type="text" class="form-control" id="usu_senha" name="usu_senha"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>
								<div style="width: 300px;">
									<label>Confirma senha:</label>
									<input type="text" class="form-control" id="usu_senha2" name="usu_senha2"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_senha2']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>							
							</div>										
						<?php }?>						
					</div>	
					<div style="margin-top:30px;">
						<input type="submit" name="submit" <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'alterar') {?>value="Cadastrar"<?php } else { ?>value="Alterar"<?php }?>id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
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
