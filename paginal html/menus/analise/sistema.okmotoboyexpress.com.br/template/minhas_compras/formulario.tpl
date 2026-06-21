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
								<h4>Dados do pedido</h4>
								<div style="clear:both"></div>		
							<div>								
								<table class="border">
									<tr>
										<td>Pedido</td>
										<td>0000005059</td>
									</tr>									
									<tr>
										<td>Serviço</td>
										<td>Sistema + Reserva Online + Website</td>
									</tr>									
									<tr>
										<td>Plano</td>
										<td>Anual</td>
									</tr>									
									<tr>
										<td>Forma de Pagamento</td>
										<td>Cartão</td>
									</tr>									
									<tr>
										<td>Valor do Plano</td>
										<td>R$2.158,92</td>
									</tr>									
									<tr>
										<td>Data de Contratação</td>
										<td>31/01/2022</td>
									</tr>									
									<tr>
										<td>Data de expiração da licença</td>
										<td>31/01/2022</td>
									</tr>									
									<tr>
										<td>Data de expiração do site</td>
										<td>31/01/2022</td>
									</tr>										
									<tr>
										<td>Status do Pagamento</td>
										<td>Pago</td>
									</tr>									
									<tr>
										<td>Status do Pedido</td>
										<td>Finalizado</td>
									</tr>									
									<tr>
										<td>Quantidade de SMS</td>
										<td>540</td>
									</tr>									
									<tr>
										<td>Total</td>
										<td>R$ 2.158,92</td>
									</tr>									
									<tr>
										<td>Parcelamento</td>
										<td>12x sem juros</td>
									</tr>									
									<tr>
										<td>Usuário</td>
										<td>Tatiane</td>
									</tr>																	
								</table>							
							</div>
							
						</form>
					</div>																
		</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="{$car_id|default:''}">
<script type="text/javascript" src="{$pagina->base}js/formulario/clientes.js"> </script>
{include file="rodape.tpl"}