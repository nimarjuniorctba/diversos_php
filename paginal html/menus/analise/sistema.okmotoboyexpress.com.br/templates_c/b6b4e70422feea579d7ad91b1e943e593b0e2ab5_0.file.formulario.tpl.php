<?php
/* Smarty version 4.1.0, created on 2023-03-04 21:40:52
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\Admin\template\nomes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6403acd40fe741_42601627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6b4e70422feea579d7ad91b1e943e593b0e2ab5' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\Admin\\template\\nomes\\formulario.tpl',
      1 => 1677962449,
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
function content_6403acd40fe741_42601627 (Smarty_Internal_Template $_smarty_tpl) {
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
							  <th scope="col" colspan="2">Preencha os dados da pessoa</th>
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
								<tr>
								  <td>Data de cadastro:<span class="obrigatorio"><span></td>
								  <td>
									<input type="text" class="form-control" id="cli_nome" name="cli_nome" value="12/03/2021 - 16:09" disabled>
								  </td>
								</tr>								
							<?php }?>						
							<tr>
							  <td>Nome<span class="obrigatorio">*<span>:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>E-mail:</td>
							  <td>
							  
									<input type="text" class="form-control" id="cli_email" name="cli_email"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="email@teste.com.br" <?php }?>>						  
							  
							  </td>
							</tr>
							<tr>
							  <td>CPF<span class="obrigatorio">*<span>:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>							
							<tr>
							  <td>Mae:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>Pai:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>RG:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>Data Nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>Local nascimento:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>Titulo de eleitor:</td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>							
							<tr>
								<td >
									<span style="float:left;"><button type="submit" name="submit"  id="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" class="btn btn-success">Adicionar Endereço</button></span>
								</td>
								<td >
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" class="btn btn-success"><?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?></button></span>
								</td>
							</tr>

						  </tbody>
						</table>
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
							<thread>
								<tr class="table-active">
									<th scope="col" colspan="2">Endereço</th>
								</tr>
							</thread>
							<body>
								<tr>
									<td>CEP</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>								
								<tr>
									<td>Rua</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>								
								<tr>
									<td>Numero</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>
								<tr>
									<td>Complemento</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>								
								<tr>
									<td>Bairro</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>								
								<tr>
									<td>Cidade</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>															
								<tr>
									<td>Estado</td>
									<td>
										<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
									</td>
								<tr>								
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
