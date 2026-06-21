<?php
/* Smarty version 4.1.0, created on 2023-06-16 15:28:08
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\cartoes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_648c6368707828_99726668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9836bc99c6935f2135e93f8f82a43a29d3083e0' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\cartoes\\formulario.tpl',
      1 => 1682172942,
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
function content_648c6368707828_99726668 (Smarty_Internal_Template $_smarty_tpl) {
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
							  <th scope="col" colspan="2">Preencha os dados do cartão</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control" id="car_id"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled >
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:<span class="obrigatorio"><span></td>
								  <td>
									<input type="text" class="form-control" id="car_dt_cadastro" name="car_dt_cadastro" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_dt_cadastro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>
							<?php }?>						
							<tr>
							  <td>Nome:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="20" class="form-control" id="car_nome" name="car_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Documento:</td>
							  <td>
								<input type="text" maxlength="20" class="form-control" id="car_documento" name="car_documento" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_documento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
							  </td>
							</tr>							
							<tr>
							  <td>Numero:<span class="text-danger">*<span></td>
							  <td>
								<input type="text"  maxlength="40" class="form-control" id="car_numero" name="car_numero"value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_numero']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Data Validade:<span class="text-danger">*</span>
							  <small>(mm/aa)</small>
							  </td>
							  <td>
								<input type="text" maxlength="5" class="form-control" id="car_dt_validade" name="car_dt_validade" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_dt_validade']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>		
							<tr>
							  <td>Cvc:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="4" class="form-control" id="car_cvc" name="car_cvc" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_cvc']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>								
							<tr>
							  <td>Banco:</td>
							  <td>
								<input type="text" class="form-control" id="car_banco" name="car_banco" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_banco']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Level:<span></td>
							  <td>
								<input type="text" class="form-control" id="car_level" name="car_level" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_level']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Type:</td>
							  <td>
								<input type="text" class="form-control" id="car_type" name="car_type" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_type']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Data Colhida:</td>
							  <td>
								<input type="text" class="form-control" id="car_colhida" name="car_colhida" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_colhida']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>			
							<tr>
							  <td>Status:</td>
							  <td>
								<select class="form-control" id="car_status_live" name="car_status_live">
								<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'cadastrar') {?>
									<option value='l' <?php if ($_smarty_tpl->tpl_vars['car_status_live']->value != 'd') {?>selected<?php }?>>Live</option>
									<option value='d' <?php if ($_smarty_tpl->tpl_vars['car_status_live']->value == 'd') {?>selected<?php }?>>Dead</option>
								<?php } else { ?>
									<option value='l' >Live</option>
									<option value='d' >Dead</option>
								<?php }?>
								</select>
							  </td>
							</tr>								
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
					
			<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>	
					<div>	
						
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Comentario<?php if ($_smarty_tpl->tpl_vars['qtde_comentario']->value > 0) {?> #<?php echo $_smarty_tpl->tpl_vars['qtde_comentario']->value;?>
 <?php }?></th>
								</tr>
							</thread>
							<body>
							<?php if ($_smarty_tpl->tpl_vars['qtde_comentario']->value > 0) {?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comentario']->value, 'com');
$_smarty_tpl->tpl_vars['com']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->do_else = false;
?> 								
										<tr >
											<td style="padding:initial;">
												<label style="font-weight:600;margin-left:5px;"><?php echo $_smarty_tpl->tpl_vars['com']->value['titulo'];?>
</label><br>
												<small style="margin-left:20px;"><?php echo $_smarty_tpl->tpl_vars['com']->value['descricao'];?>
</small>
											</td>
											<td style="display:flex;height: 47px;">
												<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png"  style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="editar-comentario" data-id="<?php echo $_smarty_tpl->tpl_vars['com']->value['id'];?>
">
												<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png"  style="width:20px;height:20px;cursor: pointer;" class="excluir-comentario" data-id="<?php echo $_smarty_tpl->tpl_vars['com']->value['id'];?>
">
											</td>
										</tr>								
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>		
							<?php } else { ?>
								<tr>
									<td scope="col" colspan="2" style="text-align:center;">Sem registros</td>
								</tr>
							<?php }?>						
							</tbody>
						</table>
						<input type="button" value="Adicionar comentário" id="adicionar-comentario" class="btn btn-dark" style="margin-left: 5%;">
						<div id="novo-comentario" style="display:none;">
							<table  class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;" >
								<thread>
									<tr class="table-active">
										<th scope="col" colspan="2" class="titulo-comentario" data-id="" >Novo comentário</th>
									</tr>
								</thread>
								<body>										
									<tr>
										<td colspan="2"><input type="text" id="nom_comentario_titulo" name="nom_comentario_titulo" placeholder="Titulo" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><textarea class="form-control" id="nom_comentario_descricao" name="nom_comentario_descricao" rows="3"></textarea></td>
									</tr>		
									<tr>
										<td colspan="2" style="text-align: end;">
											<input type="button" value="Cancelar" id="cancelar-comentario" class="btn btn-danger">
											<input type="button" value="Salvar" id="salvar-comentario" class="btn btn-success">
										</td>
									</tr>		
								</body>
							</table>
						</div>						
					</div>	
					
					<div style="margin-top: 28px;">							
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Proprietário do cartão</th>
								</tr>
							</thread>
							<body>
							<?php if ($_smarty_tpl->tpl_vars['possui_nome']->value == 's') {?>
																	
										<tr >
											<td style="padding:initial;">
												<div style="float:left">
													<br>
													<label style="font-weight:600;margin-left:20px;">Nome:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_nome'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">CPF/CNPJ:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_cpf'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">Mae:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_mae'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">Pai:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_pai'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">RG:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_rg'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">Data Expedição:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_rg_dt_expedicao'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">Data de Nascimento:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_dt_nascimento'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">Local de Nascimento:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_local_nascimento'];?>
<br>
													<label style="font-weight:600;margin-left:20px;">Titulo de eleitor:</label><?php echo $_smarty_tpl->tpl_vars['nome']->value['nom_titulo_eleitor'];?>
<br>
													<br>
												</div>												
												<div style="float:right;margin-right: 25px;margin-top: 10px;">
													<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png"  style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="editar-nome" data-id="<?php echo $_smarty_tpl->tpl_vars['nome']->value['id'];?>
">
													<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png"  style="width:20px;height:20px;cursor: pointer;" class="excluir-nome" data-id="<?php echo $_smarty_tpl->tpl_vars['nome']->value['id'];?>
">
												</div>
											</td>
										</tr>								
									
							<?php } else { ?>
								<tr>
									<td scope="col" colspan="2" style="text-align:center;">Sem registros</td>
								</tr>
							<?php }?>						
							</tbody>
						</table>
						<input type="button" value="Adicionar Nome" id="adicionar-nome" class="btn btn-dark" style="margin-left: 5%;<?php if ($_smarty_tpl->tpl_vars['possui_nome']->value == 's') {?>display:none;<?php }?>">
						<div id="novo-nome" style="display:none;">
							<table  class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;" >
								<thread>
									<tr class="table-active">
										<th scope="col" colspan="2" class="titulo-nome" data-id="" >Novo nome</th>
									</tr>
								</thread>
								<body>										
									<tr>
										<td colspan="2"><input type="text" id="nom_nome_cartao" name="nom_nome_cartao" placeholder="Nome" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_cpf_cartao" name="nom_cpf_cartao" placeholder="CPF" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_mae_cartao" name="nom_mae_cartao" placeholder="Mae" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_pai_cartao" name="nom_pai_cartao" placeholder="Pai" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_rg_cartao" name="nom_rg_cartao" placeholder="RG" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_dt_exp_rg_cartao" name="nom_dt_exp_rg_cartao" placeholder="Data de Expedição do RG" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_dt_nascimento_cartao" name="nom_dt_nascimento_cartao" placeholder="Data Nascimento" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_local_nascimento_cartao" name="nom_local_nascimento_cartao" placeholder="Local nascimento" class="form-control" ></td>
									</tr>									
									<tr>
										<td colspan="2"><input type="text" id="nom_tt_eleitor_cartao" name="nom_tt_eleitor_cartao" placeholder="Titulo de eleitor" class="form-control" ></td>
									</tr>									
		
									<tr>
										<td colspan="2" style="text-align: end;">
											<input type="button" value="Cancelar" id="cancelar-nome" class="btn btn-danger">
											<input type="button" value="Salvar" id="salvar-nome" class="btn btn-success">
										</td>
									</tr>		
								</body>
							</table>
						</div>						
					</div>	
												
					<hr>
					<div>		
						<div style="display:none;">
							<input type="file" name="desenho" id="upload"/>
							<input type="hidden" name="cli_idurl" id="cli_idurl" value="" />
						</div>					
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Anexo(s)<?php if ($_smarty_tpl->tpl_vars['qtde_anexo']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['qtde_anexo']->value;?>
 registro(s) <?php }?></th>
								</tr>
							</thread>
							<body>	
								<tr>
									<td>
										<div style="display:flex;flex-wrap: wrap;">
										
												<table id="upload_imagem" class="border" style="margin-top: 10px;width:200px;margin-left: 5%;cursor:pointer;border: 3px dashed #216db9!important;">
													<tr>
														<td style="padding: 0;text-align: center;">
															<label class="text-primary font-weight-bold" style="margin-top: 25%;cursor:pointer;">Adicionar anexo</label>
														</td>
													<tr>
													
												</table>									
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upload_anexo']->value, 'anexo');
$_smarty_tpl->tpl_vars['anexo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['anexo']->value) {
$_smarty_tpl->tpl_vars['anexo']->do_else = false;
?>	
												<?php if ($_smarty_tpl->tpl_vars['anexo']->value['tipo'] == 'imagem') {?>
													<table style="margin-top: 10px;width:200px;margin-left: 5%;">
														<tr>
															<td style="padding: 0;">
																<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/uploads/<?php echo $_smarty_tpl->tpl_vars['anexo']->value['caminho'];?>
" style="width:200px;height:100px" >
															</td>
														<tr>
														<tr>
															<td style="padding: 0px;float: right;margin-right: 15px;border: 0;">
																<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png"  class="btn-excluir-anexo" data-id="<?php echo $_smarty_tpl->tpl_vars['anexo']->value['idurl'];?>
" style="width:20px;height:20px;cursor:pointer;margin-right:10px;">
																<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/download.png"  class="btn-download" data-caminho="<?php echo $_smarty_tpl->tpl_vars['anexo']->value['caminho'];?>
" style="width:20px;height:20px;cursor:pointer;">
															</td>												
														</tr>													
													</table>
												<?php } else { ?>												
													<table style="margin-top: 10px;margin-left: 5%;">
														<tr>
															<td style="padding: 0;text-align: center;display: inline-grid;border: 0!important;">
																<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/docs.png" style="width:87px;height:79px;" >
																<small style=""><b>.<?php echo $_smarty_tpl->tpl_vars['anexo']->value['ext'];?>
</b></small>
															</td>
														</tr>
														<tr>
															<td style="padding: 0px;float: right;margin-right: 15px;border: 0;">
																<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png"  class="btn-excluir-anexo" data-id="<?php echo $_smarty_tpl->tpl_vars['anexo']->value['idurl'];?>
" style="width:20px;height:20px;cursor:pointer;margin-right:10px;">
																<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/download.png"  class="btn-download" data-caminho="<?php echo $_smarty_tpl->tpl_vars['anexo']->value['caminho'];?>
" style="width:20px;height:20px;cursor:pointer;">
															</td>												
														</tr>													
													</table>
												<?php }?>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>																									
												
										</div>
									</td>
								</tr>
							</body>			
						</table>
					</div>	
							
								
			<?php }?>						
					
	</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/cartoes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
