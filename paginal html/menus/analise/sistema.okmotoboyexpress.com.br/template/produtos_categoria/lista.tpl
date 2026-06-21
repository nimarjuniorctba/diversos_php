{include file="topo.tpl"}

<br>
<br>
<br>

{include file="abas.tpl"}

<table class="table border principal" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>
<div style="display:none;">
filtros
</div>

				<br>
<br>
<br>				
					<div class="table-responsive-sm">
					<table class="table table-bordered table-striped table-hover " style="cursor: pointer;">
					  <thead>
						<tr class="table-active ">
						  <th scope="col">Categoria</th>
						  <th scope="col">Descrição</th>
						  <th scope="col">Data de cadastro</th>
						  <th scope="col">Status</th>
						  <th scope="col" colspan="2">Opções</th>
						</tr>
					  </thead>
					  <tbody>
						{if $qte_registros>0}					  
							{foreach $array_produtos_categorias item=$produtos_categorias}						 
								<tr>
								  <td>{$produtos_categorias.nome}</td>
								  <td>{$produtos_categorias.descricao}</td>
								  <td>{$produtos_categorias.dt_cadastro}</td>
								  <td>{$produtos_categorias.status}</td>
								  <td>
									  <a href="{$pagina->base}produtos-categorias/alterar/{$produtos_categorias.idurl}"><img src="{$pagina->base}imagens/icones/editar.png" style="width:20px;height:20px;margin-right:5px;cursor: pointer;"></a>
									  <img src="{$pagina->base}imagens/icones/lixo.png" style="width:20px;height:20px;margin-right:10px;cursor: pointer;" class="btn-excluir" data-id="{$produtos_categorias.idurl}">
								  </td>
								</tr>
							{/foreach}
						{else}	
						
								<tr>
								  <td scope="col" colspan="8" style="text-align: center;">Sem registros</td>
								</tr>						
						
						{/if}					
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>


<div id="dialog-excluir" title="Confirmar exclusão" style="display: none;">

	{include file="popups/excluir_registro.tpl"}
  
</div>



<script type="text/javascript" src="{$pagina->base}js/formulario/produtos_categorias.js"> </script>
{include file="rodape.tpl"}