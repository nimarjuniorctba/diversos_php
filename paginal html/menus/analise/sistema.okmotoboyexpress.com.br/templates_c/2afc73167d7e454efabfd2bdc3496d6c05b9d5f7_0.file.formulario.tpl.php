<?php
/* Smarty version 4.1.0, created on 2023-06-07 03:37:44
  from 'D:\Meus Projetos\Local Web\ProdutoresWeb.com.br\LocalHost\sistema.petvidafacil.com.br\template\usuarios\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_647fdf68291477_17750979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2afc73167d7e454efabfd2bdc3496d6c05b9d5f7' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\ProdutoresWeb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\usuarios\\formulario.tpl',
      1 => 1682102547,
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
function content_647fdf68291477_17750979 (Smarty_Internal_Template $_smarty_tpl) {
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
				<div style="margin-left:32px;"><h6><?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</h6></div>
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
									<input type="text" class="form-control" id="usu_id"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled >
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:</td>
								  <td>
									<input type="text" class="form-control" id="usu_dt_cadastro" name="usu_dt_cadastro" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_dt_cadastro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>
								<tr>
								  <td>Status:</td>
								  <td>
									<input type="text" class="form-control" id="usu_colhida" name="usu_colhida" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_status']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled="true">
								  </td>
								</tr>									
							<?php }?>						
							<tr>
							  <td>Nome:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="100" class="form-control" id="usu_nome" name="usu_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>E-mail:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="255" class="form-control" id="usu_email" name="usu_email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
							  </td>
							</tr>	
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>							
								<tr>
									<td scope="col" colspan="2">
										<label>Deseja alterar a senha ?</label>
										<div class="form-check form-check-inline" style="margin-left: 30px;">
										  <input class="form-check-input usu_altera_senha" type="radio" name="usu_altera_senha" value="n" checked>
										  <label class="form-check-label" for="usu_altera_senha0">Não</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input usu_altera_senha" type="radio" name="usu_altera_senha" value="s">
										  <label class="form-check-label" for="usu_altera_senha1">Sim</label>
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
																<input type="password" class="form-control" id="usu_senha" name="usu_senha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
															</td>
														</tr>	
														<tr>
															<td>Confirmar senha:<span class="text-danger">*</span></td>
															<td>
																<input type="password"class="form-control" id="usu_csenha" name="usu_csenha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_csenha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
															</td>
														</tr>
														<tr>
															<td scope="col"  colspan="2">
																<span style="float:right;">
																<button name="cancelar"  id="cancelar-senha"  class="btn btn-secondary">Cancelar</button>
																<button name="alterar"  id="alterar-senha" class="btn btn-success">Alterar senha</button>
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
										<input type="password" class="form-control" id="usu_senha" name="usu_senha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_senha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</td>
								</tr>	
								<tr>
									<td>Confirma senha:<span class="text-danger">*</span></td>
									<td>
										<input type="password"class="form-control" id="usu_csenha" name="usu_csenha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_csenha']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</td>
								</tr>
							
							<?php }?>							
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" class="btn btn-success"><?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?></button></span>
								</td>
							</tr>							
						  </tbody>
						</table>
					</form>
					</div>	
					
								
					
	</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['usu_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/usuarios.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
