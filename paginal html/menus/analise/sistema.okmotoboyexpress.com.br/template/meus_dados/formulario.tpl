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
			<div class="table-responsive-sm">
				<form name="form" method="POST"  class="formulario">
					<br>
					<br>
					<div>
						<h5>Tipo do cadastro</h5>
						<div style="clear:both"></div>							
						<div style="display:flex;">
							<label style="width: 140px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="f" style="margin-right: 2px;" {if $emp_tipo_cadastro=='f'}checked{else}disabled{/if}>Pessoa Físico</label>
							<label><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="j" style="margin-right: 2px;" {if $emp_tipo_cadastro=='j'}checked{else}disabled{/if}> Pessoa Jurídico</label>
						</div>
					</div>
					<div id="fisico"  {if $emp_tipo_cadastro=='j'}style="display:none;"{/if}>
						<input type="hidden" id="tipo_cadastro" value="f">
						<div>
							<label>Nome:</label>
							<input type="text" class="form-control" id="emp_pf_nome" name="emp_pf_nome"  value="{$emp_pf_nome|default:''}">
						</div>						
						<div style="display:flex;">
							<div style="width: 230px;margin-right: 10px;">
								<label>CPF:</label>
								<input type="text" class="form-control" id="emp_pf_cpf" name="emp_pf_cpf"  value="{$emp_pf_cpf|default:''}">
							</div>								
							<div style="width: 214px;">
								<label>Data de nascimento:</label>
								<input type="text" class="form-control" id="emp_pf_dt_nascimento" name="emp_pf_dt_nascimento"  value="{$emp_pf_dt_nascimento|default:''}">
							</div>	
						</div>																					
					</div>
					<div id="juridico" {if $emp_tipo_cadastro=='f'}style="display:none;"{/if}>
						<input type="hidden" id="tipo_cadastro" value="j">
						<div style="width: 335px;">
							<label>CNPJ:</label>
							<input type="text" class="form-control" id="emp_pj_cnpj" name="emp_pj_cnpj"  value="{$emp_pj_cnpj|default:''}">
						</div>								
						<div>
							<label>Nome Fantasia:</label>
							<input type="text" class="form-control" id="emp_pj_fantasia" name="emp_pj_fantasia"  value="{$emp_pj_fantasia|default:''}">
						</div>				
						<div>
							<label>Razao social:</label>							
							<input type="text" class="form-control" id="emp_pj_razao" name="emp_pj_razao"  value="{$emp_pj_razao|default:''}">
						</div>	
						<div>
							<label>IE:</label>
							<div style="display:flex;width:260px;">
								<input type="text" class="form-control" id="emp_pj_ie" name="emp_pj_ie"  value="{$emp_pj_ie|default:''}" style="margin-right: 5px;">
								<div style="margin-top: 8px;margin-left: 2px;display:flex;">
									<input type="checkbox" id="emp_pj_ie_isento" name="emp_pj_ie_isento" value="s" style="margin-right: 2px;" {if $emp_pj_ie_isento!='n'}checked{/if}>	
									<label style="margin-top: 6px;">Isento</label>													
								</div>	
							</div>	
						</div>	
						<div style="width: 460px;">
							<label>Responsavel:</label>							
							<input type="text" class="form-control" id="emp_pj_responsavel" name="emp_pj_responsavel"  value="{$emp_pj_responsavel|default:''}">
						</div>							
					</div>					
					<div id="endereco" >
						<br>
						<h5>Endereço</h5>		
						<hr>
						<div>
							<label>CEP:</label>
							<div style="clear:both;"></div>
							<div style="display:flex;">
								<input type="text" class="form-control" id="emp_cep" name="emp_cep"  value="{$emp_cep|default:''}" style="width:200px;">
								<input type="button" value="Buscar" id="buscar-cep" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">
							</div>
						</div>								
						<div>
							<label>Rua:</label>
							<input type="text" class="form-control" id="emp_rua" name="emp_rua"  value="{$emp_rua|default:''}">
						</div>				
						<div style="display:flex;">				
							<div style="width:200px;margin-right: 10px;">
								<label>Numero:</label>
								<input type="text" class="form-control" id="emp_numero" name="emp_numero"  value="{$emp_numero|default:''}">
							</div>	
							<div style="width:250px;">
								<label>Complemento:</label>
								<input type="text" class="form-control" id="emp_complemento" name="emp_complemento"  value="{$emp_complemento|default:''}">
							</div>							
						</div>							
						<div style="display:flex;">							
							<div style="width: 250px;margin-right: 10px;">
								<label>Bairro:</label>
								<input type="text" class="form-control" id="emp_bairro" name="emp_bairro"  value="{$emp_bairro|default:''}">
							</div>							
							<div style="width: 250px;margin-right: 10px;">
								<label>Cidade:</label>
								<input type="text" class="form-control" id="emp_cidade" name="emp_cidade"  value="{$emp_cidade|default:''}">
							</div>							
							<div>
								<label>Estado:</label>
								<input type="text" class="form-control" id="emp_estado" name="emp_estado"  value="{$emp_estado|default:''}">
							</div>									
						</div>	
					</div>	
					<div id="contato" >		
						<br>
						<h5>Contato</h5>		
						<hr>						
						<div style="display:flex;">						
							<div style="width: 225px;margin-right: 10px;">
								<label>Telefone:</label>
								<input type="text" class="form-control" id="emp_telefone" name="emp_telefone"  value="{$emp_telefone|default:''}">
							</div>						
							<div style="width: 225px;">
								<label>Celular:</label>
								<input type="text" class="form-control" id="emp_celular" name="emp_celular"  value="{$emp_celular|default:''}">
							</div>																		
						</div>											
						<div>
							<label>Facebook:</label>
							<input type="text" class="form-control" id="emp_facebook" name="emp_facebook"  value="{$emp_facebook|default:''}">
						</div>				
						<div>
							<label>Instagram:</label>
							<input type="text" class="form-control" id="emp_instagram" name="emp_instagram"  value="{$emp_instagram|default:''}">
						</div>	
						<div>
							<label>Lista de Emails:</label>
							<input type="text" class="form-control" id="emp_emails" name="emp_emails"  value="{$emp_emails|default:''}">
						</div>															
					</div>								
					<div style="margin-top:30px;">
						<input type="submit" name="submit" value="Alterar dados" id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
					</div>
				</form>				
			</div>	
		</td>
    </tr>
</table>


<div id="dialog-excluir-anexo" title="Confirmar exclusão" style="display: none;">

	{include file="popups/excluir_registro.tpl"}
  
</div>



<input type="hidden" id="qtde_endereco" value="{$qtde_endereco|default:''}">
<input type="hidden" id="nome" value="{$nom_id|default:''}">

<script type="text/javascript" src="{$pagina->base}js/formulario/meus_dados.js"> </script>
<script type="text/javascript" src="{$pagina->base}js/jquery.mask.js"></script>

{include file="rodape.tpl"}