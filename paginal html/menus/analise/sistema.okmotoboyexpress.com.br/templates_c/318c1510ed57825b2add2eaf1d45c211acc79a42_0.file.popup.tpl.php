<?php
/* Smarty version 4.1.0, created on 2023-04-05 04:49:57
  from 'D:\Meus Projetos\Local Web\Alfa\portaldenoticias\template\endereco\popup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_642ce1d52d6784_86333340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '318c1510ed57825b2add2eaf1d45c211acc79a42' => 
    array (
      0 => 'D:\\Meus Projetos\\Local Web\\Alfa\\portaldenoticias\\template\\endereco\\popup.tpl',
      1 => 1680662994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642ce1d52d6784_86333340 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<input type="button" value="Adicionar" id="adicionar-endereco" class="btn btn-dark">
<div id="novo-endereco" style="display:none;">
	<table  class="table table-bordered" style="margin-top: 10px;" >
		<thread>
			<tr class="table-active">
				<th scope="col" colspan="2">Novo endereço</th>
			</tr>
		</thread>
		<body>
			<tr>
				<td><input type="text" id="end_cep" name="end_cep" placeholder="Cep*" class="form-control" ></td>
				<td><input type="text" id="end_numero" name="end_numero" placeholder="Numero*" class="form-control" ></td>				
			</tr>		
			<tr>
				<td colspan="2"><input type="text" id="end_rua" name="end_rua" placeholder="Rua" class="form-control" ></td>
			</tr>		
			<tr>
				<td><input type="text" id="end_comp" name="end_comp" placeholder="Complemento" class="form-control" ></td>			
				<td><input type="text" id="end_bairro" name="end_bairro" placeholder="Bairro" style="width:100%" class="form-control" ></td>
			</tr>	
			<tr>
				<td><input type="text" id="end_cidade" name="end_cidade" placeholder="Cidade" class="form-control" ></td>
				<td><input type="text" id="end_estado" name="end_estado" placeholder="Estado" class="form-control" ></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: end;">
					<input type="button" value="Cancelar" id="cancelar-endereco" class="btn btn-danger">
					<input type="button" value="Salvar" id="salvar-endereco" class="btn btn-success">
				</td>
			</tr>		
		</body>
	</table>
</div>
<table class="table table-bordered" style="margin-top: 10px;">
	<thread>
		<tr class="table-active">
			<th scope="col" colspan="2">Endereço</th>
		</tr>
	</thread>
	<body>
		<tr >
			<td style="padding:initial;">
				Rua,numero,Complemento<br>
				Bairro,Cidade/Estado
			</td>
			<td style="display:flex;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png"  style="width:20px;height:20px;margin-right:10px;cursor: pointer;;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png"  style="width:20px;height:20px;cursor: pointer;">
			</td>
		</tr>								
		<tr>
			<td style="padding: initial;">
				Rua,numero,Complemento<br>
				Bairro,Cidade/Estado
			</td>
			<td style="display:flex;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png" style="width:20px;height:20px;margin-right:10px;cursor: pointer;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png" style="width:20px;height:20px;cursor: pointer;">
			</td>
		</tr>								
									
	</tbody>
</table>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/adiciona_endereco.js"> <?php echo '</script'; ?>
><?php }
}
