<?php
/* Smarty version 4.1.0, created on 2023-03-13 02:19:44
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\portaldenoticias\template\cartoes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640e7a30bbeb32_27948063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5054c0a2c82e95d42c9396068218d8ce1f71deb' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\portaldenoticias\\template\\cartoes\\formulario.tpl',
      1 => 1678669869,
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
function content_640e7a30bbeb32_27948063 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>
<div style="margin-left:32px;"><h6><?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</h6></div>
<br>

<?php $_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>
				<?php echo (($tmp = $_smarty_tpl->tpl_vars['mensagem']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

			</div>
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
					<div>

					</div>
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados do cartão</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control" id="car_id"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled >
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:<span class="obrigatorio"><span></td>
								  <td>
									<input type="text" class="form-control" id="car_dt_cadastro" name="car_dt_cadastro" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_dt_cadastro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>
							<?php }?>						
							<tr>
							  <td>Nome:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="20" class="form-control" id="car_nome" name="car_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Documento:</td>
							  <td>
								<input type="text" maxlength="20" class="form-control" id="car_documento" name="car_documento" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_documento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
							  </td>
							</tr>							
							<tr>
							  <td>Numero:<span class="text-danger">*<span></td>
							  <td>
								<input type="text"  maxlength="40" class="form-control" id="car_numero" name="car_numero"value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_numero']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Data Validade:<span class="text-danger">*</span>
							  <small>(mm/aa)</small>
							  </td>
							  <td>
								<input type="text" maxlength="5" class="form-control" id="car_dt_validade" name="car_dt_validade" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_dt_validade']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>		
							<tr>
							  <td>Cvc:<span class="text-danger">*</span></td>
							  <td>
								<input type="text" maxlength="4" class="form-control" id="car_cvc" name="car_cvc" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_cvc']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>								
							<tr>
							  <td>Banco:</td>
							  <td>
								<input type="text" class="form-control" id="car_banco" name="car_banco" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_banco']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Level:<span></td>
							  <td>
								<input type="text" class="form-control" id="car_level" name="car_level" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_level']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Type:</td>
							  <td>
								<input type="text" class="form-control" id="car_type" name="car_type" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_type']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Data Colhida:</td>
							  <td>
								<input type="text" class="form-control" id="car_colhida" name="car_colhida" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['car_colhida']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>			
							<tr>
							  <td>Status:</td>
							  <td>
								<select class="form-control" id="car_status_live" name="car_status_live">
								<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao != 'cadastrar') {?>
									<option value='l' <?php if ($_smarty_tpl->tpl_vars['car_status_live']->value != 'd') {?>selected<?php }?>>Live</option>
									<option value='d' <?php if ($_smarty_tpl->tpl_vars['car_status_live']->value == 'd') {?>selected<?php }?>>Dead</option>
								<?php } else { ?>
									<option value='l' >Live</option>
									<option value='d' >Dead</option>
								<?php }?>
								</select>
							  </td>
							</tr>								
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" class="btn btn-success"><?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?></button></span>
								</td>
							</tr>							
						  </tbody>
						</table>
					</form>
					</div>	
	</td>
    </tr>
</table>


<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
