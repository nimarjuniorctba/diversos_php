<?php
/* Smarty version 4.1.0, created on 2023-03-13 03:23:55
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\portaldenoticias\template\nomes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640e893b795264_81030899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '817329117b193d07a80616b544e14171f3ecb993' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\portaldenoticias\\template\\nomes\\formulario.tpl',
      1 => 1678674221,
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
function content_640e893b795264_81030899 (Smarty_Internal_Template $_smarty_tpl) {
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
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados da pessoa</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control" id="nom_id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_id']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>
								<tr>
								  <td>Data de cadastro:<span class="obrigatorio"><span></td>
								  <td>
									<input type="text" class="form-control" id="nom_dt_cadastro" name="nom_dt_cadastro" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_dt_cadastro']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" disabled>
								  </td>
								</tr>								
							<?php }?>						
							<tr>
							  <td>Nome<span class="text-danger">*</span>:</td>
							  <td>
								<input type="text" class="form-control" id="nom_nome" name="nom_nome" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_nome']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" >
							  </td>
							</tr>
							<tr>
							  <td>CPF<span class="text-danger">*</span>:</td>
							  <td>
								<input type="text" class="form-control" id="nom_cpf" name="nom_cpf" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_cpf']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Mae:</td>
							  <td>
								<input type="text" class="form-control" id="nom_mae" name="nom_mae" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_mae']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Pai:</td>
							  <td>
								<input type="text" class="form-control" id="nom_pai" name="nom_pai" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_pai']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>RG:</td>
							  <td>
								<input type="text" class="form-control" id="nom_rg" name="nom_rg" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_rg']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
							  <td>Data de Expedição do RG:</td>
							  <td>
								<input type="text" class="form-control" id="nom_rg_dt_expedicao" name="nom_rg_dt_expedicao" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_rg_dt_expedicao']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Data Nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="nom_dt_nascimento" name="nom_dt_nascimento" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_dt_nascimento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Local nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="nom_local_nascimento" name="nom_local_nascimento" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_local_nascimento']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>
							<tr>
							  <td>Titulo de eleitor:</td>
							  <td>
								<input type="text" class="form-control" id="nom_titulo_eleitor" name="nom_titulo_eleitor"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['nom_titulo_eleitor']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
							  </td>
							</tr>							
							<tr>
								<td >
									
								</td>
								<td >
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
