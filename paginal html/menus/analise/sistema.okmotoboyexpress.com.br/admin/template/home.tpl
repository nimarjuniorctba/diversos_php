
{include file='topo.tpl'}

<br>
<br>
<br>

<div class="clear-both"></div>
<div class="centralizar">
    <div class="corpo">
        <div class="conteudo">
			<table class="table table-bordered table-striped table-hover " style="width: 98%;margin-left:1%;cursor: pointer;">
				<tr>
					<td>
						<h2><span>:: SEJA BEM VINDO A &Aacute;REA ADMINISTRATIVA</span></h2>
						<br>						
						<ul class="chamadas-home" style="list-style-type: none;display: flex;flex-wrap: wrap;">
					   
							<li style="margin-right: 20px;">
								<p style="font-weight: bold;font-size: 20px;" ><img src="{$pagina->base}imagens/icones/user_admins.png"  style="width:50px;height:50px;margin-right: 10px;" />Usu&aacute;rios</p>
								<div class="texto-chamada">Acesso r&aacute;pido para cadastro de usu&aacute;rios administrativos no sistema.</div>
								<span><a href="{$pagina->base}administradores/cadastrar/" style="margin-right: 18px;">&#8227; Cadastrar</a>  <a href="{$pagina->base}administradores/">&#8227; Listar</a></span>
							</li>
							<li style="margin-right: 10px;">
								<p style="font-weight: bold;font-size: 20px;width:316px;" ><img src="{$pagina->base}imagens/icones/empresa.png"  style="width:50px;height:50px;margin-right: 10px;" />Empresa</p>
								<div class="texto-chamada">Acesso r&aacute;pido para cadastro de empresas no sistema.</div>
								<span><a href="{$pagina->base}empresas/cadastrar/" style="margin-right: 18px;">&#8227; Cadastrar</a>  <a href="{$pagina->base}empresas/">&#8227; Listar</a></span>
							</li>
							<li style="margin-right: 10px;">
								<p style="font-weight: bold;font-size: 20px;" ><img src="{$pagina->base}imagens/icones/user_empresas.png"  style="width:50px;;height:50px;margin-right: 10px;" />Usu&aacute;rios de empresas</p>
								<div class="texto-chamada">Acesso r&aacute;pido para cadastro dos usu&aacute;rios de empresas no sistema.</div>
								<span><a href="{$pagina->base}usuarios-empresas/cadastrar/" style="margin-right: 18px;">&#8227; Cadastrar</a><a href="{$pagina->base}usuarios-empresas/">&#8227; Listar</a></span>
							</li>
							<li style="display:none;">
								<p style="font-weight: bold;font-size: 20px;" ><img src="{$pagina->base}imagens/icones/docs.png"  style="width:50px;;height:50px;margin-right: 10px;" />Contas Banc&aacute;rias</p>
								<div class="texto-chamada">Acesso r&aacute;pido para listagem das contas banc&aacute;rias.</div>
								<span><a href="contas-bancarias/listar/">&#8227; Listar</a></span>
							</li>				
						</ul>
					</td>				
				</tr>
			</table>			
        </div>
    </div>
</div>
<div class="clear-both"></div>
{include file='rodape.tpl'}