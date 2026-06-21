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
								<input type="hidden" id="cat_idurl" name="cat_idurl" value="{$cat_idurl}">
						{/if}			
						
							<br>
							<br>
							<div>
								<div>
									<label>Nome*</label>
									<input type="text" class="form-control" id="cat_nome" name="cat_nome"  value="{$cat_nome|default:''}">
								</div>						
								<div>
									<label>Descrição (Opcional)</label>
									<input type="text" class="form-control" id="cat_descricao" name="cat_descricao"  value="{$cat_descricao|default:''}">
								</div>																		
							</div>
					<div>				
						{if $pagina->acao=='alterar'}		
							<div>
								<label style="font-weight: 600;">Status do produto</label>
								<div class="form-check form-check-inline" style="margin-left: 5px;">
									<input class="form-check-input cat_status" type="radio" name="cat_status" value="a" style="margin-top: 5px;" {if $cat_status=='a'}checked{/if} >
									<label class="form-check-label" for="cat_status">Ativo</label>
								</div>	
								<div class="form-check form-check-inline">
									<input class="form-check-input cat_status" type="radio" name="cat_status" style="margin-top: 5px;" value="i" {if $cat_status=='i'}checked{/if}>
									<label class="form-check-label" for="cat_status">Inativo</label>
								</div>										
							</div>						
						{/if}					
					</div>							
							<div style="margin-top:30px;">
								<input type="submit" value="{if $pagina->acao == 'cadastrar'}cadastrar{else}Alterar{/if}" name="submit" id="salvar-nome" class="btn btn-success bg-primary" >
							</div>
						</form>
					</div>																
		</td>
    </tr>
</table>


<script type="text/javascript" src="{$pagina->base}js/formulario/clientes.js"> </script>
{include file="rodape.tpl"}