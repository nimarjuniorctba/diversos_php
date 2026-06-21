<?php
/* Smarty version 4.1.0, created on 2023-07-11 09:58:01
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\clientes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64ad51d9555449_29164432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ead948e41a2ac5f24bf536af633db5de62f376d8' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\clientes\\formulario.tpl',
      1 => 1689080270,
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
function content_64ad51d9555449_29164432 (Smarty_Internal_Template $_smarty_tpl) {
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
								<input type="hidden" id="cli_idurl" name="cli_idurl" value="<?php echo $_smarty_tpl->tpl_vars['cli_idurl']->value;?>
">
						<?php }?>			
						
							<br>
							<br>
							<div>
								<h5>Tipo do cadastro</h5>
								<div style="clear:both"></div>							
								<div style="display:flex;">
									<label style="width: 140px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="f" style="margin-right: 2px;" checked>Pessoa Físico</label>
									<label><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="j" style="margin-right: 2px;">Pessoa Jurídico</label>
								</div>
							</div>
							<div id="fisico">
								<input type="hidden" id="tipo_cadastro" value="f">
								<div>
									<label>Nome:</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>						
								<div style="display:flex;">
									<div style="width: 230px;margin-right: 10px;">
										<label>CPF:</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>								
									<div style="width: 214px;">
										<label>Data de nascimento:</label>
										<input type="text" class="form-control" id="cli_pf_dt_nascimento" name="cli_pf_dt_nascimento"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_dt_nascimento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>	
								</div>	
																												
							</div>
							<div id="juridico" style="display:none;">
								<input type="hidden" id="tipo_cadastro" value="j">
								<div style="width: 335px;">
									<label>CNPJ:</label>
									<input type="text" class="form-control" id="cli_pj_cnpj" name="cli_pj_cnpj"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pj_cnpj']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								
								<div>
									<label>Nome Fantasia:</label>
									<input type="text" class="form-control" id="cli_pj_fantasia" name="cli_pj_fantasia"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pj_fantasia']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>				
								<div>
									<label>Razao social:</label>							
									<input type="text" class="form-control" id="cli_pj_razao" name="cli_pj_razao"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pj_razao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>	
								<div>
									<label>IE:</label>
									<div style="display:flex;width:260px;">
										<input type="text" class="form-control" id="cli_pj_ie" name="cli_pj_ie"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pj_ie']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="margin-right: 5px;">
										<div style="margin-top: 8px;margin-left: 2px;display:flex;">
											<input type="checkbox" name="ie_pj_isento" value="s" style="margin-right: 2px;">	
											<label style="margin-top: 6px;">Isento</label>													
										</div>	
									</div>	
								</div>	
								<div style="width: 460px;">
									<label>Responsavel:</label>							
									<input type="text" class="form-control" id="cli_pj_responsavel" name="cli_pj_responsavel"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pj_responsavel']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>							
							</div>	
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'alterar') {?>	
							<div id="endereco" >
								<br>
								<h5>Endereço</h5>		
								<hr>
								<div>
									<label>CEP:</label>
									<div style="clear:both;"></div>
									<div style="display:flex;">
										<input type="text" class="form-control" id="cli_end_cep" name="cli_end_cep"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_cep']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" maxlength="8" style="width:200px;">
										<input type="button" value="Buscar" id="buscar-cep-cad" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">
									</div>
								</div>								
								<div>
									<label>Rua:</label>
									<input type="text" class="form-control" id="cli_end_rua" name="cli_end_rua"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_rua']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>				
								<div style="display:flex;">				
									<div style="width:200px;margin-right: 10px;">
										<label>Numero:</label>
										<input type="text" class="form-control" id="cli_end_numero" name="cli_end_numero"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_numero']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>	
									<div style="width:250px;">
										<label>Complemento:</label>
										<input type="text" class="form-control" id="cli_end_complemento" name="cli_end_complemento"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_complemento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>							
								</div>							
								<div style="display:flex;">							
									<div style="width: 250px;margin-right: 10px;">
										<label>Bairro:</label>
										<input type="text" class="form-control" id="cli_end_bairro" name="cli_end_bairro"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_bairro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>							
									<div style="width: 250px;margin-right: 10px;">
										<label>Cidade:</label>
										<input type="text" class="form-control" id="cli_end_cidade" name="cli_end_cidade"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_cidade']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>							
									<div>
										<label>Estado:</label>
										<input type="text" class="form-control" id="cli_end_estado" name="cli_end_estado"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_end_estado']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>									
								</div>	
							</div>	
							<?php }?>
							<div id="contato" >		
								<br>
								<h5>Contatos</h5>		
								<hr>						
								<div style="display:flex;">						
									<div style="width: 225px;margin-right: 10px;">
										<label>Telefone:</label>
										<input type="text" class="form-control" id="cli_telefone" name="cli_telefone"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_telefone']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>						
									<div style="width: 225px;">
										<label>Celular:</label>
										<input type="text" class="form-control" id="cli_celular" name="cli_celular"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_celular']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>																		
								</div>										
								<div>
									<label>Email:</label>
									<input type="text" class="form-control" id="cli_email" name="cli_email"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>															
								<div>
									<label>Facebook:</label>
									<input type="text" class="form-control" id="cli_facebook" name="cli_facebook"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_facebook']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>				
								<div>
									<label>Instagram:</label>
									<input type="text" class="form-control" id="cli_instagram" name="cli_instagram"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_instagram']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>	
							</div>
<div>				<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>		
								<br>
								<h5>Endereços</h5>		
								<hr>		
					<div style="margin-top: 36px;">							
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="barra-titulo">
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
												</div>
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
						
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active barra-titulo">
									<th scope="col" colspan="2" class="titulo-endereco" data-id="" >Endereço</th>
								</tr>
							</thread>
							<body>	
								<tr><td>
									<div>
										<div style="width: 490px;display:flex;">
											<div style="width: 125px;">
												<label>Cep</label>
												<input type="text" id="end_cep" name="end_cep" class="form-control" maxlength="8" style="margin-right: 10px;">
											</div>												
											<div style="margin-top: 24px;">
												<input type="button" value="Buscar" id="busca-cep" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">											
											</div>												
										</div>		
									</div>	
									<div style="margin-right: 10px;">	
										<label>Rua</label>
										<input type="text" id="end_rua" name="end_rua" class="form-control" >
									</div>											
									<div style="margin-right: 10px;display:flex;">	
											<div  style="width: 160px;margin-right: 6px;">
												<label>Numero</label>
												<input type="text" id="end_numero" name="end_numero" class="form-control">	
											</div>	
											<div>	
												<label>Complemento</label>										
												<input type="text" id="end_comp" name="end_comp"class="form-control">		
											</div>	
									</div>		
									<div style="display:flex;">
										<div style="margin-right: 10px;">
											<label>Bairro</label>
											<input type="text" id="end_bairro" name="end_bairro"style="width:100%;" class="form-control" >
										</div>	
										<div style="margin-right: 10px;">	
											<label>Cidade</label>													
											<input type="text" id="end_cidade" name="end_cidade" class="form-control">
										</div>	
										<div style="width: 190px;">	
											<label>Estado</label>													
											<input type="text" id="end_estado" name="end_estado" class="form-control" >
										</div>		
									</div>
									<div style="margin-top: 20px;text-align: end;">								
										<input type="button" value="Cancelar" id="cancelar-endereco" class="btn btn-danger">
										<input type="button" value="Salvar" id="salvar-endereco" class="btn btn-primary">								
									</div>	
								</td></tr>
							</tbody>
						</table>

							
						</div>							
					</div>	
					<?php }?>
					
</div>							
							<div style="margin-top:30px;">
								<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" name="submit" id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
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
