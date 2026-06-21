<?php
/* Smarty version 4.1.0, created on 2026-03-25 08:58:57
  from 'C:\xampp\htdocs\boxlav\sistema.boxlav.com.br\template\formulario_pagamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69c3ce01469971_15599062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b34518418c6098c1d75c476fd46023866310806a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\boxlav\\sistema.boxlav.com.br\\template\\formulario_pagamento.tpl',
      1 => 1765395938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69c3ce01469971_15599062 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <div id="mensagem-forma-pgto"></div>
	
	<div style="display:flex;">
		<label style="width: 180px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="f" style="margin-right: 6px;" checked>Cartão de Credito</label>
		<label style="width: 140px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="j" style="margin-right: 6px;" >Boleto</label>
		<label style="width: 140px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="j" style="margin-right: 6px;" >PIX</label>
	</div>
	
    <div id="cartao-credito">
		<div>
			<div class="clear-both"></div>	
			

			
			<div class="cadastrar-cartao" id="elementos-cartao" style="float: left; width: 100%;">
				<div style="width:310px; display:inline-block; float:left; margin-bottom:1%;" class="pay-card">
					<label for="label">N&uacute;mero do Cart&atilde;o<span>*</span></label>
					<input type="text" autocomplete="off" name="nro_cartao" id="nro_cartao" maxlength="19" class="form-control" onKeyPress="return soNumber(event);" value="" style="height: 37px!important; margin:1px 0 4px 0; float:left; clear:both; width:300px!important;"/> 
					<input type="hidden" name="valida_cartao" id="valida_cartao" value="0"/> 
					
					<div class="clear-both"></div>
					<span id="info-cartao" style="max-width:279px; line-height:25px; padding:9px; display: none;"></span>
					<label for="label">Nome do Portador<span>*</span></label>
					<input type="text" autocomplete="off" name="nome_portador" id="nome_portador" maxlength="250" onKeyPress="return soLetter(event);"  class="form-control" style="float:left; clear:both; width:300px;" />
					<div class="clear-both"></div>
					<div style="width:auto; display:inline-block; margin-right:13px;">
						<label for="label">Validade (mm/aa)<span>*</span></label> 
						<div class="clear-both"></div>
						<input type="text" autocomplete="off" name="validade_cartao" id="validade_cartao" value="" style="float: left; clear: both; width:140px" class="form-control"  maxlength="5" onkeypress="return soNumber(event);"/>
					</div>
					<div style="display: inline-block; width: auto;">
						<label for="label" style="width: auto;">CVC<span>*</span></label>
						<input type="text" autocomplete="off" name="cod_cartao" id="cod_cartao" value="" style="float: left; clear: both; width:140px" maxlength="4"  class="form-control" onkeypress="return soNumber(event);"/>
					</div>
					<div>
						<label>CPF do Titular do Cart&atilde;o:<span>*</span></label>
						<input type="text" autocomplete="off" name="documentoCPF" id="documentoCPF"  class="form-control" maxlength="14"  style="float: left; clear: both; width: 300px;">
					</div>
					<div class="clear-both"></div>

						<small style="width: 100%; height: auto!important; display: inline-block; margin: 10px 0 0 0; padding: 0; font-weight: bold; color: #444;opacity:0.5" id="salvar-cartao" >
							<input id="ped_inf_gravar_cartao" name="ped_inf_gravar_cartao" type="checkbox" checked value="s" style="margin-top: 6px; margin-right: 5px;" > Desejo salvar este cart&atilde;o para utilizar em futuras contrata&ccedil;&otilde;es.
						</small>

					
					<!-- <input type="hidden" name="hash_cartao" id="hash_cartao" value="" />  -->
					<input type="hidden" name="permitir_submit" id="permitir_submit" value="n" /> 
					<input type="hidden" name="bandeira_cartao" id="bandeira_cartao" value="" /> 
					<div class="clear-both"></div>
										
				</div>
				<div class="card-wrapper" style="padding-top: 30px;"></div>
			</div>
			
		</div>
		<div class="notificacao-alerta atencao" style="">
			<span style="padding-top: 3px;">texto_cartao</span>
		</div>
    </div>
    <div id="boleto" style="">
        <div class="clear-both"></div>
		<div class="notificacao-alerta atencao">
			<span style="padding-top: 3px;">texto_boleto}</span>
		</div>
    </div>
	<div id="pix" style="display:none;">
        <div class="clear-both"></div>
        <div class="notificacao-alerta atencao">
			<span style="padding-top: 3px;">texto_cartao}</span>
		</div>
    </div>
</div>


<!-- <?php echo '<script'; ?>
 src="https://assets.pagar.me/pagarme-js/3.0/pagarme.min.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 type="text/javascript" src="{$pagina->base}js/jquery.mask.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="{$pagina->base}js/jquery.cardcheck.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="{$pagina->base}js/card-master/card.js"><?php echo '</script'; ?>
>

<style>
	#elementos-cartao{ display: flex; } 
	
	@media only screen and (max-width: 780px){
		#cartao-credito div#elementos-cartao{ display: inline-block; } 
	}
</style>
<?php }
}
