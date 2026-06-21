<?php
/* Smarty version 4.1.0, created on 2023-10-10 12:18:07
  from 'D:\Meus Projetos\Local Web\Produtoresweb.com.br\LocalHost\sistema.petvidafacil.com.br\template\fornecedores\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_65256b2fde2c72_01551451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6973b970f44efb62d5b886b079115d3450af01b4' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Produtoresweb.com.br\\LocalHost\\sistema.petvidafacil.com.br\\template\\fornecedores\\formulario.tpl',
      1 => 1696951084,
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
function content_65256b2fde2c72_01551451 (Smarty_Internal_Template $_smarty_tpl) {
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
								<div>
									<label>Categoria*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>								<div>
									<label>Nome*</label>
									<input type="text" class="form-control" id="cli_pf_nome" name="cli_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
								</div>						
								<div style="display:flex;">
									<div style="width: 230px;">
										<label>CNPJ (Opcional)</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>										
									<div style="width: 230px;margin-left: 20px;">
										<label>Email (Opcional)</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
									</div>																		
								</div>									
								<div style="display:flex;">
									<div style="width: 230px;">
										<label>Telefone (Opcional)</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>										
									<div style="width: 230px;margin-left: 20px;">
										<label>Celular (Opcional)</label>
										<input type="text" class="form-control" id="cli_pf_cpf" name="cli_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['cli_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
									</div>																		
								</div>	
								<div>
									<label>Descrição*</label>
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
