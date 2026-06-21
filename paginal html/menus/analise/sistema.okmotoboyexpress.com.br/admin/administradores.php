<?php

$aadministrador                 =       new acesso_administradores();

if(isset($_POST['submit'])){
    
    $administrador = new Administradores();
    $administrador->setId($valor);
    $administrador->setNome($_POST['adm_nome']);
    $administrador->setEmail($_POST['adm_email']);
    $administrador->setSenha(@$_POST['adm_senha']);

    
    if($_POST['submit']=='cadastrar'){
        $cadastra_usuario  =   $aadministrador->cadastraDados($pdo, $administrador);
        if($cadastra_usuario){
             $msg    =   '<div class="alert alert-success" role="alert">';
             $msg    .=   '<div class="fracasso"><span>Cadastrado com sucesso.</span></div>';
             $msg    .=   '</div>';
        }else{
             $msg     =   '<div class="alert alert-danger" role="alert">';
             $msg    .=   'Não foi possivel realizar o cadastro verifique os dados.';
             $msg    .=   '</div>';                          
             $smarty->assign('adm_nome',$_POST['adm_nome']);
             $smarty->assign('adm_email',$_POST['adm_email']);             
        }           
    }else{
        $altera_admin_empresa  =   $aadministrador->atualizaDados($pdo, $administrador); 
        if($altera_admin_empresa){
             $msg    =   '<div class="alert alert-success" role="alert">';
             $msg    .=   '<div class="fracasso"><span>Alterado com sucesso.</span></div>';
             $msg    .=   '</div>';
        }else{
             $msg     =   '<div class="alert alert-danger" role="alert">';
             $msg    .=   'Não foi possivel realizar o alteração verifique os dados.';
             $msg    .=   '</div>';                          
             $smarty->assign('adm_nome',$_POST['adm_nome']);
             $smarty->assign('adm_email',$_POST['adm_email']);
        }        
    }      
}

if($acao!='cadastrar'   &&    $acao!='alterar'){
    
    $lista_usuarios  =   $aadministrador->listarDados($pdo, 'todos');
    if(is_array($lista_usuarios)){
        for($re=0;$re<count($lista_usuarios);$re++){
            $array_usuarios[$re]["idurl"]               =   $lista_usuarios[$re]->getId();
            $array_usuarios[$re]["id"]                  =   str_pad($lista_usuarios[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_usuarios[$re]["nome"]                =   $lista_usuarios[$re]->getNome();
            $array_usuarios[$re]["email"]               =   $lista_usuarios[$re]->getEmail();                      
            $array_usuarios[$re]["status"]              =   $lista_usuarios[$re]->getStatus()=='a'?'Ativo':'Inativo';                      
            $array_usuarios[$re]["dt_cadastro"]         =   $opc->inverteDateTime($lista_usuarios[$re]->getDtCadastro());                      
            $smarty->assign('array_administradores',$array_usuarios);
        }
            $smarty->assign('qte_registros',count($lista_usuarios));
    }  
}else if($acao=='alterar' && $valor!=''){
    $retorna_usuario = $aadministrador->retornaDados($pdo, 'id', $valor);
    if(is_object($retorna_usuario)){       
        $smarty->assign('adm_id',$retorna_usuario->getId());
        $smarty->assign('adm_nome',$retorna_usuario->getNome());
        $smarty->assign('adm_email',$retorna_usuario->getEmail());    
        $smarty->assign('adm_status',$retorna_usuario->getStatus()=='a'?'Ativo':$retorna_usuario->getStatus());    
        $smarty->assign('adm_dt_cadastro',$opc->inverteDateTime($retorna_usuario->getDtCadastro()));        
    }   
    unset($re);
    unset($retorna_usuario);   
}


if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do usuario administrador";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('administradores/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar usuarios administradores";
            $smarty->assign('pagina',$pagina);
            $smarty->display('administradores/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aadministrador->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."administradores");            
            }
    default:
            $pagina->titulo = "Lista de usuarios administradores";
            $smarty->assign('pagina',$pagina);
            $smarty->display('administradores/lista.tpl');
            break;		
}
