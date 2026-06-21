<?php


$aempresa_admin                 =       new acesso_empresa_admin();
$aempresas                      =       new acesso_empresas();

if(isset($_POST['submit'])){
//var_dump($_POST);//exit;
      
    $empresa_admin    =   new Empresa_admin();
    $empresa_admin->setNome($_POST['emp_admin_nome']);
    $empresa_admin->setEmail($_POST['emp_admin_email']);
    $empresa_admin->setSenha($_POST['emp_admin_senha']);
    $empresa_admin->setEmpresa($_POST['emp_admin_empresa']);
    
    if($_POST['submit']=='cadastrar'){
        
        $cadastra_empresa_admin  =   $aempresa_admin->cadastraDados($pdo, $empresa_admin);
        if($cadastra_empresa_admin){
             $msg    =   '<div class="alert alert-success" role="alert"><div><span>Cadastrado com sucesso.</span></div></div>';
        }else{
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o cadastro verifique os dados.</div>';                          
            $smarty->assign('emp_admin_nome',$_POST['emp_admin_nome']);
            $smarty->assign('emp_admin_email',$_POST['emp_admin_email']);
            $smarty->assign('emp_admin_empresa',$_POST['emp_admin_nome']);            
        }           
    }else{
        
        $empresa_admin->setId($_POST['emp_admin_id']);        
        $altera_empresa_admin  =   $aempresa_admin->atualizaDados($pdo, $empresa_admin); 
        if($altera_empresa_admin){
            $msg    =   '<div class="alert alert-success" role="alert"><div><span>Alterado com sucesso.</span></div></div>';
        }else{
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o alteração verifique os dados.</div>';                          
            $smarty->assign('emp_admin_nome',$_POST['emp_admin_nome']);
            $smarty->assign('emp_admin_email',$_POST['emp_admin_email']);
            $smarty->assign('emp_admin_empresa',$_POST['emp_admin_nome']);
        }        
    }
 
}

if($acao!='cadastrar' &&  $acao!='alterar'){
    $lista_clientes  =   $aempresa_admin->listarDados($pdo, 'todos');
    if(is_array($lista_clientes)){ 
        for($re=0;$re<count($lista_clientes);$re++){ 
            $array_empresa_admin[$re]["idurl"]              =   $lista_clientes[$re]->getId();                    
            $array_empresa_admin[$re]["id"]                 =   str_pad($lista_clientes[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_empresa_admin[$re]["nome"]               =   $lista_clientes[$re]->getNome();
            $array_empresa_admin[$re]["login"]              =   $lista_clientes[$re]->getEmail();
            $array_empresa_admin[$re]["data_cadastro"]      =   $lista_clientes[$re]->getDtCadastro();
            $array_empresa_admin[$re]["status"]             =   $lista_clientes[$re]->getStatus()=='a'?'Ativo':'Inativo';               

            $retorna_empresa = $aempresas->retornaDados($pdo, 'id', $lista_clientes[$re]->getEmpresa());     
            if(is_object($retorna_empresa)){
                if($retorna_empresa->getTipoCadastro()=='f'){
                    $array_empresa_admin[$re]["fantasia"]           =   $retorna_empresa->getPfNome();
                    $array_empresa_admin[$re]["razao"]              =   '';
                }else{
                    $array_empresa_admin[$re]["fantasia"]           =   $retorna_empresa->getPjFantansia();
                    $array_empresa_admin[$re]["razao"]              =   $retorna_empresa->getPjRazao();                            
                }
            }else{
                $array_empresa_admin[$re]["fantasia"]           =   "SEM EMPRESA CADASTRADO";
                $array_empresa_admin[$re]["razao"]              =   " ";                            
            }

            $smarty->assign('array_empresa_admin',$array_empresa_admin);
                       
        }
            $smarty->assign('qte_registros',count($lista_clientes));
    }  
}else if($acao=='alterar' && $valor!=''){
    $retorna_empresa_admin = $aempresa_admin->retornaDados($pdo, 'id', $valor);
    if(is_object($retorna_empresa_admin)){       
        $smarty->assign('emp_admin_id',$retorna_empresa_admin->getId());
        $smarty->assign('emp_admin_dt_cadastro',$opc->inverteDateTime($retorna_empresa_admin->getDtCadastro()));
        $smarty->assign('emp_admin_nome',$retorna_empresa_admin->getNome());        
        $smarty->assign('emp_admin_email',$retorna_empresa_admin->getEmail());    
        $smarty->assign('emp_admin_empresa',$retorna_empresa_admin->getEmpresa());    
        $smarty->assign('emp_admin_status',$retorna_empresa_admin->getStatus()=='a'?'Ativo':'Inativo');    
        
    $lista_empresas  =   $aempresas->listarDados($pdo, 'todos');
    if(is_array($lista_empresas)){
        for($re=0;$re<count($lista_empresas);$re++){
            $empresa = $lista_empresas[$re];            
            $array_empresas[$re]["idurl"]               =  $empresa->getId();
            $array_empresas[$re]["id"]                  =  str_pad($empresa->getId(),6,'0',STR_PAD_LEFT);
            $array_empresas[$re]["nome"]                =  $empresa->getTipoCadastro()=='j' ? $empresa->getPjFantansia() : $empresa->getPfNome();

         //   echo $empresa->getTipoCadastro()=='j' ? $empresa->getPjFantansia() : $empresa->getPfNome();
            
            $smarty->assign('array_empresa',$array_empresas);
        }
        $smarty->assign("qte_registros", count($array_empresas));    
    }else{
        $smarty->assign("qte_registros", '0');                
    }          
        
    }
    
    unset($re);
    unset($retorna_empresa_admin); 
    unset($array_empresas); 
   
}else if($acao=='cadastrar'){
    $lista_empresas  =   $aempresas->listarDados($pdo, 'todos');
    if(is_array($lista_empresas)){
        for($re=0;$re<count($lista_empresas);$re++){
            $empresa = $lista_empresas[$re];            
            $array_empresas[$re]["idurl"]               =  $empresa->getId();
            $array_empresas[$re]["id"]                  =  str_pad($empresa->getId(),6,'0',STR_PAD_LEFT);
            $array_empresas[$re]["nome"]                =  $empresa->getTipoCadastro()=='j' ? $empresa->getPjFantansia() : $empresa->getPfNome();

         //   echo $empresa->getTipoCadastro()=='j' ? $empresa->getPjFantansia() : $empresa->getPfNome();
            
            $smarty->assign('array_empresa',$array_empresas);
        }
        $smarty->assign("qte_registros", count($array_empresas));    
    }else{
        $smarty->assign("qte_registros", '0');                
    }    
}


if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
        $pagina->titulo = "Alterar dados do usuario da empresas";
        $smarty->assign('pagina',$pagina);                 
        $smarty->display('admin_empresas/formulario.tpl');
        break;	
    case 'cadastrar':
        $pagina->titulo = "Cadastrar usuario na empresa";
        $smarty->assign('pagina',$pagina);
        $smarty->display('admin_empresas/formulario.tpl');
        break;							
    case 'excluir':
        $resultado = $aempresa_admin->Deletar($pdo,$valor); 
        if($resultado){
            header("Location: ".$pagina->base."clientes");            
        }
    default:
        $pagina->titulo = "Lista de usuarios das empresas";
        $smarty->assign('pagina',$pagina);
        $smarty->display('admin_empresas/lista.tpl');
        break;		
}
