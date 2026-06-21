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
								<input type="hidden" id="pro_idurl" name="pro_idurl" value="{$pro_idurl}">
						{/if}			
						
							<br>
							<br>
							<div>
								<br>
								<h5>PRODUTO</h5>		
								<hr>	
								<div {if $pagina->acao=='cadastrar'} style="display:none;"{/if}>
									<label>Status</label>
									<select type="text" class="form-control" id="pro_status" name="pro_status" >
										<option value="a" {if $pro_status=='a'}selected{/if}>Ativo</option>
										<option value="i" {if $pro_status!='a'}selected{/if}>Inativo</option>
									</select>									
								</div>									
								<div>
									<label>Categoria*</label>
									<select type="text" class="form-control" id="pro_categoria" name="pro_categoria" >
									<option value="" {if $pagina->acao=='cadastrar'}selected{/if} >Escolha uma categoria</option>
									{foreach $array_categoria item=$categorias}	
										<option value={$categorias.idurl} {if $pagina->acao!='cadastrar' AND $categorias.id==$pro_categoria}selected{/if} >{$categorias.categoria}</option>
									{/foreach}
									</select>									
								</div>		
								<div>
									<label>Fornecedor*</label>
									<select type="text" class="form-control" id="pro_fornecedor" name="pro_fornecedor" >
									<option value="" {if $pagina->acao=='cadastrar'}selected{/if} >Escolha uma categoria</option>
									{foreach $array_fornecedor item=$fornecedor}	
										<option value={$fornecedor.idurl} {if $pagina->acao!='cadastrar' AND $fornecedor.id==$pro_fornecedor}selected{/if} >{$fornecedor.fornecedor}</option>
									{/foreach}
										<option value="0" >Deixar em branco</option>									
									</select>									
								</div>														
								<div>
									<label>Título*</label>
									<input type="text" class="form-control" id="pro_titulo" name="pro_titulo"  value="{$pro_titulo|default:''}">
								</div>									
								<div>
									<label>Descrição (Opcional)</label>
									<input type="text" class="form-control" id="pro_descricao" name="pro_descricao"  value="{$pro_descricao|default:''}">
								</div>								
								<div>
									<label>Código de Barras - GTIN/EAN</label>
									<input type="text" class="form-control" id="pro_codigobaras" name="pro_codigobaras"  value="{$pro_codigobaras|default:''}">
								</div>													
								<div style="display:flex;">
									<div style="width: 230px;">
										<label>Valor de Custo (R$)*</label>
										<input type="text" class="form-control" id="pro_valor_custo" name="pro_valor_custo"  value="{$pro_valor_custo|default:''}">
									</div>										
									<div style="width: 230px;margin-left: 20px;">
										<label>Valor de Venda (R$)*</label>
										<input type="text" class="form-control" id="pro_valor_venda" name="pro_valor_venda"  value="{$pro_valor_venda|default:''}" >
									</div>																		
								</div>									
								<div style="display:none;">
									<div style="width: 230px;">
										<label>Lucro por unidade (R$)</label>
										<input type="text" class="form-control" id="pro_lucro" name="pro_lucro"  value="{$pro_lucro|default:''}">
									</div>																											
								</div>	
								<br>
								<div>
									<h5 style="font-size: 18px;">Este produto possui estoque?*</h5>
									<div style="clear:both"></div>							
									<div style="display:flex;">
										<label style="width: 140px;"><input type="radio" class="pro_estoque" name="pro_estoque"  value="f" style="margin-right: 2px;" checked>Sim</label>
										<label><input type="radio" class="pro_estoque" name="pro_estoque"  value="j" style="margin-right: 2px;">Não</label>
									</div>
								</div>								
								<br>
								<h5>ESTOQUE</h5>		
								<hr>								
								<div  style="width: 230px;">
									<label>Quantidade*</label>
									<input type="text" class="form-control" id="pro_quantidade" name="pro_quantidade"  value="{$pro_quantidade|default:''}">
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