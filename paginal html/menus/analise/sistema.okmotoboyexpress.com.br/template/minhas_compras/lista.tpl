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
						  <th scope="col">Pedido</th>
						  <th scope="col">Data</th>
						  <th scope="col">Serviço</th>
						  <th scope="col">Valor</th>
						  <th scope="col">Forma Pgto.</th>
						  <th scope="col">Status</th>
						  <th scope="col" colspan="2">Opções</th>
						</tr>
					  </thead>
					  <tbody>
						{if $qte_registros>0}					  
							{foreach $array_clientes item=$clientes}						 
								<tr>
								  <td>{$clientes.pedido}</td>
								  <td>{$clientes.data}</td>
								  <td>{$clientes.servico}</td>
								  <td>{$clientes.valor}</td>
								  <td>{$clientes.forma_pgto}</td>
								  <td>{$clientes.status}</td>
								  <td>
									  <a href="{$pagina->base}minhas-compras/visualizar/{$clientes.idurl}"><img src="{$pagina->base}imagens/icones/lupa.png"></a>
									  <a href="{$pagina->base}clientes/alterar/{$clientes.idurl}"><img src="{$pagina->base}imagens/icones/nota-6.png" title="Aguardando Emissão" style="height: 34px;"></a>
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



<script type="text/javascript" src="{$pagina->base}js/formulario/clientes.js"> </script>
{include file="rodape.tpl"}