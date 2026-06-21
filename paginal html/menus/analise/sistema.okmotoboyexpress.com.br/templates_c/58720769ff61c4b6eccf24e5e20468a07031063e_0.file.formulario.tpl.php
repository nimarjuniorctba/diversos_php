<?php
/* Smarty version 4.1.0, created on 2023-04-22 18:26:49
  from 'D:\Meus Projetos\Local Web\Alfa\portaldenoticias\template\nomes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64440ac90d1cd8_35868118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58720769ff61c4b6eccf24e5e20468a07031063e' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Alfa\\portaldenoticias\\template\\nomes\\formulario.tpl',
      1 => 1682172938,
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
function content_64440ac90d1cd8_35868118 (Smarty_Internal_Template $_smarty_tpl) {
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

						<br>
						<table class="table table-bordered" style="width: 92%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados da pessoa</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td>Código</td>
								  <td>
									<input type="text" class="form-control" id="nom_id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:<span class="obrigatorio"><span></td>
								  <td>
									<input type="text" class="form-control" id="nom_dt_cadastro" name="nom_dt_cadastro" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_dt_cadastro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>								
							<?php }?>						
							<tr>
							  <td>Nome<span class="text-danger">*</span>:</td>
							  <td>
								<input type="text" class="form-control" id="nom_nome" name="nom_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
							  </td>
							</tr>
							<tr>
							  <td>CPF<span class="text-danger">*</span>:</td>
							  <td>
								<input type="text" class="form-control" id="nom_cpf" name="nom_cpf" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>disabled="disabled"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?><input type="hidden" class="form-control" id="nom_cpf" name="nom_cpf" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"><?php }?>
							  </td>
							</tr>							
							<tr>
							  <td>Mae:</td>
							  <td>
								<input type="text" class="form-control" id="nom_mae" name="nom_mae" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_mae']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Pai:</td>
							  <td>
								<input type="text" class="form-control" id="nom_pai" name="nom_pai" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_pai']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>RG:</td>
							  <td>
								<input type="text" class="form-control" id="nom_rg" name="nom_rg" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_rg']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Data de Expedição do RG:</td>
							  <td>
								<input type="text" class="form-control" id="nom_rg_dt_expedicao" name="nom_rg_dt_expedicao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_rg_dt_expedicao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Data Nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="nom_dt_nascimento" name="nom_dt_nascimento" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_dt_nascimento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Local nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="nom_local_nascimento" name="nom_local_nascimento" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_local_nascimento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Titulo de eleitor:</td>
							  <td>
								<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
								<td >
									
								</td>
								<td >
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
									<th scope="col" colspan="2">Endereço(s) <?php if ($_smarty_tpl->tpl_vars['qtde_endereco']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['qtde_endereco']->value;?>
 registro(s) <?php }?></th>
								</tr>
							</thread>
							<body>
							
							<?php if ($_smarty_tpl->tpl_vars['qtde_endereco']->value > 0) {?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['endereco']->value, 'end');
$_smarty_tpl->tpl_vars['end']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['end']->value) {
$_smarty_tpl->tpl_vars['end']->do_else = false;
?> 					
										<tr>
											<td style="padding: initial;">
												<label style="margin-left:5px;">
													<?php echo $_smarty_tpl->tpl_vars['end']->value['rua'];?>
,<?php echo $_smarty_tpl->tpl_vars['end']->value['numero'];?>
<br>
													CEP: <?php echo $_smarty_tpl->tpl_vars['end']->value['cep'];?>
<br>
													<?php echo $_smarty_tpl->tpl_vars['end']->value['bairro'];?>
,<?php echo $_smarty_tpl->tpl_vars['end']->value['cidade'];?>
/<?php echo $_smarty_tpl->tpl_vars['end']->value['estado'];?>

												</label>
											</td>
											<td style="display:flex;height: 72px;">
												<div style="margin-top:10px;">
													<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png" style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="editar-endereco" data-id="<?php echo $_smarty_tpl->tpl_vars['end']->value['id'];?>
">
													<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png" style="width:20px;height:20px;cursor: pointer;" class="excluir-endereco" data-id="<?php echo $_smarty_tpl->tpl_vars['end']->value['id'];?>
">
												<div>
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
						<input type="button" value="Adicionar Endereço" id="adicionar-endereco" class="btn btn-dark" style="margin-left: 5%;">
						<div id="novo-endereco" style="display:none;">
							<table  class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;" >
								<thread>
									<tr class="table-active">
										<th scope="col" colspan="2" class="titulo-endereco" data-id="" >Novo endereço</th>
									</tr>
								</thread>
								<body>
									<tr>
										<td><input type="text" id="end_cep" name="end_cep" placeholder="Cep*" class="form-control" ></td>
										<td><input type="text" id="end_numero" name="end_numero" placeholder="Numero*" class="form-control" ></td>				
									</tr>		
									<tr>
										<td colspan="2"><input type="text" id="end_rua" name="end_rua" placeholder="Rua" class="form-control" ></td>
									</tr>		
									<tr>
										<td><input type="text" id="end_comp" name="end_comp" placeholder="Complemento" class="form-control" ></td>			
										<td><input type="text" id="end_bairro" name="end_bairro" placeholder="Bairro" style="width:100%" class="form-control" ></td>
									</tr>	
									<tr>
										<td><input type="text" id="end_cidade" name="end_cidade" placeholder="Cidade" class="form-control" ></td>
										<td><input type="text" id="end_estado" name="end_estado" placeholder="Estado" class="form-control" ></td>
									</tr>
									<tr>
										<td colspan="2" style="text-align: end;">
											<input type="button" value="Cancelar" id="cancelar-endereco" class="btn btn-danger">
											<input type="button" value="Salvar" id="salvar-endereco" class="btn btn-success">
										</td>
									</tr>		
								</body>
							</table>
						</div>						
					</div>							
					<hr>
					<div>							
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Comentário(s)<?php if ($_smarty_tpl->tpl_vars['qtde_comentario']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['qtde_comentario']->value;?>
 registro(s) <?php }?></th>
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
						<input type="button" value="Adicionar Observação" id="adicionar-comentario" class="btn btn-dark" style="margin-left: 5%;">
						<div id="novo-comentario" style="display:none;">
							<table  class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;" >
								<thread>
									<tr class="table-active">
										<th scope="col" colspan="2" class="titulo-comentario" data-id="" >Novo Comentário</th>
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


<div id="dialog-excluir-anexo" title="Confirmar exclusão" style="display: none;">

	<?php $_smarty_tpl->_subTemplateRender("file:popups/excluir_registro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
</div>



<input type="hidden" id="qtde_endereco" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['qtde_endereco']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<input type="hidden" id="nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/nomes.js"> <?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
