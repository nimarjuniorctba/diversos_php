{include file="topo.tpl"}
<section class="centralizar">
    <section class="corpo">
	    <section class="conteudo">
       		{include file="titulos-e-abas.tpl"}	          
			<div>
	            <div id="mensagem">{$msg}</div> 
                
				<form name="form_cadastro" id="form_cadastro" method="post" class="formulario">	 
					<h2 style="font-size: 26px;">Situa&ccedil;&atilde;o do dia atual (18/01/2017)</h2>
                    <label for="label" id="label_nome" >Saldo:</label>       
                    <input type="text" name="qua_nome" id="qua_nome" value="R$ 2905,10" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
                    
                    
                    <label for="label" id="label_descricao" >Total de Entrada:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="R$ 602,90" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
                    <label for="label" id="label_descricao" >Total de Sa&iacute;da:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="R$ 602,90" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
                    <label for="label" id="label_descricao" >Total pendente a receber:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="R$ 602,90" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
                    
                    <h2 style="font-size: 20px;">Atividade Recente</h2>
                    <label for="label" id="label_descricao" >&Uacute;ltima opera&ccedil;&atilde;o:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="Pagamento sobre pedido" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
                    
                    <label for="label" id="label_descricao" >Dia:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="14/11/2017 &agrave;s 12:44" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
                    <label for="label" id="label_descricao" >Valor:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="R$ 15,30" maxlength="250" style="float: left; clear: both; width:200px;" disabled="disabled" class="desativado"/>
               		
                    <label for="label" id="label_descricao" >Usu&aacute;rio:</label>       
                    <input type="text" name="qua_descricao" id="qua_descricao" value="Thiago Andrade" maxlength="250" style="float: left; clear: both; width:90%;" disabled="disabled" class="desativado"/>
                    
                
                	<div class="clear-both"></div>
                    {if $status_caixa == 'Aberto'}
                    	<input type="submit" id="submit" value="Encerrar opera&ccedil;&otilde;es do dia" style="width: 250px; margin-top: 30px;" class="button-orange"/>
                    {else}
                    	<input type="submit" id="submit" value="Iniciar opera&ccedil;&otilde;es do dia" style="width: 250px; margin-top: 30px;" class="button-green"/>
                    {/if}
                    
                    <a href="caixa-lanchonete/situacao-geral/"> <input type="button" name="Pagar Parcial" style="width: 150px;margin-top: 30px; float: right;" id="receber-parcial" class="button-blue" value="Situa&ccedil;&atilde;o Geral" ></a>
                    <a href="caixa-lanchonete/historico/"> <input type="button" name="Pagar Parcial" style="width: 150px; margin-top: 30px; float: right;" id="receber-parcial" class="button-blue" value="Hist&oacute;rico"></a>
                    <a href="caixa-lanchonete/atualizar-saldo/"> <input type="button" name="Pagar Parcial" style="width: 150px; margin-top: 30px;float: right;" id="receber-parcial" class="button-blue" value="Atualizar Saldo"></a>
                     
                </form> 
			</div>
        </section>
    </section>
</section>
{literal}
<script src="js/formularios/{/literal}{$acao}{literal}.js"></script>
{/literal}
{include file="rodape.tpl"}