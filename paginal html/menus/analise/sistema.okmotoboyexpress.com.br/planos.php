<?php

$aclientes              =   new acesso_clientes();
$aclientes_enderecos    =   new acesso_clientes_enderecos();

$array_endereco[0]    =   Array(); 








if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do Clientes";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('planos/formulario.tpl');
            break;	
    default:
            $pagina->titulo = "Planos";
            $smarty->assign('pagina',$pagina);
            $smarty->display('planos/planos.tpl');
            break;		
}
