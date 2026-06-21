<?php
/* Smarty version 4.1.0, created on 2025-11-30 20:07:18
  from 'C:\xampp\htdocs\petvidafacil\sistema.petvidafacil.com.br\template\meus_dados\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_692cce26ee87f6_06055385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '016b53dec5efe287185a204cdd9d296463dda00d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\petvidafacil\\sistema.petvidafacil.com.br\\template\\meus_dados\\formulario.tpl',
      1 => 1689017846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:abas.tpl' => 1,
    'file:popups/excluir_registro.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_692cce26ee87f6_06055385 (Smarty_Internal_Template $_smarty_tpl) {
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
						<h5>Tipo do cadastro</h5>
						<div style="clear:both"></div>							
						<div style="display:flex;">
							<label style="width: 140px;"><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="f" style="margin-right: 2px;" <?php if ($_smarty_tpl->tpl_vars['emp_tipo_cadastro']->value == 'f') {?>checked<?php } else { ?>disabled<?php }?>>Pessoa Físico</label>
							<label><input type="radio" class="meu_tipo_cad" name="meu_tipo_cad"  value="j" style="margin-right: 2px;" <?php if ($_smarty_tpl->tpl_vars['emp_tipo_cadastro']->value == 'j') {?>checked<?php } else { ?>disabled<?php }?>> Pessoa Jurídico</label>
						</div>
					</div>
					<div id="fisico"  <?php if ($_smarty_tpl->tpl_vars['emp_tipo_cadastro']->value == 'j') {?>style="display:none;"<?php }?>>
						<input type="hidden" id="tipo_cadastro" value="f">
						<div>
							<label>Nome:</label>
							<input type="text" class="form-control" id="emp_pf_nome" name="emp_pf_nome"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pf_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>						
						<div style="display:flex;">
							<div style="width: 230px;margin-right: 10px;">
								<label>CPF:</label>
								<input type="text" class="form-control" id="emp_pf_cpf" name="emp_pf_cpf"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pf_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>								
							<div style="width: 214px;">
								<label>Data de nascimento:</label>
								<input type="text" class="form-control" id="emp_pf_dt_nascimento" name="emp_pf_dt_nascimento"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pf_dt_nascimento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>	
						</div>																					
					</div>
					<div id="juridico" <?php if ($_smarty_tpl->tpl_vars['emp_tipo_cadastro']->value == 'f') {?>style="display:none;"<?php }?>>
						<input type="hidden" id="tipo_cadastro" value="j">
						<div style="width: 335px;">
							<label>CNPJ:</label>
							<input type="text" class="form-control" id="emp_pj_cnpj" name="emp_pj_cnpj"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pj_cnpj']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>								
						<div>
							<label>Nome Fantasia:</label>
							<input type="text" class="form-control" id="emp_pj_fantasia" name="emp_pj_fantasia"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pj_fantasia']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>				
						<div>
							<label>Razao social:</label>							
							<input type="text" class="form-control" id="emp_pj_razao" name="emp_pj_razao"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pj_razao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>	
						<div>
							<label>IE:</label>
							<div style="display:flex;width:260px;">
								<input type="text" class="form-control" id="emp_pj_ie" name="emp_pj_ie"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pj_ie']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="margin-right: 5px;">
								<div style="margin-top: 8px;margin-left: 2px;display:flex;">
									<input type="checkbox" id="emp_pj_ie_isento" name="emp_pj_ie_isento" value="s" style="margin-right: 2px;" <?php if ($_smarty_tpl->tpl_vars['emp_pj_ie_isento']->value != 'n') {?>checked<?php }?>>	
									<label style="margin-top: 6px;">Isento</label>													
								</div>	
							</div>	
						</div>	
						<div style="width: 460px;">
							<label>Responsavel:</label>							
							<input type="text" class="form-control" id="emp_pj_responsavel" name="emp_pj_responsavel"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_pj_responsavel']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
					</div>					
					<div id="endereco" >
						<br>
						<h5>Endereço</h5>		
						<hr>
						<div>
							<label>CEP:</label>
							<div style="clear:both;"></div>
							<div style="display:flex;">
								<input type="text" class="form-control" id="emp_cep" name="emp_cep"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_cep']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="width:200px;">
								<input type="button" value="Buscar" id="buscar-cep" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">
							</div>
						</div>								
						<div>
							<label>Rua:</label>
							<input type="text" class="form-control" id="emp_rua" name="emp_rua"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_rua']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>				
						<div style="display:flex;">				
							<div style="width:200px;margin-right: 10px;">
								<label>Numero:</label>
								<input type="text" class="form-control" id="emp_numero" name="emp_numero"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_numero']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>	
							<div style="width:250px;">
								<label>Complemento:</label>
								<input type="text" class="form-control" id="emp_complemento" name="emp_complemento"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_complemento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>							
						</div>							
						<div style="display:flex;">							
							<div style="width: 250px;margin-right: 10px;">
								<label>Bairro:</label>
								<input type="text" class="form-control" id="emp_bairro" name="emp_bairro"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_bairro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>							
							<div style="width: 250px;margin-right: 10px;">
								<label>Cidade:</label>
								<input type="text" class="form-control" id="emp_cidade" name="emp_cidade"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_cidade']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>							
							<div>
								<label>Estado:</label>
								<input type="text" class="form-control" id="emp_estado" name="emp_estado"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_estado']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>									
						</div>	
					</div>	
					<div id="contato" >		
						<br>
						<h5>Contato</h5>		
						<hr>						
						<div style="display:flex;">						
							<div style="width: 225px;margin-right: 10px;">
								<label>Telefone:</label>
								<input type="text" class="form-control" id="emp_telefone" name="emp_telefone"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_telefone']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>						
							<div style="width: 225px;">
								<label>Celular:</label>
								<input type="text" class="form-control" id="emp_celular" name="emp_celular"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_celular']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							</div>																		
						</div>											
						<div>
							<label>Facebook:</label>
							<input type="text" class="form-control" id="emp_facebook" name="emp_facebook"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_facebook']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>				
						<div>
							<label>Instagram:</label>
							<input type="text" class="form-control" id="emp_instagram" name="emp_instagram"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_instagram']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>	
						<div>
							<label>Lista de Emails:</label>
							<input type="text" class="form-control" id="emp_emails" name="emp_emails"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['emp_emails']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>															
					</div>								
					<div style="margin-top:30px;">
						<input type="submit" name="submit" value="Alterar dados" id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
					</div>
				</form>				
			</div>	
		</td>
    </tr>
</table>


<div id="dialog-excluir-anexo" title="Confirmar exclusão" style="display: none;">

	<?php $_smarty_tpl->_subTemplateRender("file:popups/excluir_registro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
</div>



<input type="hidden" id="qtde_endereco" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['qtde_endereco']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
<input type="hidden" id="nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/meus_dados.js"> <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/jquery.mask.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
