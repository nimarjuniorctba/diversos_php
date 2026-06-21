{include file="topo.tpl"}
<section class="centralizar">
    <section class="corpo">
	    <section class="conteudo">
       		{include file="titulos-e-abas.tpl"}	          
			<div>
	            <div id="mensagem">{$msg}</div> 
				<form name="form_cadastro" id="form_cadastro" method="post" class="formulario">	 
                	<label for="label" id="label_nome">Opera&ccedil;&atilde;o<span>*</span></label>       
                    <input type="radio" name="tipo_atualizacao" value="adicionar" checked="checked"/><small style="width: 80px;">Adicionar</small>
                    <input type="radio" name="tipo_atualizacao" value="remover" checked="checked"/><small>Remover</small>
                    
                    <label for="label" id="label_nome">Valor<span>*</span></label>       
                    <input type="text" name="qua_nome" id="qua_nome" value="{$qua_nome}" maxlength="250" style="float: left; width: 250px;"/>
                    <div class="clear-both"></div>
                    
                    <label for="label" id="label_nome">Motivo<span>*</span></label>
                    <input type="text" name="qua_nome" id="qua_nome" value="{$qua_nome}" maxlength="250" style="float: left;"/>
                    <div class="clear-both"></div>
                    
                    <div class="clear-both"></div>
                    
                    
                    

                    
                    <input type="submit" name="submit" id="submit" value="{if $id_registro != ''}Alterar{else}Gravar{/if}" style="margin-top: 25px;"/>
                    
                    <a href="caixa-lanchonete/"> <input type="button" name="Pagar Parcial" style="width: 150px; float: right; margin-top: 30px;" id="receber-parcial" class="button-blue" value="Voltar"></a>
                    
                </form> 
			</div>
        </section>
    </section>
</section>
{literal}
<script src="js/formularios/{/literal}{$acao}{literal}.js"></script>
{/literal}
{include file="rodape.tpl"}