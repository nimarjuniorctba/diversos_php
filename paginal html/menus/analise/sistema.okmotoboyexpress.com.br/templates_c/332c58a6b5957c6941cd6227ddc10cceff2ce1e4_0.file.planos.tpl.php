<?php
/* Smarty version 4.1.0, created on 2023-07-11 16:06:04
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\planos\planos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64ada81c38b045_14500551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '332c58a6b5957c6941cd6227ddc10cceff2ce1e4' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\planos\\planos.tpl',
      1 => 1689102362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:abas.tpl' => 1,
    'file:formulario_pagamento.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_64ada81c38b045_14500551 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<br>
<br>
<br>

<?php $_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table border principal" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>
				<?php echo (($tmp = $_smarty_tpl->tpl_vars['mensagem']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

			</div>
					<div class="table-responsive-sm">
						<form name="form" method="POST"  class="formulario">
		
						
							<br>
							<br>
							<div>
								<h4>Selecione os produtos</h4>

								<div style="clear:both"></div>							
								<div style="display:flex;">
									<label style="width: 140px;" class="cor-produto-sistema-1" ><input type="radio" name="pla_tipo"  value="s" style="margin-right: 6px;" checked>Sistema</label>
									<label style="width: 140px;" class="cor-produto-website-1" ><input type="radio"  name="pla_tipo"  value="w" style="margin-right: 6px;" >Website</label>
									<label style="width: 140px;" class="cor-produto-aplicativo-1" ><input type="radio" name="pla_tipo"  value="a" style="margin-right: 6px;" >Aplicativo</label>
									<label style="width: 140px;" class="cor-produto-ecommerce-1" ><input type="radio" name="pla_tipo"  value="e" style="margin-right: 6px;" >E-commerce</label>
									<label style="width: 140px;" class="cor-produto-combos-1"><input type="radio" name="pla_tipo"  value="c" style="margin-right: 6px;" >Combos</label>
								</div>								
								<br>
								<br>
									<div>
										<h4>Selecione o plano</h4>	

							<div class="clear-both"></div>
							<ul class="planos bloco_ped_sistema">
								<li class="primeiro">
									<span class="linha-1" style="color: #666; background:#FFF;"></span>
									<span class="linha-2" style="color: #666; background:#FFF;">
										SISTEMA
										<small style="height: auto!important;margin: 0;color: #f00;font-size: 10px;" class="resumo-sistema-setup">Taxa de Setup: <div class="resumo-sistema-valor-setup" style="text-align: left; width: 72px;display: inline-block;">R$0,00</div></small>
									</span>                    
									
									<span>Desconto</span> 
									<span style="background: #d0d0d0;">N&uacute;mero de Quadras</span>
									<span>Agendamentos</span>
									<span style="background: #d0d0d0;">Controle de Escolinha</span>
									<span>M&oacute;dulo de Lanchonete</span>
									<span style="background: #d0d0d0;">Controle de S&oacute;cios</span>
									<span>Envio de SMS Gr&aacute;tis</span>
								</li>
								<li class="mensal">
									<span class="linha-1" style="background: #52b5d5;"><input type="radio" name="ped_periodo_sistema" value="1"><br><small>Mensal</small></span>
									<span class="linha-2" style="background: #64c3de;"><p class="cima" id="vlr-mensal-old">-</p><p id="vlr-mensal" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">-</span>
									<span>5</span>
									<span style="background: #fff;">Ilimitados</span>
									<span>Sim</span>
									<span style="background: #fff;">Sim</span>
									<span>Sim</span>
									<span style="background: #fff;">15</span>
								</li>
								<li class="trimestral">
									<span class="linha-1" style="background: #3591ca;"><input type="radio" name="ped_periodo_sistema" value="2"><br><small>Trimestral</small></span>
									<span class="linha-2" style="background: #44a2d4;"><p id="vlr-trimestral-old" class="cima">R$ 0,00</p><p id="vlr-trimestral" class="baixo">R$ 0,00</p></span>
									<span>5%</span>
									<span style="background: #d0d0d0;">5</span>
									<span>Ilimitados</span>
									<span style="background: #d0d0d0;">Sim</span>
									<span>Sim</span>
									<span style="background: #d0d0d0;">Sim</span>
									<span>25 (x3)</span>
								</li>
								<li class="semestral">
									<span class="linha-1" style="background: #1f5f9f;"><input type="radio" name="ped_periodo_sistema" value="3"><br><small>Semestral</small></span>
									<span class="linha-2" style="background: #2972b0;"><p id="vlr-semestral-old" class="cima">R$ 0,00</p><p id="vlr-semestral" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">7%</span>
									<span>5</span>
									<span style="background: #fff;">Ilimitados</span>
									<span>Sim</span>
									<span style="background: #fff;">Sim</span>
									<span>Sim</span>
									<span style="background: #fff;">35 (x6)</span>
								</li>
								<li class="anual">
									<span class="linha-1" style="background: #1a3e7b url('<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/etiqueta-planos.png')no-repeat top right;"><input type="radio" checked name="ped_periodo_sistema" value="4"><br><small>Anual</small></span>
									<span class="linha-2" style="background: #234e8e;"><p id="vlr-anual-old" class="cima">R$ 0,00</p><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span>10%</span>
									<span style="background: #d0d0d0;">5</span>
									<span>Ilimitados</span>
									<span style="background: #d0d0d0;">Sim</span>
									<span>Sim</span>
									<span style="background: #d0d0d0;">Sim</span>
									<span>45 (x12)</span>
								</li>
							</ul>

					<div class="bloco_ped bloco_ped_website" style="display: none;">
						<div style="display: inline-block; margin-top: 20px;">
							<div style="display: inline-block;margin-bottom: 20px;">
								<label style="width: 83px!important;font-weight: 700;"><input type="radio" name="ped_produto_website" value="w" checked>Website</label>
								<label style="width: 100px!important;font-weight: 700;"><input type="radio" name="ped_produto_website" value="e">E-commerce</label>
							</div>
							<div class="clear-both"></div>						
							<ul class="planos websites">
								<li class="primeiro">
									<span class="linha-2" style="color: #666;height:220px;background:#FFF;padding-top: 76px;">
										WEBSITE
										<small style="height: auto!important; margin: 0;color: #249410;font-size: 12px; font-size: 11px; padding-bottom: 0px;">Hospedagem Gr&aacute;tis</small>
										<small style="height: auto!important; margin: 0;color: #249410;font-size: 12px; font-size: 11px; padding-bottom: 0px;">Certificado SSL (https) Gr&aacute;tis</small>
										<small style="height: auto!important; margin: 0;color: #249410;font-size: 12px; font-size: 11px;">Contas de E-mails Gr&aacute;tis</small>
										
										<small style="height: auto!important; margin: 0;color: #f00;font-size: 10px;" class="resumo-sistema-setup">Taxa de Setup: <div class="resumo-sistema-valor-setup" style="text-align: left; width: 72px;display: inline-block;">R$0,00</div></small>
									</span>
									
									<span>Desconto</span> 
									<span style="background: #d0d0d0;">Contas de E-mail</span>
								</li>
								<li class="mensal">
									<span class="linha-1" style="background-color: #6C757D;"><input type="radio" name="ped_periodo_website" value="1"><br><small>Mensal</small></span>
									<span class="linha-2" style="background-color: #7A838A;"><p class="cima" id="vlr-mensal-old">-</p><p id="vlr-mensal" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">-</span>
									<span>5 contas</span>
								</li>
								<li class="trimestral">
									<span class="linha-1" style="background-color: #596169;"><input type="radio" name="ped_periodo_website" value="2"><br><small>Trimestral</small></span>
									<span class="linha-2" style="background-color: #676F77;"><p id="vlr-trimestral-old" class="cima">R$ 0,00</p><p id="vlr-trimestral" class="baixo">R$ 0,00</p></span>
									<span>5%</span>
									<span style="background: #d0d0d0;">10 contas</span>
								</li>
								<li class="semestral">
									<span class="linha-1" style="background: #525961;"><input type="radio" name="ped_periodo_website" value="3"><br><small>Semestral</small></span>
									<span class="linha-2" style="background-color: #5F676F;"><p id="vlr-semestral-old" class="cima">R$ 0,00</p><p id="vlr-semestral" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">7%</span>
									<span>15 contas</span>
								</li>
								<li class="anual">
									<span class="linha-1" style="background: #464D54 url('<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/imagens/etiqueta-planos.png')no-repeat top right;"><input type="radio" checked name="ped_periodo_website" value="4"><br><small>Anual</small></span>
									<span class="linha-2" style="background-color: #525B63;"><p id="vlr-anual-old" class="cima">R$ 0,00</p><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span>10%</span>
									<span style="background: #d0d0d0;">20 contas</span>
								</li>
							</ul>
							<ul class="planos ecommerce" style="display:none;">
								<li class="primeiro">
									<span class="linha-2" style="color: #666;height:220px;background:#FFF;padding-top: 76px;">
										ECOMMERCE
										<small style="height: auto!important; margin: 0;color: #249410;font-size: 12px; font-size: 11px; padding-bottom: 0px;">Hospedagem Gr&aacute;tis</small>
										<small style="height: auto!important; margin: 0;color: #249410;font-size: 12px; font-size: 11px; padding-bottom: 0px;">Certificado SSL (https) Gr&aacute;tis</small>
										<small style="height: auto!important; margin: 0;color: #249410;font-size: 12px; font-size: 11px;">Contas de E-mails Gr&aacute;tis</small>
										
										<small style="height: auto!important; margin: 0;color: #f00;font-size: 10px;" class="resumo-sistema-setup">Taxa de Setup: <div class="resumo-sistema-valor-setup" style="text-align: left; width: 72px;display: inline-block;">R$0,00</div></small>
									</span>
									
									<span style="background: #d0d0d0;">Desconto</span> 
									<span>Desconto</span> 
									<span style="background: #d0d0d0;">Contas de E-mail</span>
								</li>
								<li class="mensal">
									<span class="linha-1" style="background-color: #6C757D;"><input type="radio" name="ped_periodo_website" value="1"><br><small>Mensal</small></span>
									<span class="linha-2" style="background-color: #7A838A;"><p class="cima" id="vlr-mensal-old">-</p><p id="vlr-mensal" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">-</span>
									<span>5 contas</span>
									<span style="background: #fff;">5 contas</span>
								</li>
								<li class="trimestral">
									<span class="linha-1" style="background-color: #596169;"><input type="radio" name="ped_periodo_website" value="2"><br><small>Trimestral</small></span>
									<span class="linha-2" style="background-color: #676F77;"><p id="vlr-trimestral-old" class="cima">R$ 0,00</p><p id="vlr-trimestral" class="baixo">R$ 0,00</p></span>
									<span>5%</span>
									<span style="background: #d0d0d0;">10 contas</span>
									<span>10 contas</span>
								</li>
								<li class="semestral">
									<span class="linha-1" style="background: #525961;"><input type="radio" name="ped_periodo_website" value="3"><br><small>Semestral</small></span>
									<span class="linha-2" style="background-color: #5F676F;"><p id="vlr-semestral-old" class="cima">R$ 0,00</p><p id="vlr-semestral" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">7%</span>
									<span>15 contas</span>
									<span style="background: #fff;">15 contas</span>
								</li>
								<li class="anual">
									<span class="linha-1" style="background: #464D54 url('<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/imagens/etiqueta-planos.png')no-repeat top right;"><input type="radio" checked name="ped_periodo_website" value="4"><br><small>Anual</small></span>
									<span class="linha-2" style="background-color: #525B63;"><p id="vlr-anual-old" class="cima">R$ 0,00</p><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span>10%</span>
									<span style="background: #d0d0d0;">20 contas</span>
									<span>20 contas</span>
								</li>
							</ul>							
						</div>
					</div>

					<div class="bloco_ped bloco_ped_aplicativo" style="display: none;">
						<div style="display: inline-block; margin-top: 20px;">
							<div style="display: inline-block;margin-bottom: 20px;">
								<small style="width: 160px!important;"><input type="radio" name="ped_produto_aplicativo" value="1" checked>Aplicativo Android</small>
								<small style="width: 148px!important;"><input type="radio" name="ped_produto_aplicativo" value="2">Aplicativo IOS</small>
								<small style="width: 200px!important;"><input type="radio" name="ped_produto_aplicativo" value="3">Aplicativo Android e IOS</small>
							</div>							
							<div class="clear-both"></div>
							<ul class="planos">
								<li class="primeiro">
									<span class="linha-2" style="color: #666;height: 144px;background:#FFF;padding-top: 76px;">
										APLICATIVO
										<small style="height: auto!important;margin: 0;color: #f00;font-size: 10px;" class="resumo-aplicativo-setup">Taxa de Setup: <div class="resumo-aplicativo-valor-setup" style="text-align: left; width: 72px;display: inline-block;">R$0,00</div></small>
									</span>
									<span>Desconto</span> 
									<span style="background: #d0d0d0;">Informa&ccedil;&otilde;es do Centro</span>
									<span>Personaliza&ccedil;&atilde;o</span>
								</li>
								<li class="mensal">
									<span class="linha-1" style="background-color: #3f7149;"><input type="radio" name="ped_periodo_aplicativo" value="1"><br><small>Mensal</small></span>
									<span class="linha-2" style="background-color: #477d52;"><p class="cima" id="vlr-mensal-old">-</p><p id="vlr-mensal" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">-</span>
									<span>Sim</span>
									<span style="background: #fff;">Sim</span>
								</li>
								<li class="trimestral">
									<span class="linha-1" style="background-color: #37633f;"><input type="radio" name="ped_periodo_aplicativo" value="2"><br><small>Trimestral</small></span>
									<span class="linha-2" style="background-color: #3d6d46;"><p id="vlr-trimestral-old" class="cima">R$ 0,00</p><p id="vlr-trimestral" class="baixo">R$ 0,00</p></span>
									<span>5%</span>
									<span style="background: #d0d0d0;">Sim</span>
									<span>Sim</span>
								</li>
								<li class="semestral">
									<span class="linha-1" style="background: #2c5434;"><input type="radio" name="ped_periodo_aplicativo" value="3"><br><small>Semestral</small></span>
									<span class="linha-2" style="background-color: #315a39;"><p id="vlr-semestral-old" class="cima">R$ 0,00</p><p id="vlr-semestral" class="baixo">R$ 0,00</p></span>
									<span style="background: #fff;">7%</span>
									<span>Sim</span>
									<span style="background: #fff;">Sim</span>
								</li>
								<li class="anual">
									<span class="linha-1" style="background: #294c30 url('images/etiqueta-planos.png')no-repeat top right;"><input type="radio" checked name="ped_periodo_aplicativo" value="4"><br><small>Anual</small></span>
									<span class="linha-2" style="background-color: #2d5234;"><p id="vlr-anual-old" class="cima">R$ 0,00</p><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span>10%</span>
									<span style="background: #d0d0d0;">Sim</span>
									<span>Sim</span>
								</li>
							</ul>
							
							<div style="clear: both;"></div>
							<a href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
aplicativo/" class="link" target="_blank" style="margin-bottom: 10px; font-size: 17px; width: 100%; display: inline-block;text-align: center;color: #294c30; font-weight: bold;">Clique Aqui para saber mais informa&ccedil;&otilde;es sobre o aplicativo!</a>
						</div>
					</div>					
					<div class="bloco_ped bloco_ped_ecommece" style="display: none;">
						<div style="display: inline-block; margin-top: 20px;">
							<ul class="planos">
								<li class="primeiro">
									<span class="linha-2" style="height: 137px; color: #666;background:#FFF;line-height: 79px;">

									</span>                        
									<span style="background: #d0d0d0;">Quadras Adicionais</span> 
								</li>
								<li class="mensal">
									<span class="linha-1" style="background: #4fa2b3;"><input type="radio" name="ped_periodo_quadras" value="1"><br><small>Mensal</small></span>
									<span class="linha-2 valor-quadras-mensal mensal" style="height: 57px;background: #5ab7ca;font-size: 28px;line-height: 52px;"><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span class="qtde-quadras-adicionais-plano">1</span>
								</li>
								<li class="trimestral">
									<span class="linha-1" style="background: #4292a2;"><input type="radio" name="ped_periodo_quadras" value="2"><br><small>Trimestral</small></span>
									<span class="linha-2 valor-quadras-trimestral trimestral" style="background: #4aa6b9;height: 57px;font-size: 28px;line-height: 52px;"><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span class="qtde-quadras-adicionais-plano" style="background: #d0d0d0;">1</span>
								</li>
								<li class="semestral">
									<span class="linha-1" style="background: #3d8594;"><input type="radio" name="ped_periodo_quadras" value="3"><br><small>Semestral</small></span>
									<span class="linha-2 valor-quadras-semestral semestral" style="background: #3793a7;height: 57px;font-size: 28px;line-height: 52px;"><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span class="qtde-quadras-adicionais-plano">1</span>
								</li>
								<li class="anual">
									<span class="linha-1" style="background: #1c6f80 url('images/etiqueta-planos.png')no-repeat top right;"><input type="radio" checked name="ped_periodo_quadras" value="4"><br><small>Anual</small></span>
									<span class="linha-2 valor-quadras-anual anual" style="height: 57px;background: #258294;font-size: 28px;line-height: 52px;"><p id="vlr-anual" class="baixo">R$ 0,00</p></span>
									<span class="qtde-quadras-adicionais-plano" style="background: #d0d0d0;">1</span>
								</li>
							</ul>
						</div>
					</div>
				<div class="bloco_ped bloco_ped_combos" style="display: none;">
						<div style="display: inline-block; margin-top: 20px; width: 100%;">
							<ul class="planos">
								<li style="width: 50%;">
									<span class="linha-2" style="color: #666;height: 168px;background:#FFF;padding-top: 23px;height: 57px;">COMBOS</span>
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="8" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;" checked>
										<small class="texto-combo">Sistema + Website</small>
									</span>
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="9" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo">Sistema + Aplicativo Android</small>
									</span>
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="10" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Sistema + Aplicativo IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="11" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Sistema + Aplicativo Android e IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="12" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo">Sistema + Reserva Online + Website</small>
									</span> 
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="13" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo">Sistema + Reserva Online + Aplicativo Android</small>
									</span> 
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="14" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Sistema + Reserva Online + Aplicativo IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="15" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Sistema + Reserva Online + Aplicativo Android e IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="16" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo">Sistema + Reserva Online + Website + Aplicativo Android</small>
									</span> 
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="17" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Sistema + Reserva Online + Website + Aplicativo IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="18" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Sistema + Reserva Online + Website + Aplicativo Android e IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="19" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo">Website + Aplicativo Android</small>
									</span> 
									<span style="text-align: left;">
										<input type="radio" name="ped_combo" value="20" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Website + Aplicativo IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
									<span style="background: #d0d0d0;text-align: left;">
										<input type="radio" name="ped_combo" value="21" style="float: left;left: initial;display: inline-block;top: initial;margin: 13px;">
										<small class="texto-combo-ios">Website + Aplicativo Android e IOS</small>
										<small class="texto-combo texto-combo-valor-anual" style="font-size: 10px!important;margin-top: 2px!important;color: #f00!important;">Taxa de publica&ccedil;&atilde;o na App Store $99.00 anual</small>
									</span> 
								</li>
								<li style="width: 12.5%;" class="mensal">
									<span class="linha-1" style="background: #52b5d5;"><input type="radio" name="ped_periodo_combo" value="1" style="margin-top: 10px!important;"><br><small>Mensal</small></span>
									<span class="plano-8" style="background: #fff;">R$ 0,00</span>
									<span class="plano-9">R$ 0,00</span>
									<span class="plano-10" style="background: #fff;">R$ 0,00</span>
									<span class="plano-11">R$ 0,00</span>
									<span class="plano-12" style="background: #fff;">R$ 0,00</span>
									<span class="plano-13">R$ 0,00</span>
									<span class="plano-14" style="background: #fff;">R$ 0,00</span>
									<span class="plano-15">R$ 0,00</span>
									<span class="plano-16" style="background: #fff;">R$ 0,00</span>
									<span class="plano-17">R$ 0,00</span>
									<span class="plano-18" style="background: #fff;">R$ 0,00</span>
									<span class="plano-19">R$ 0,00</span>
									<span class="plano-20" style="background: #fff;">R$ 0,00</span>
									<span class="plano-21">R$ 0,00</span>
								</li>
								<li style="width: 12.5%;" class="trimestral">
									<span class="linha-1" style="background: #3591ca;"><input type="radio" name="ped_periodo_combo" value="2" style="margin-top: 10px!important;"><br><small>Trimestral</small></span>
									<span class="plano-8">R$ 0,00</span>
									<span class="plano-9" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-10">R$ 0,00</span>
									<span class="plano-11" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-12">R$ 0,00</span>
									<span class="plano-13" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-14">R$ 0,00</span>
									<span class="plano-15" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-16">R$ 0,00</span>
									<span class="plano-17" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-18">R$ 0,00</span>
									<span class="plano-19" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-20">R$ 0,00</span>
									<span class="plano-21" style="background: #d0d0d0;">R$ 0,00</span>
								</li>
								<li style="width: 12.5%;" class="semestral">
									<span class="linha-1" style="background: #1f5f9f;"><input type="radio" name="ped_periodo_combo" value="3" style="margin-top: 10px!important;"><br><small>Semestral</small></span>
									<span class="plano-8" style="background: #fff;">R$ 0,00</span>
									<span class="plano-9">R$ 0,00</span>
									<span class="plano-10" style="background: #fff;">R$ 0,00</span>
									<span class="plano-11">R$ 0,00</span>
									<span class="plano-12" style="background: #fff;">R$ 0,00</span>
									<span class="plano-13">R$ 0,00</span>
									<span class="plano-14" style="background: #fff;">R$ 0,00</span>
									<span class="plano-15">R$ 0,00</span>
									<span class="plano-16" style="background: #fff;">R$ 0,00</span>
									<span class="plano-17">R$ 0,00</span>
									<span class="plano-18" style="background: #fff;">R$ 0,00</span>
									<span class="plano-19">R$ 0,00</span>
									<span class="plano-20" style="background: #fff;">R$ 0,00</span>
									<span class="plano-21">R$ 0,00</span>
								</li>
								<li style="width: 12.5%;" class="anual">
									<span class="linha-1" style="background: #1a3e7b url('images/etiqueta-planos.png')no-repeat top right;"><input type="radio" checked name="ped_periodo_combo" value="4" style="margin-top: 10px!important;"><br><small>Anual</small></span>
									<span class="plano-8">R$ 0,00</span>
									<span class="plano-9" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-10">R$ 0,00</span>
									<span class="plano-11" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-12">R$ 0,00</span>
									<span class="plano-13" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-14">R$ 0,00</span>
									<span class="plano-15" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-16">R$ 0,00</span>
									<span class="plano-17" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-18">R$ 0,00</span>
									<span class="plano-19" style="background: #d0d0d0;">R$ 0,00</span>
									<span class="plano-20">R$ 0,00</span>
									<span class="plano-21" style="background: #d0d0d0;">R$ 0,00</span>
								</li>
							</ul>
							
							<div class="clear-both"></div>	
							<div>
								<h4><span>Quadras Adicionais</span></h4>
								<label for="label">Tem mais de 5 Quadras?<span>*</span></label> 
								<small style="width:100px;"><input type="radio" name="inf_quadra_adicional_combos" value="s">Sim</small>
								<small><input type="radio" name="inf_quadra_adicional_combos" value="n" checked="checked">N&atilde;o</small>
								<div class="clear-both"></div>
								
								<div class="bloco_qtde_quadras_combos" style="display: none;">
									<label for="label">Quantidade<span>*</span></label>
									<div class="clear-both"></div>
									<select name="qtde_quadras_combos" style="width:220px;">
										<option value="1" selected="selected">01 - Quadra - R$14,90</option>
										<option value="2">02 - Quadras - R$29,80</option>
										<option value="3">03 - Quadras - R$44,70</option>
										<option value="4">04 - Quadras - R$59,60</option>
										<option value="5">05 - Quadras - R$74,50</option>
										<option value="6">06 - Quadras - R$89,40</option>
										<option value="7">07 - Quadras - R$104,30</option>
										<option value="8">08 - Quadras - R$119,20</option>
										<option value="9">09 - Quadras - R$134,10</option>
										<option value="10">10 - Quadras - R$149,00</option>
										<option value="11">11 - Quadras - R$163,90</option>
										<option value="12">12 - Quadras - R$178,80</option>
										<option value="13">13 - Quadras - R$193,70</option>
										<option value="14">14 - Quadras - R$208,60</option>
										<option value="15">15 - Quadras - R$223,50</option>
										<option value="16">16 - Quadras - R$238,40</option>
										<option value="17">17 - Quadras - R$253,30</option>
										<option value="18">18 - Quadras - R$268,20</option>
										<option value="19">19 - Quadras - R$283,10</option>
										<option value="20">20 - Quadras - R$298,00</option>
                                        <option value="21">21 - Quadras - R$312,90</option>
                                        
                                        <option value="22">22 - Quadras - R$327,80</option>
                                        <option value="23">23 - Quadras - R$342,70</option>
                                        <option value="24">24 - Quadras - R$357,60</option>
                                        <option value="25">25 - Quadras - R$372,50</option>
                                        <option value="26">26 - Quadras - R$387,40</option>
                                        <option value="27">27 - Quadras - R$402,30</option>
                                        <option value="28">28 - Quadras - R$417,20</option>
                                        <option value="29">29 - Quadras - R$432,10</option>
                                        <option value="30">30 - Quadras - R$447,00</option>
                                        <option value="31">31 - Quadras - R$461,90</option>
                                        <option value="32">32 - Quadras - R$476,80</option>
                                        <option value="33">33 - Quadras - R$491,70</option>
                                        <option value="34">34 - Quadras - R$506,60</option>
                                        <option value="35">35 - Quadras - R$521,50</option>
                                        <option value="36">36 - Quadras - R$536,40</option>
                                        <option value="37">37 - Quadras - R$551,30</option>
                                        <option value="38">38 - Quadras - R$556,20</option>
                                        <option value="39">39 - Quadras - R$581,20</option>
                                        <option value="40">40 - Quadras - R$596,00</option>
									</select>
								</div>
								<div class="clear-both"></div>
							</div>
						</div>
					</div>

									</div>
								<br>
								<h4>Cupom de desconto</h4>	
								<div style="clear:both"></div>	
								<div style="display:flex;">
								
									<div style="margin-top: 13px;margin-right: 13px;">Caso você tenha algum <b>Cupom</b>, insira no campo e em seguida clique em "Utilizar Cupom"</div>									
									<div><input type="text" name="" id="" class="form-control" style="width:150px;"></div>																		
									<div><input type="button" value="Avançar" id="busca-cep" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;"></div>
									
								</div>								
								<br>
								<div>
									<h4>Resumo do pedido</h4>	
									<div style="clear:both"></div>									
			<div class="bloco_ped_resumo">
					<ul class="planos">
						<li style="margin-left: 26%;">
							<span style="background-color: #1a3e7b;border-bottom: solid 1px #303898; color: #fff;height: 77px;line-height: 19px;align-items: center;display: flex; justify-content: center;"><div>Plano</div></span>
							<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #2c449c;" class="resumo-sistema">N&uacute;mero de Quadras</span>
							<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #2c449c;" class="resumo-sistema">Envio de SMS Gr&aacute;tis</span>
							<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #2c449c;" class="resumo-sistema">Agendamentos</span>
							<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #2c449c;" class="resumo-sistema">Controle de Escolinha</span>
							<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #2c449c;" class="resumo-sistema">M&oacute;dulo de Lanchonete</span>
							<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #2c449c;" class="resumo-sistema resumo-plano">Valor do Plano</span>
							<!--<?php if ($_smarty_tpl->tpl_vars['existe_setup_android']->value != 's' || $_smarty_tpl->tpl_vars['existe_setup_ios']->value != 's') {?>-->
								<span style="background-color: #294c30;color: #fff;border-bottom: solid 1px #233e29;" class="resumo-aplicativo resumo-aplicativo-setup">Taxa de Setup (App)</span>
							<!--<?php }?>-->
							<!--<?php if ($_smarty_tpl->tpl_vars['existe_setup_sistema']->value != 's') {?>-->
								<span style="background-color: #374C9A;color: #fff;border-bottom: solid 1px #233e29;" class="resumo-sistema resumo-sistema-setup">Taxa de Setup</span>
							<!--<?php }?>-->
							<span style="background-color: #464D54;color: #fff;border-bottom: solid 1px #404040; display: none;" class="resumo-email">Contas de E-mail</span>
							<span style="background-color: #464D54;color: #fff;border-bottom: solid 1px #404040; display: none;" class="resumo-email">Hospedagem</span>
							<span style="background-color: #464D54;color: #fff;border-bottom: solid 1px #404040; display: none;" class="resumo-email">Certificado SSL (https)</span>
							<span style="background-color: #d89100;color: #fff;border-bottom: solid 1px #b57b04; display: none;" class="resumo-reserva-online">Reserva Online</span>
							<span style="background-color: #1c6f80;color: #fff;border-bottom: solid 1px #125a69; display: none;" class="resumo-quadras-adicionais">Quadras Adicionais</span>
							<span style="background-color: #1c6f80;color: #fff;border-bottom: solid 1px #125a69; display: none;" class="resumo-quadras-adicionais">Valor Quadras Adicionais</span>
							<span style="background-color: #d6d6d6;border-bottom: solid 1px #bfbfbf; color: #666;">Suporte</span>
							<span style="background-color: #d6d6d6;color: #666;height: 81px;line-height: 77px;font-size: 36px;font-weight: 700;" class="resumo-total-texto">TOTAL</span>
						</li>
						
						<li style="width: 28%;">
							<span style="background-color: #1f5f9f;border-bottom: solid 1px #3d47b5;color: #fff;height: 77px;line-height: 19px;align-items: center;display: flex; justify-content: center;"><div class="resumo-nome-plano">Sistema</div></span>
							<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #3754bf;" class="resumo-sistema">5</span>
							<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #3754bf;" class="resumo-sistema resumo-qtde-sms">30</span>
							<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #3754bf;" class="resumo-sistema">Ilimitados</span>
							<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #3754bf;" class="resumo-sistema">Sim</span>
							<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #3754bf;" class="resumo-sistema">Sim</span>
							<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #3754bf;" class="resumo-sistema resumo-plano resumo-valor-plano"></span>
							<!--<?php if ($_smarty_tpl->tpl_vars['existe_setup_android']->value != 's' || $_smarty_tpl->tpl_vars['existe_setup_ios']->value != 's') {?>-->
								<span style="background-color: #3c6d46;color: #fff;border-bottom: solid 1px #2b4c32; display: none; display: flex; justify-content: center;align-items: center;" class="resumo-aplicativo resumo-aplicativo-setup">
									<div style="width: 100px;float: left;" class="resumo-aplicativo-valor-setup">R$650,00</div>
								</span>
							<!--<?php }?>
							<!--<?php if ($_smarty_tpl->tpl_vars['existe_setup_sistema']->value != 's') {?>-->
								<span style="background-color: #4b67d0;color: #fff;border-bottom: solid 1px #2b4c32; display: none; display: flex; justify-content: center;align-items: center;" class="resumo-sistema resumo-sistema-setup">
									<div style="width: 100px;float: left;" class="resumo-sistema-valor-setup">R$120,00</div>
								</span>
							<!--<?php }?>-->
							<span style="background-color: #757F88;color: #fff;border-bottom: solid 1px #676363; display: none;" class="resumo-email resumo-qtde-contas">5 contas</span>
							<span style="background-color: #757F88;color: #fff;border-bottom: solid 1px #676363; display: none;" class="resumo-email">Gr&aacute;tis</span>
							<span style="background-color: #757F88;color: #fff;border-bottom: solid 1px #676363; display: none;" class="resumo-email">Gr&aacute;tis</span>
							<span style="background-color: #e29d0f;color: #fff;border-bottom: solid 1px #b58013; display: none;" class="resumo-reserva-online">Sim</span>
							<span style="background-color: #2c90a5;color: #fff;border-bottom: solid 1px #217b8e; display: none;" class="resumo-quadras-adicionais resumo-qtde-quadras-adicionais"></span>
							<span style="background-color: #2c90a5;color: #fff;border-bottom: solid 1px #217b8e; display: none;" class="resumo-quadras-adicionais resumo-valor-quadras-adicionais"></span>
							<span style="background-color: #e4e4e4;border-bottom: solid 1px #bfbfbf; color: #666;">sim</span>
							<span style="background-color: #e4e4e4;color: #249410;height: 81px;line-height: 77px;font-size: 36px;font-weight: 700;" class="resumo-total">R$ 0,00</span>
						</li>
					</ul>
					
					<div class="clear-both"></div>
					
					<div class="notificacao-alerta atencao valor-taxa-anual-ios" style="display: none; margin-top: 20px!important;">
						<span style="line-height: 20px;">Aten&ccedil;&atilde;o, ser&aacute; necess&aacute;rio pagar anualmente uma taxa de $99 USD para manter o aplicativo na App Store.<br>OBS: Este valor n&atilde;o tem rela&ccedil;&atilde;o com o Quadra F&aacute;cil e n&atilde;o est&aacute; incluso no total do pedido.</span><br>
					</div>
				</div>
								</div>
								<br>
								<h4>Forma de pagamento</h4>	
								<div style="clear:both"></div>									
								<div style="height:auto">
									<?php $_smarty_tpl->_subTemplateRender("file:formulario_pagamento.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
								</div>


								<br>
								<h4>Contrato</h4>	
								<div style="clear:both"></div>								
								<label style="width: 300px;"><input type="checkbox" class="pla_tipo" name="pla_tipo"  value="j"  style="margin-right: 6px;" ><a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
contrato/" style="color:rgb(16, 99, 163);">Eu aceito os termos de contrato.</a></label>
								<br>
								<br>
								<input type="button" value="Avançar" id="busca-cep" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">	
							</div>							
						</form>
					</div>																
		</td>
    </tr>
</table>

<input type="hidden" id="cartao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/planos.js"> <?php echo '</script'; ?>
>

<style>

.sel-plano td{
	text-align: center;
}

</style>

<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style>
li {
  list-style-type:none;
}
</style><?php }
}
