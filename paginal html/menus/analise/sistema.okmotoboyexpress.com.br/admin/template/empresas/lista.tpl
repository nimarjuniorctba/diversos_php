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
					<table class="table table-bordered table-striped table-hover " style="width: 98%;margin-left:1%;cursor: pointer;">
					  <thead>
						<tr class="table-active ">
						  <th scope="col">ID</th>
						  <th scope="col">Tipo</th>
						  <th scope="col">Documento</th>
						  <th scope="col">Nome/Fantasia</th>
						  <th scope="col">Razao Social</th>
						  <th scope="col">Data cadastro</th>
						  <th scope="col">Status</th>
						  <th scope="col" colspan="2">Opções</th>
						</tr>
					  </thead>
					  <tbody>
						{if $qte_registros>0}					  
							{foreach $array_empresa item=$empresa}						 
								<tr>
								  <th scope="row">{$empresa.id}</th>
								  <td>{$empresa.tipo_cadastro}</td>
								  <td>{$empresa.documeto}</td>
								  <td>{$empresa.nome}</td>
								  <td>{$empresa.razao}</td>
								  <td>{$empresa.data_cadastro}</td>
								  <td>{$empresa.status}</td>
								  <td>
									  <a href="{$pagina->base}empresas/alterar/{$empresa.idurl}"><button  class="btn btn-info btn-editar" style="margin-right: 4px;"><i class="medium material-icons" style="font-size: 16px;">create</i></button></a>
									  <button  class="btn btn-danger btn-excluir" data-id="{$empresa.idurl}"><i class="medium material-icons" style="font-size: 16px;">close</i></button>
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



<script type="text/javascript" src="{$pagina->base}js/formulario/empresas.js"> </script>
{include file="rodape.tpl"}