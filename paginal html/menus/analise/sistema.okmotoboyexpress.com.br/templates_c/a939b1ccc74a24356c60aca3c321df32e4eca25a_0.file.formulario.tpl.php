<?php
/* Smarty version 4.1.0, created on 2023-03-04 19:52:55
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\Admin\template\logins\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640393871f2940_84207050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a939b1ccc74a24356c60aca3c321df32e4eca25a' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\Admin\\template\\logins\\formulario.tpl',
      1 => 1677809773,
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
function content_640393871f2940_84207050 (Smarty_Internal_Template $_smarty_tpl) {
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
				<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>
				<!--<div class="alert alert-danger" role="alert">Não foi possivel cadastrar, verifique os dados</div>-->
				<?php echo (($tmp = $_smarty_tpl->tpl_vars['mensagem']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

			</div>
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control" disabled value="001" >
								  </td>
								</tr>
							<?php }?>						
							<tr>
							  <td>Nome<span class="obrigatorio">*<span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>E-mail<span class="obrigatorio">*<span></td>
							  <td>
							  
									<input type="text" class="form-control" id="cli_email" name="cli_email"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="email@teste.com.br" <?php }?>>						  
							  
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
