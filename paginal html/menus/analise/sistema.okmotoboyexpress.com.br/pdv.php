<?php

$smarty->assign('msg',$session->getValor('msg'));
$session->unsetValor('msg');

$status_caixa = 'Aberto';
$smarty->assign('status_caixa', $status_caixa);

switch($opcao){
        case 'caixa':
                $smarty->assign('titulo','Caixa');	
		$smarty->display($acao.'/caixa.tpl');
		break;
        case 'situacao-geral':
                $smarty->assign('titulo','Situação Geral do Caixa');	
		$smarty->display($acao.'/situacao-geral.tpl');
		break;
        case 'historico':		
                $smarty->assign('titulo','Histórico do Caixa');	
		$smarty->display($acao.'/lista.tpl');
		break;
        case 'atualizar-saldo':		
                $smarty->assign('titulo','Atualizar Saldo do Caixa');	
		$smarty->display($acao.'/formulario.tpl');
		break;
            
}

//echo "[".$acao."]";exit;

if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do Estoque";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('pdv/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar Estoque de Produto";
            $smarty->assign('pagina',$pagina);
            $smarty->display('pdv/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aclientes->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."clientes");            
            }
    default:
            $pagina->titulo = "Lista de Produtos com estoque";
            $smarty->assign('pagina',$pagina);
            $smarty->display('pdv/caixa.tpl');
            break;		
}
