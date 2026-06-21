{include file="topo.tpl"}

<br>
<div style="margin-left:32px;"><h6>{$pagina->titulo}</h6></div>
<br>

{include file="abas.tpl"}

<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>
				<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>
				<!--<div class="alert alert-danger" role="alert">Não foi possivel cadastrar, verifique os dados</div>-->
				{$mensagem|default:''}
			</div>
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados</th>
							</tr>
						  </thead>
						  <tbody>
							{if $pagina->acao=='alterar'}
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control" disabled value="001" >
								  </td>
								</tr>
							{/if}						
							<tr>
							  <td>Nome<span class="obrigatorio">*<span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"{if $pagina->acao=='alterar'} value="nome teste" {/if}>
							  </td>
							</tr>
							<tr>
							  <td>E-mail<span class="obrigatorio">*<span></td>
							  <td>
							  
									<input type="text" class="form-control" id="cli_email" name="cli_email"{if $pagina->acao=='alterar'} value="email@teste.com.br" {/if}>						  
							  
							  </td>
							</tr>
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="{$pagina->acao}" class="btn btn-success">{if $pagina->acao=='cadastrar'}Cadastrar{else}Alterar{/if}</button></span>
								</td>
							</tr>

						  </tbody>
						</table>
					</form>
					</div>	
	</td>
    </tr>
</table>


{include file="rodape.tpl"}