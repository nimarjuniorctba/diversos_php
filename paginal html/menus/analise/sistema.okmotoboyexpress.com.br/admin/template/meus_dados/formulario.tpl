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
				<form name="form" method="POST" class="formulario">
					<br>
					<br>
					<br>
					<div id="dados">
						<input type="hidden" id="tipo_cadastro" value="j">
						<div>
							<label>CNPJ:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>								
						<div>
							<label>Nome Fantasia:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>				
						<div>
							<label>Razao social:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>	
						<div>
							<label>Site:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
						<div>
							<label>Nome completo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
						<div>
							<label>Responsável:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>		

						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
					</div>					
					<div id="endereco" >					
						<div>
							<label>CEP:</label>
							<div style="display:flex;">
								<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}" style="width:200px;">
								<input type="button" value="Buscar" id="salvar-nome" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">
							</div>
						</div>								
						<div>
							<label>Nome Fantasia:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>				
						<div>
							<label>Razao social:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>	
						<div>
							<label>Site:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
						<div>
							<label>Nome completo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
						<div>
							<label>Responsável:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>		

						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="{$nom_titulo_eleitor|default:''}">
						</div>							
					</div>	
					<div style="margin-top:30px;">
						<input type="button" value="Alterar" id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
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


{include file="rodape.tpl"}