<?php
/* Smarty version 4.1.0, created on 2023-10-10 12:48:45
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\produtos\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6525725dd9ba04_84150998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb5a8deec7959c02fe6407fb5c7c9c7e8ac8ce3c' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\produtos\\formulario.tpl',
      1 => 1696952923,
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
function content_6525725dd9ba04_84150998 (Smarty_Internal_Template $_smarty_tpl) {
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
								<br>
								<h5>PRODUTO</h5>		
								<hr>							
								<div>
									<label>Categoria*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								
								<div>
									<label>Fornecedor*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								
								<div>
									<label>Título*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>									
								<div>
									<label>Descrição (Opcional)</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								
								<div>
									<label>Código de Barras - GTIN/EAN</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>													
								<div style="display:flex;">
									<div style="width: 230px;">
										<label>Valor de Custo (R$)*</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>										
									<div style="width: 230px;margin-left: 20px;">
										<label>Valor de Venda (R$)*</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</div>																		
								</div>									
								<div style="display:flex;">
									<div style="width: 230px;">
										<label>Lucro por unidade (R$)</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>																											
								</div>	
								<br>
								<div>
									<h5 style="font-size: 18px;">Este produto possui estoque?*</h5>
									<div style="clear:both"></div>							
									<div style="display:flex;">
										<label style="width: 140px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="f" style="margin-right: 2px;" checked>Sim</label>
										<label><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="j" style="margin-right: 2px;">Não</label>
									</div>
								</div>								
								<br>
								<h5>ESTOQUE</h5>		
								<hr>								
								<div  style="width: 230px;">
									<label>Quantidade*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>									
							</div>
					<div>				
						<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>		
						
						<?php }?>					
					</div>							
							<div style="margin-top:30px;">
								<input type="submit" value="<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?>" name="submit" id="salvar-nome" class="btn btn-success bg-primary" >
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
