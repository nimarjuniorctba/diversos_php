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
						
						{if $pagina->acao=='alterar'}
								<input type="hidden" id="cli_idurl" name="cli_idurl" value="{$cli_idurl}">
						{/if}			
						
							<br>
							<br>
							<div>
								<div>
									<label>Nome*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="{$cli_pf_nome|default:''}">
								</div>						
								<div>
									<label>Descrição (Opcional)</label>
									<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="{$cli_pf_cpf|default:''}">
								</div>																		
							</div>
					<div>				
						{if $pagina->acao=='alterar'}		
						
						{/if}					
					</div>							
							<div style="margin-top:30px;">
								<input type="submit" value="{if $pagina->acao == 'cadastrar'}Cadastrar{else}Alterar{/if}" name="submit" id="salvar-nome" class="btn btn-success bg-primary" >
							</div>
						</form>
					</div>																
		</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="{$car_id|default:''}">
<script type="text/javascript" src="{$pagina->base}js/formulario/clientes.js"> </script>
{include file="rodape.tpl"}