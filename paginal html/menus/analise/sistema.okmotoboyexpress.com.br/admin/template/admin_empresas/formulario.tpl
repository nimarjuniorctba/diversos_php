{include file="topo.tpl"}

<br>
<br>
<br>

{include file="abas.tpl"}

<table class="table border principal" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>
				{$mensagem|default:''}
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
							{if $pagina->acao=='alterar'}
								<tr>
								  <td style="width:190px;">Codigo</td>
								  <td>
									<input type="text" class="form-control" value="{$emp_admin_id|default:''}" disabled >
									<input type="hidden" class="form-control" id="emp_admin_id" name="emp_admin_id"  value="{$emp_admin_id|default:''}">
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:</td>
								  <td>
									<input type="text" class="form-control" id="emp_admin_dt_cadastro" name="emp_admin_dt_cadastro" value="{$emp_admin_dt_cadastro|default:''}" disabled>
								  </td>
								</tr>
								<tr>
								  <td>Status:</td>
								  <td>
									<input type="text" class="form-control" id="emp_admin_status" name="emp_admin_status" value="{$emp_admin_status|default:''}" disabled="true">
								  </td>
								</tr>									
							{/if}						
							<tr>
							  <td>Nome:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="100" class="form-control" id="emp_admin_nome" name="emp_admin_nome" value="{$emp_admin_nome|default:''}">
							  </td>
							</tr>
							<tr>
							  <td>E-mail:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="255" class="form-control" id="emp_admin_email" name="emp_admin_email" value="{$emp_admin_email|default:''}" >
							  </td>
							</tr>								
							<tr>
							  <td>Empresa:<span class="text-danger">*</span></td>
							  <td>
								<select name="emp_admin_empresa" id="emp_admin_empresa" class="form-control" {if $pagina->acao!='cadastrar'}data-id="{$emp_admin_empresa}"{/if}>
									{foreach $array_empresa item=$empresas}	
										<option value={$empresas.idurl} {if $pagina->acao!='cadastrar' AND $empresas.id==$emp_admin_empresa}selected{/if} >{$empresas.nome}</option>
									{/foreach}
								</select>
							  </td>
							</tr>	
							{if $pagina->acao=='alterar'}							
								<tr>
									<td scope="col" colspan="2">
										<label>Deseja alterar a senha ?</label>
										<div class="form-check form-check-inline" style="margin-left: 30px;">
										  <input class="form-check-input emp_admin_altera_senha" type="radio" name="emp_admin_altera_senha" value="n" checked>
										  <label class="form-check-label" for="emp_admin_altera_senha0">Não</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input emp_admin_altera_senha" type="radio" name="emp_admin_altera_senha" value="s">
										  <label class="form-check-label" for="emp_admin_altera_senha1">Sim</label>
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
																<input type="password" class="form-control" id="emp_admin_senha" name="emp_admin_senha" value="{$emp_admin_senha|default:''}" >
															</td>
														</tr>	
														<tr>
															<td>Confirmar senha:<span class="text-danger">*</span></td>
															<td>
																<input type="password"class="form-control" id="emp_admin_csenha" name="emp_admin_csenha" value="{$emp_admin_csenha|default:''}" >
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
							{else}

								<tr>
									<td>Senha:<span class="text-danger">*</span></td>
									<td>
										<input type="password" class="form-control" id="emp_admin_senha" name="emp_admin_senha" value="{$emp_admin_senha|default:''}" >
									</td>
								</tr>	
								<tr>
									<td>Confirma senha:<span class="text-danger">*</span></td>
									<td>
										<input type="password"class="form-control" id="emp_admin_csenha" name="emp_admin_csenha" value="{$emp_admin_csenha|default:''}" >
									</td>
								</tr>
							
							{/if}							
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="{$pagina->acao}" class="btn btn-success bg-primary">{if $pagina->acao=='cadastrar'}Cadastrar{else}Alterar{/if}</button></span>
								</td>
							</tr>							
						  </tbody>
						</table>					
					
					</form>
					</div>	
					
								
					
	</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="{$car_id|default:''}">
<script type="text/javascript" src="{$pagina->base}js/formulario/admin_empresas.js"> </script>
{include file="rodape.tpl"}