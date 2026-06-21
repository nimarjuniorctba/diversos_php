<?php



if($acao!='cadastrar'   &&    $acao!='alterar'){
            
            $array_clientes[0]["idurl"]             =   '1';
            $array_clientes[0]["id"]                =   '1';
            $array_clientes[0]["pedido"]            =   '1';
            $array_clientes[0]["data"]              =   '08/07/2023';
            $array_clientes[0]["servico"]           =   'Sistema + Reserva Online + Website';
            $array_clientes[0]["valor"]             =   'R$2.158,92';
            $array_clientes[0]["forma_pgto"]        =   'Cartão';
            $array_clientes[0]["status"]            =   'Pago';
            $smarty->assign('array_clientes',$array_clientes);         
            $smarty->assign('qte_registros',1);

}



if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'visualizar':
            $pagina->titulo = "visualização de pedido";
            $smarty->assign('pagina',$pagina);
            $smarty->display('minhas_compras/formulario.tpl');
            break;							
    default:
            $pagina->titulo = "Minhas compras";
            $smarty->assign('pagina',$pagina);
        //    $smarty->assign('qte_registros','0');
            $smarty->display('minhas_compras/lista.tpl');
            break;		
}
