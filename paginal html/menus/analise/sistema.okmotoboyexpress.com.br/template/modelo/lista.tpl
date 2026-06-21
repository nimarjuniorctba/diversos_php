{include file="topo.tpl"}

<br>
<div style="margin-left:32px;"><h6>{$pagina->titulo}</h6></div>
<br>

{include file="abas.tpl"}

<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>			
				<br>
					<div class="table-responsive-sm">
					<table class="table table-bordered" style="width: 75%;margin-left:5%">
					  <thead>
						<tr class="table-active">
						  <th scope="col">Codigo</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Email</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
					 
						<tr>
						  <th scope="row">001</th>
						  <td>nome</td>
						  <td>email</td>
						  <td>
                              <button  class="btn btn-info btn-editar" ><i class="medium material-icons" style="font-size: 16px;">create</i></button>
                              <a rel="modal:open" href="#locacao-nova"><button  class="btn btn-danger btn-excluir" ><i class="medium material-icons" style="font-size: 16px;">delete</i></button></a>
							  </td>
						</tr>
						
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>

<div style="margin-right:5px;"><a rel="modal:open" href="#locacao-nova"><button  class="btn btn-success btn-novo-locacao"><i class="large material-icons">shopping_cart</i>Nova locação</button></a></div>

<div id="locacao-nova" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;">

teste
	
</div>

{include file="rodape.tpl"}