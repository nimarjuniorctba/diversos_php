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
								<input type="hidden" id="for_idurl" name="for_idurl" value="{$for_idurl}">
						{/if}			
						
							<br>
							<br>
							<div>
								<div>
									<label>Categoria*</label>
									<select type="text" class="form-control" id="for_cat_id" name="for_cat_id" >
									<option value="" {if $pagina->acao=='cadastrar'}selected{/if} >Escolha uma categoria</option>
									{foreach $array_produtos_categorias item=$categorias}	
										<option value={$categorias.idurl} {if $pagina->acao!='cadastrar' AND $categorias.id==$produto_categoria.categoria}selected{/if} >{$categorias.nome}</option>
									{/foreach}
									</select>									
								</div>								
								<div>
									<label>Nome*</label>
									<input type="text" class="form-control" id="for_nome" name="for_nome"  value="{$for_nome|default:''}">
								</div>													
								<div>
									<label>CNPJ(Opcional)</label>
									<input type="text" class="form-control" id="for_cnpj" name="for_cnpj"  value="{$for_cnpj|default:''}">
								</div>								
								<div>
									<label>Email(Opcional)</label>
									<input type="text" class="form-control" id="for_email" name="for_email"  value="{$for_email|default:''}">
								</div>													
								<div>
									<label>Telefone(Opcional)</label>
									<input type="text" class="form-control" id="for_telefone" name="for_telefone"  value="{$for_telefone|default:''}">
								</div>	
								<div>
									<label>Celular(Opcional)</label>
									<input type="text" class="form-control" id="for_celular" name="for_celular"  value="{$for_celular|default:''}">
								</div>													
								<div>
									<label>Descrição(Opcional)</label>
									<input type="text" class="form-control" id="for_descricao" name="for_descricao"  value="{$for_descricao|default:''}">
								</div>
								<div {if $pagina->acao == 'cadastrar'}style="display:none;"{/if}>
									<label>Status</label>
									<select name="for_status" id="for_status" class="form-control">
										<option value="a" {if $for_status=='a'}selected{/if}>Ativo</option>
										<option value="i" {if $for_status=='i'}selected{/if}>Inativo</option>
									</select>								
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


<script type="text/javascript" src="{$pagina->base}js/formulario/ghj.js"> </script>
{include file="rodape.tpl"}