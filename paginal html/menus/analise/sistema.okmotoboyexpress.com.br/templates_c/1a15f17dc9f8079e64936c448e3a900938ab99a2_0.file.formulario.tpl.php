<?php
/* Smarty version 4.1.0, created on 2025-11-26 10:24:19
  from 'C:\xampp\htdocs\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\minhas_compras\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6926ff83803818_53066801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a15f17dc9f8079e64936c448e3a900938ab99a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\minhas_compras\\formulario.tpl',
      1 => 1688799720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:abas.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_6926ff83803818_53066801 (Smarty_Internal_Template $_smarty_tpl) {
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
						
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<input type="hidden" id="cli_idurl" name="cli_idurl" value="<?php echo $_smarty_tpl->tpl_vars['cli_idurl']->value;?>
">
						<?php }?>			
						
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

<input type="hidden" id="cartao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/clientes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
