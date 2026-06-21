<html>
<head>

	<title>{$pagina->empresa_nome}</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js"   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="   crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="{$pagina->base}css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<script type="text/javascript" src="{$pagina->base}js/jquery.mask.js"></script>
	<script type="text/javascript" src="{$pagina->base}js/geral.js"></script>

<head>
<body>
	<input type="hidden" id="host" value="{$pagina->base}">

	<div class="topo" style="display:inline-block;width:100%;height: 50px;">
		<div style="float:left;display:none;">            
		</div>	
		<div style="text-align: center;margin-top: 6px;">

		</div>	
		<div style="float: right;margin-right:30px;display:flex;">            
			<div style="background:#2d4a69;color:white;width:auto;padding: 8px;border-radius: 5px 0px 0px 5px;margin-right:0px;">{$pagina->mensagem_identificacao}</div>
			<div style="background:#2d4a69;color:white;width:auto;padding: 8px;border-radius: 0px 5px 5px 0px;"></div>            
		</div>
		<div style="clear:both;"></div>
		<div style="width:100%;display: none;justify-content: center;">
			<div style="background-color: #f3bab6;border-radius: 3px;width: 415px;text-align: center;line-height: 29px;color: #d74f4f;border: 1px dashed;"><a>Sua licença do sistema irá vencer em 10 dias, <a href="">Ver mais...</a></label></div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 67px;">
		<div style="height:100px;"></div>
		<div style="display:flex;">            
		<div class="menu">        
			<ul style="margin-left: 50px;">
				<li>
					<a href="{$pagina->base}/home"><img src="{$pagina->base}imagens/icones/home.png" style="width:25px;height: 25px;margin-right: 7px;">
					Home</a>
				</li>
				<li>
					<a href="{$pagina->base_cliente}/mapa"><img src="{$pagina->base}imagens/icones/home.png" style="width:25px;height: 25px;margin-right: 7px;">
					Mapa</a>
				</li>				
				<li style="display:none;">
					<a href="{$pagina->base}clientes/"><img src="{$pagina->base}imagens/icones/computador_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Home</a>
				</li>
				<li style="width:114px;">
					<img src="{$pagina->base}imagens/icones/cadastro_branco.png" style="width:25px;height: 25px;margin-right: 7px;">Modulos
					<ul>
						<a href="{$pagina->base}administradores/"><li>Administradores</li></a>
						<a href="{$pagina->base}condutores/"><li>Condutores</li></a>						
						<a href="{$pagina->base}empresas/"><li>Empresas</li></a>						
						<a href="{$pagina->base}usuarios-empresas/"><li>Usuarios de empresa</li></a>
					</ul>
				</li>
				<li>
					<img src="{$pagina->base}imagens/icones/config_branco.png" style="width:25px;height: 25px;margin-right: 7px;">
					Opções
					<ul>
					   <a href="{$pagina->base}meus-dados/"><li>Meus Dados</li></a>
					   <a href="{$pagina->base}administradores/"><li>Administradores</li></a>   
					</ul>                
				</li>
				<li>
					<a href="{$pagina->base}/admin/sair"><img src="{$pagina->base}imagens/icones/sair_branco.png" style="width:25px;height: 25px;margin-right: 7px;">
					Sair</a>
				</li>
			</ul>
		</div>
		</div>
	</nav>

	<input type="hidden" id="pagina_base" value="{$pagina->base}"> 
	<input type="hidden" id="base_upload" value="{$pagina->upload}"> 