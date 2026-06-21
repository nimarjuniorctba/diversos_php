{include file="topo.tpl"}
<section class="centralizar">
    <section class="corpo">
        <section class="conteudo">
            {include file="titulos-e-abas.tpl"}	
            <div id="mensagem">{$msg}</div> 
              <!--{if $qtde_registros > 0}    
              <form name="for_filtro" id="for_filtro" class="formulario filtro-footable-form">
                  <a href="caixa-lanchonete/"> <input type="button" name="Pagar Parcial" style="width: 150px;float: right" id="receber-parcial" class="button-blue" value="Voltar"></a>
               </form>                         		
              {include file="filtro.tpl"}
              {/if} -->
              <form name="for_filtro" id="for_filtro" class="formulario filtro-footable-form">
                  <a href="caixa-lanchonete/"> <input type="button" name="Pagar Parcial" style="width: 150px;float: right" id="receber-parcial" class="button-blue" value="Voltar"></a>
               </form>  
               {include file="filtro.tpl"}
             
                <table cellspacing="0"  style="padding: 10px;" class="table">
                		<!--{if $qtde_registros > 0}
					    <thead>
							<tr>
								<th width="30%" align="left">Nome</th>
                                <th width="30%" align="left">Piso</th>
								<th width="20%" align="left">Esporte</th>
								<th width="20%" align="center" data-sortable="false">Op&ccedil;&otilde;es</th>
							</tr>
						</thead>
                        {/if} -->
                        <thead>
							<tr>
                           		<th width="30%" align="left" data-hide="phone">Data</th>
								<th width="30%" align="left" data-toggle="true">Operador</th>
								<th width="20%" align="left">A&ccedil;&atilde;o</th>
								<th width="20%" align="center">Valor</th>
							</tr>
						</thead>
						<tbody>
                        	<tr> 
                                <td align="left">23/04/2017 20:56</td>
                                <td align="left">Juliana Pereira</td>
                                <td align="left">Atualiza&ccedil;&atilde; de Saldo</td>
                                <td align="center">R$ 500,00</td>
                            </tr>
                            <tr> 
                                <td align="left">10/09/2017 12:37</td>
                                <td align="left">Renato Faria</td>
                                <td align="left">Recebimento de Pedido</td>
                                <td align="center">R$ 59,30</td>
                            </tr>
                        	<!--{section name=i loop=$array_id_quadra}
							<tr> 
                                <td align="left">{$array_nome_quadra[i]}</td>
                                <td align="left">{$array_piso_quadra[i]}</td>
                                <td align="left">{$array_esporte_quadra[i]}</td>
                                <td align="center">
                                  
	                              {if $array_status_quadra[i] == 'a'}
                                    <a href="{$acao}/desativar/{$array_idurl_quadra[i]}/" title="Desativar"><img src="images/icons/ativo.png" alt="Desativar" title="Desativar" /></a>
                                  {else}
                                    <a href="{$acao}/ativar/{$array_idurl_quadra[i]}/" title="Ativar"><img src="images/icons/inativo.png" alt="Ativar" title="Ativar" /></a> 
                                  {/if}                                   
                                  <a href="{$acao}/alterar/{$array_idurl_quadra[i]}/" title="Alterar / Visualizar"><img src="images/icons/editar.png" alt="Alterar" title="Alterar / Visualizar" /></a>
                                  <a href="javascript:void(0)" title="Deletar" onclick="confirmacaoDelete('{$acao}','deletar','{$array_idurl_quadra[i]}');"><img src="images/icons/lixeira.png" alt="deletar" title="Deletar" /></a>
                                </td>
                            </tr>
                            {sectionelse}
							<tr><td colspan="5"><div class="notificacao-alerta -alerta informacao sem-margem"><span>Ainda n&atilde;o existem dados cadastrados!</span><br /><a href="{$acao}/cadastrar/" title="Cadastre" class="link">Cadastre</a> agora mesmo o primeiro.</div></td></tr>
                            {/section} -->
                         </tbody>
					</table>
                    
             
                   
        </section>
    </section>
</section>
{include file="rodape.tpl"}