{include file="topo.tpl"}

<br>
<br>
<br>

{include file="abas.tpl"}

<table class="table border principal" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>
				{$mensagem|default:''}
			</div>
			<br>
			<div class="table-responsive-sm">
				<form name="form" method="POST" class="formulario">
					<div>
						<div>
							<label>Nome:</label>
							<input type="text" class="form-control" id="emp_admin_nome" name="emp_admin_nome" value="{$emp_admin_nome|default:''}">
						</div>
						<div>
							<label>Email:</label>
							<input type="text" class="form-control"  id="emp_admin_email" name="emp_admin_email" value="{$emp_admin_email|default:''}">
						</div>
						{if $pagina->acao=='alterar'}	
							<br>
							<div>
								<label style="font-weight: 600;">Deseja alterar a senha ?</label>
								<div class="form-check form-check-inline" style="margin-left: 5px;">
									<input class="form-check-input emp_admin_senha" type="radio" name="emp_admin_senha" value="n" style="margin-top: 5px;" checked>
									<label class="form-check-label" for="emp_admin_senha0">Não</label>
								</div>	
								<div class="form-check form-check-inline">
									<input class="form-check-input emp_admin_senha" type="radio" name="emp_admin_senha" style="margin-top: 5px;" value="s">
									<label class="form-check-label" for="emp_admin_senha1">Sim</label>
								</div>										
							</div>		
							<div style="clear:both;"></div>
							<div id="alterar_senha" style="display:none;">
								<div style="display:flex;">
									<div style="width: 300px;margin-right: 10px;">
										<label>Senha:</label>
										<input type="password" class="form-control" id="emp_admin_senha" name="emp_admin_senha"  value="{$emp_admin_senha|default:''}">
									</div>
									<div style="width: 300px;">
										<label>Confirma senha:</label>
										<input type="password" class="form-control" id="emp_admin_senha2" name="emp_admin_senha2"  value="{$emp_admin_senha2|default:''}">
									</div>
									<span style="margin-left: 10px;margin-top: 23px;">
										<button name="cancelar"  id="cancelar-senha"  class="btn btn-secondary">Cancelar</button>
										<button name="alterar"  id="alterar-senha" class="btn bg-primary" style="color:white;">Alterar senha</button>
									</span>									
								</div>
								<div id="alert-senha" style="display:none;">
									<div class="alert alert-danger" role="alert" style="margin-top: 10px;width: 609px;border: 1px dashed #721c24;text-align: center;">
										<div class=""><span id="info-senha">As senhas devem ser iguais1.</span></div>
									</div>						
								</div>								
							</div>
						{else}
							<div style="display:flex;">
								<div style="width: 300px;margin-right: 10px;">
									<label>Senha:</label>
									<input type="password" class="form-control" id="emp_admin_senha" name="emp_admin_senha"  value="{$emp_admin_senha|default:''}">
								</div>
								<div style="width: 300px;">
									<label>Confirma senha:</label>
									<input type="password" class="form-control" id="emp_admin_senha2" name="emp_admin_senha2"  value="{$emp_admin_senha2|default:''}">
								</div>							
							</div>										
						{/if}						
					</div>	
					<div style="margin-top:30px;">
						<input type="submit" name="submit" {if $pagina->acao!='alterar'}value="cadastrar"{else}value="Alterar"{/if}id="salvar-nome" class="btn btn-success bg-primary" style="float:right">
					</div>					
				</form>
			</div>			
	</td>
    </tr>
</table>

<input type="hidden" id="usu_id" value="{$usu_id|default:''}">
<script type="text/javascript" src="{$pagina->base}js/formulario/usuarios.js"> </script>
{include file="rodape.tpl"}