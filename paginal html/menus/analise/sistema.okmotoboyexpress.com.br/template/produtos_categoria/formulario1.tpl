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
				<div style="margin-left:32px;"><h6>{$pagina->titulo}</h6></div>
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
					<div>

					</div>
						
					</form>
					</div>	
					
			{if $pagina->acao=='alterar'}	
					<div>	
						
						<table class="table table-bordered" style="margin-top: 10px;width: 92%;margin-left: 5%;">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Comentario{if $qtde_comentario>0 } #{$qtde_comentario} {/if}</th>
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
							{if $possui_nome=='s' }
																	
										<tr >
											<td style="padding:initial;">
												<div style="float:left">
													<br>
													<label style="font-weight:600;margin-left:20px;">Nome:</label>{$nome.nom_nome}<br>
													<label style="font-weight:600;margin-left:20px;">CPF/CNPJ:</label>{$nome.nom_cpf}<br>
													<label style="font-weight:600;margin-left:20px;">Mae:</label>{$nome.nom_mae}<br>
													<label style="font-weight:600;margin-left:20px;">Pai:</label>{$nome.nom_pai}<br>
													<label style="font-weight:600;margin-left:20px;">RG:</label>{$nome.nom_rg}<br>
													<label style="font-weight:600;margin-left:20px;">Data Expedição:</label>{$nome.nom_rg_dt_expedicao}<br>
													<label style="font-weight:600;margin-left:20px;">Data de Nascimento:</label>{$nome.nom_dt_nascimento}<br>
													<label style="font-weight:600;margin-left:20px;">Local de Nascimento:</label>{$nome.nom_local_nascimento}<br>
													<label style="font-weight:600;margin-left:20px;">Titulo de eleitor:</label>{$nome.nom_titulo_eleitor}<br>
													<br>
												</div>												
												<div style="float:right;margin-right: 25px;margin-top: 10px;">
													<img src="{$pagina->base}imagens/icones/editar.png"  style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="editar-nome" data-id="{$nome.id}">
													<img src="{$pagina->base}imagens/icones/lixo.png"  style="width:20px;height:20px;cursor: pointer;" class="excluir-nome" data-id="{$nome.id}">
												</div>
											</td>
										</tr>								
									
							{else}
								<tr>
									<td scope="col" colspan="2" style="text-align:center;">Sem registros</td>
								</tr>
							{/if}						
							</tbody>
						</table>
						<input type="button" value="Adicionar Nome" id="adicionar-nome" class="btn btn-dark" style="margin-left: 5%;{if $possui_nome=='s' }display:none;{/if}">
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

<input type="hidden" id="cartao" value="{$car_id|default:''}">
<script type="text/javascript" src="{$pagina->base}js/formulario/cartoes.js"> </script>
{include file="rodape.tpl"}