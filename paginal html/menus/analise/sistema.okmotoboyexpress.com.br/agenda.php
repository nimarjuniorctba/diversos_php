<?php
//echo "dsdsdsds";exit;


if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do Produtos";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('agenda/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar Produtos";
            $smarty->assign('pagina',$pagina);
            $smarty->display('agenda/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aclientes->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."clientes");            
            }
    default:
            $pagina->titulo = "Agenda";
            $smarty->assign('pagina',$pagina);
            $smarty->display('agenda/agenda.tpl');
            break;		
}
