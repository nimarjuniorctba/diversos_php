<?php
/* Smarty version 4.1.0, created on 2025-11-27 18:52:44
  from 'C:\xampp\htdocs\PetVidaFacil\sistema.petvidafacil.com.br\admin\template\administradores\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6928c82c8ea648_15626385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ecbbe2394477b5e2f64658fcb9678a946443265' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PetVidaFacil\\sistema.petvidafacil.com.br\\admin\\template\\administradores\\formulario.tpl',
      1 => 1688481317,
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
function content_6928c82c8ea648_15626385 (Smarty_Internal_Template $_smarty_tpl) {
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
				<br>

				
					<div class="table-responsive-sm">
					<form name="form" method="POST">
						<div>

						</div>
						<table class="table table-bordered" style="width: 92%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados do usuario</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td style="width:190px;">Codigo</td>
								  <td>
									<input type="text" class="form-control" id="adm_id"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled >
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:</td>
								  <td>
									<input type="text" class="form-control" id="adm_dt_cadastro" name="adm_dt_cadastro" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_dt_cadastro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>
								<tr>
								  <td>Status:</td>
								  <td>
									<input type="text" class="form-control" id="adm_colhida" name="adm_colhida" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_status']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled="true">
								  </td>
								</tr>									
							<?php }?>						
							<tr>
							  <td>Nome:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="100" class="form-control" id="adm_nome" name="adm_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>E-mail:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="255" class="form-control" id="adm_email" name="adm_email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
							  </td>
							</tr>	
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>							
								<tr>
									<td scope="col" colspan="2">
										<label>Deseja alterar a senha ?</label>
										<div class="form-check form-check-inline" style="margin-left: 30px;">
										  <input class="form-check-input adm_altera_senha" type="radio" name="adm_altera_senha" value="n" checked>
										  <label class="form-check-label" for="adm_altera_senha0">Não</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input adm_altera_senha" type="radio" name="adm_altera_senha" value="s">
										  <label class="form-check-label" for="adm_altera_senha1">Sim</label>
										</div>
										<div style="clear:both;"></div>
										<br>
											<div id="alterar_senha" style="display:none;">
												<table class="table table-bordered" style="width: 92%;margin-left:5%">
												  <thead>
													<tr class="table-active">
													  <th scope="col" colspan="2">Preencha a nova senha</th>
													</tr>
												  </thead>
												  <tbody>
														<tr>
															<td>Senha:<span class="text-danger">*</span></td>
															<td>
																<input type="password" class="form-control" id="adm_senha" name="adm_senha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
															</td>
														</tr>	
														<tr>
															<td>Confirmar senha:<span class="text-danger">*</span></td>
															<td>
																<input type="password"class="form-control" id="adm_csenha" name="adm_csenha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_csenha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
															</td>
														</tr>
														<tr>
															<td scope="col"  colspan="2">
																<span style="float:right;">
																<button name="cancelar"  id="cancelar-senha"  class="btn btn-secondary">Cancelar</button>
																<button name="alterar"  id="alterar-senha" class="btn btn-success bg-primary">Alterar senha</button>
																</span>
															</td>
														</tr>								
												  </tbody>										
												</table>			
											</div>	
									</td>
								</tr>	
							<?php } else { ?>

								<tr>
									<td>Senha:<span class="text-danger">*</span></td>
									<td>
										<input type="password" class="form-control" id="adm_senha" name="adm_senha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</td>
								</tr>	
								<tr>
									<td>Confirma senha:<span class="text-danger">*</span></td>
									<td>
										<input type="password"class="form-control" id="adm_csenha" name="adm_csenha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_csenha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</td>
								</tr>
							
							<?php }?>							
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" class="btn btn-success bg-primary"><?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?></button></span>
								</td>
							</tr>							
						  </tbody>
						</table>
					</form>
					</div>	
					
								
					
	</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['adm_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/administradores.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
