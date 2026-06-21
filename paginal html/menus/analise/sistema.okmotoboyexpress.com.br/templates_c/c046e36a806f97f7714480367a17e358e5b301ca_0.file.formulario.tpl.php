<?php
/* Smarty version 4.1.0, created on 2023-03-11 21:20:02
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\Admin\template\cartoes\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640ce272a29d05_76535349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c046e36a806f97f7714480367a17e358e5b301ca' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\Admin\\template\\cartoes\\formulario.tpl',
      1 => 1678565958,
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
function content_640ce272a29d05_76535349 (Smarty_Internal_Template $_smarty_tpl) {
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
							  <th scope="col" colspan="2">Preencha os dados do cartão</th>
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
							  <td>Nome<span class="obrigatorio"><span class="text-danger">*</span><span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>CPF<span class="obrigatorio"><span class="text-danger">*</span><span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>							
							<tr>
							  <td>Numero<span class="obrigatorio">*<span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>Data Validade<span class="obrigatorio"><span class="text-danger">*</span><span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>		
							<tr>
							  <td>Cvc:<span class="obrigatorio"><span class="text-danger">*</span><span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>								
							<tr>
							  <td>Level:<span class="obrigatorio"><span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>Type:<span class="obrigatorio"><span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="nome teste" <?php }?>>
							  </td>
							</tr>			
							<tr>
							  <td>Status:<span class="obrigatorio"><span></td>
							  <td>
								<select class="form-control" id="cli_nome" name="cli_nome">
								<option>Live</option>
								<option>Dead</option>
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
