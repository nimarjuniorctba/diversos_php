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
							{if $pagina->acao=='alterar'}
								<tr>
								  <td>Código</td>
								  <td>
									<input type="text" class="form-control" id="nom_id" value="{$nom_id|default:''}" disabled>
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:<span class="obrigatorio"><span></td>
								  <td>
									<input type="text" class="form-control" id="nom_dt_cadastro" name="nom_dt_cadastro" value="{$nom_dt_cadastro|default:''}" disabled>
								  </td>
								</tr>								
							{/if}						
							<tr>
							  <td>Nome<span class="text-danger">*</span>:</td>
							  <td>
								<input type="text" class="form-control" id="nom_nome" name="nom_nome" value="{$nom_nome|default:''}" >
							  </td>
							</tr>
							<tr>
							  <td>CPF<span class="text-danger">*</span>:</td>
							  <td>
								<input type="text" class="form-control" id="nom_cpf" name="nom_cpf" value="{$nom_cpf|default:''}" {if $pagina->acao=='alterar'}disabled="disabled"{/if}>
								{if $pagina->acao=='alterar'}<input type="hidden" class="form-control" id="nom_cpf" name="nom_cpf" value="{$nom_cpf|default:''}">{/if}
							  </td>
							</tr>							
							<tr>
							  <td>Mae:</td>
							  <td>
								<input type="text" class="form-control" id="nom_mae" name="nom_mae" value="{$nom_mae|default:''}">
							  </td>
							</tr>
							<tr>
							  <td>Pai:</td>
							  <td>
								<input type="text" class="form-control" id="nom_pai" name="nom_pai" value="{$nom_pai|default:''}">
							  </td>
							</tr>
							<tr>
							  <td>RG:</td>
							  <td>
								<input type="text" class="form-control" id="nom_rg" name="nom_rg" value="{$nom_rg|default:''}">
							  </td>
							</tr>							
							<tr>
							  <td>Data de Expedição do RG:</td>
							  <td>
								<input type="text" class="form-control" id="nom_rg_dt_expedicao" name="nom_rg_dt_expedicao" value="{$nom_rg_dt_expedicao|default:''}">
							  </td>
							</tr>
							<tr>
							  <td>Data Nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="nom_dt_nascimento" name="nom_dt_nascimento" value="{$nom_dt_nascimento|default:''}">
							  </td>
							</tr>
							<tr>
							  <td>Local nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="nom_local_nascimento" name="nom_local_nascimento" value="{$nom_local_nascimento|default:''}">
							  </td>
							</tr>
							<tr>
							  <td>Titulo de eleitor:</td>
							  <td>
								<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
							  </td>
							</tr>							
							<tr>
								<td >
									
								</td>
								<td >
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="{$pagina->acao}" class="btn btn-success">{if $pagina->acao=='cadastrar'}Cadastrar{else}Alterar{/if}</button></span>
								</td>
							</tr>

						  </tbody>
						</table>
						
					</form>
					</div>	
			{if $pagina->acao=='alterar'}	
					<div>							
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Endereço(s) {if $qtde_endereco>0 } {$qtde_endereco} registro(s) {/if}</th>
								</tr>
							</thread>
							<body>
							
							{if $qtde_endereco>0 }
									{foreach $endereco as $end} 					
										<tr>
											<td style="padding: initial;">
												<label style="margin-left:5px;">
													{$end.rua},{$end.numero}<br>
													CEP: {$end.cep}<br>
													{$end.bairro},{$end.cidade}/{$end.estado}
												</label>
											</td>
											<td style="display:flex;height: 72px;">
												<div style="margin-top:10px;">
													<img src="{$pagina->base}imagens/icones/editar.png" style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="editar-endereco" data-id="{$end.id}">
													<img src="{$pagina->base}imagens/icones/lixo.png" style="width:20px;height:20px;cursor: pointer;" class="excluir-endereco" data-id="{$end.id}">
												<div>
											</td>
										</tr>								
									{/foreach}		
							{else}
								<tr>
									<td scope="col" colspan="2" style="text-align:center;">Sem registros</td>
								</tr>
							{/if}
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
									<th scope="col" colspan="2">Comentário(s){if $qtde_comentario>0 } {$qtde_comentario} registro(s) {/if}</th>
								</tr>
							</thread>
							<body>
							{if $qtde_comentario>0 }
									{foreach $comentario as $com} 								
										<tr >
											<td style="padding:initial;">
												<label style="font-weight:600;margin-left:5px;">{$com.titulo}</label><br>
												<small style="margin-left:20px;">{$com.descricao}</small>
											</td>
											<td style="display:flex;height: 47px;">
												<img src="{$pagina->base}imagens/icones/editar.png"  style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="editar-comentario" data-id="{$com.id}">
												<img src="{$pagina->base}imagens/icones/lixo.png"  style="width:20px;height:20px;cursor: pointer;" class="excluir-comentario" data-id="{$com.id}">
											</td>
										</tr>								
									{/foreach}		
							{else}
								<tr>
									<td scope="col" colspan="2" style="text-align:center;">Sem registros</td>
								</tr>
							{/if}						
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
									<th scope="col" colspan="2">Anexo(s){if $qtde_anexo>0 } {$qtde_anexo} registro(s) {/if}</th>
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
											{foreach $upload_anexo as $anexo}	
												{if $anexo.tipo=='imagem'}
													<table style="margin-top: 10px;width:200px;margin-left: 5%;">
														<tr>
															<td style="padding: 0;">
																<img src="{$pagina->base}imagens/uploads/{$anexo.caminho}" style="width:200px;height:100px" >
															</td>
														<tr>
														<tr>
															<td style="padding: 0px;float: right;margin-right: 15px;border: 0;">
																<img src="{$pagina->base}imagens/icones/lixo.png"  class="btn-excluir-anexo" data-id="{$anexo.idurl}" style="width:20px;height:20px;cursor:pointer;margin-right:10px;">
																<img src="{$pagina->base}imagens/icones/download.png"  class="btn-download" data-caminho="{$anexo.caminho}" style="width:20px;height:20px;cursor:pointer;">
															</td>												
														</tr>													
													</table>
												{else}												
													<table style="margin-top: 10px;margin-left: 5%;">
														<tr>
															<td style="padding: 0;text-align: center;display: inline-grid;border: 0!important;">
																<img src="{$pagina->base}imagens/icones/docs.png" style="width:87px;height:79px;" >
																<small style=""><b>.{$anexo.ext}</b></small>
															</td>
														</tr>
														<tr>
															<td style="padding: 0px;float: right;margin-right: 15px;border: 0;">
																<img src="{$pagina->base}imagens/icones/lixo.png"  class="btn-excluir-anexo" data-id="{$anexo.idurl}" style="width:20px;height:20px;cursor:pointer;margin-right:10px;">
																<img src="{$pagina->base}imagens/icones/download.png"  class="btn-download" data-caminho="{$anexo.caminho}" style="width:20px;height:20px;cursor:pointer;">
															</td>												
														</tr>													
													</table>
												{/if}
											{/foreach}																									
												
										</div>
									</td>
								</tr>
							</body>			
						</table>
					</div>	
								
			{/if}	


	</td>
    </tr>
</table>


<div id="dialog-excluir-anexo" title="Confirmar exclusão" style="display: none;">

	{include file="popups/excluir_registro.tpl"}
  
</div>



<input type="hidden" id="qtde_endereco" value="{$qtde_endereco|default:''}">
<input type="hidden" id="nome" value="{$nom_id|default:''}">

<script type="text/javascript" src="{$pagina->base}js/formulario/nomes.js"> </script>


{include file="rodape.tpl"}