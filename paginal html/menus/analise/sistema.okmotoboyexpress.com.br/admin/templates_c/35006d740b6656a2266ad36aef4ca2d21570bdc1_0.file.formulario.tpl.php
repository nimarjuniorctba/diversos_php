<?php
/* Smarty version 4.1.0, created on 2026-06-19 01:19:39
  from 'C:\xampp\htdocs\okmotoboyexpress\sistema.okmotoboyexpress.com.br\admin\template\meus_dados\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a34c35b748193_55501892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35006d740b6656a2266ad36aef4ca2d21570bdc1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\okmotoboyexpress\\sistema.okmotoboyexpress.com.br\\admin\\template\\meus_dados\\formulario.tpl',
      1 => 1781365210,
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
function content_6a34c35b748193_55501892 (Smarty_Internal_Template $_smarty_tpl) {
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
				<form name="form" method="POST" class="formulario">
					<br>
					<br>
					<br>
					<div id="dados">
						<input type="hidden" id="tipo_cadastro" value="j">
						<div>
							<label>CNPJ:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>								
						<div>
							<label>Nome Fantasia:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>				
						<div>
							<label>Razao social:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>	
						<div>
							<label>Site:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
						<div>
							<label>Nome completo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
						<div>
							<label>Responsável:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>		

						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
					</div>					
					<div id="endereco" >					
						<div>
							<label>CEP:</label>
							<div style="display:flex;">
								<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="width:200px;">
								<input type="button" value="Buscar" id="salvar-nome" class="btn btn-success bg-primary" style="margin-left: 5px;box-shadow:none;">
							</div>
						</div>								
						<div>
							<label>Nome Fantasia:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>				
						<div>
							<label>Razao social:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>	
						<div>
							<label>Site:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
						<div>
							<label>Nome completo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
						<div>
							<label>Responsável:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>		

						<div>
							<label>Cargo:</label>
							<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
						</div>							
					</div>	
					<div style="margin-top:30px;">
						<input type="button" value="Alterar" id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
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


<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
