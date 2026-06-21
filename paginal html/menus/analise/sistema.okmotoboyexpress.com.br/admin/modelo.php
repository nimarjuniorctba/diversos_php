<?php

	include 'smarty/config.ini.php';
	
	$a=isset($_GET['id'])?$_GET['id']:'listar';
	

	if($a==1){
		$acao='listar';
	}else if($a==2){
		$acao='cadastrar';
	}else{
		$acao='alterar';
	}	

	$pagina =   new stdClass();


	$pagina->empresa_nome =   "Modelo 001";
	$pagina->acao = $acao;
	
	
	
	switch($acao){
			case 'cadastrar':
					$pagina->titulo = "Cadastrar cliente";
					$smarty->assign('pagina',$pagina);
					$smarty->display('modelo/formulario.tpl');
					break;			
			case 'alterar':
					$pagina->titulo = "Alterar dados do cliente";
					$smarty->assign('pagina',$pagina);
					$smarty->display('modelo/formulario.tpl');
					break;							
			default:
					$pagina->titulo = "Lista de clientes";
					$smarty->assign('pagina',$pagina);
					$smarty->display('modelo/lista.tpl');
					break;		
	}
