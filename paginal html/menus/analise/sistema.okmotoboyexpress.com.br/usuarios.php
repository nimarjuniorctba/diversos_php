<?php

$aempresa_admin                 =       new acesso_empresa_admin();
$aempresas                      =       new acesso_empresas();

if(isset($_POST['submit'])){
//var_dump($_POST);//exit;
      
    $empresa_admin    =   new Empresa_admin();
    $empresa_admin->setNome($_POST['emp_admin_nome']);
    $empresa_admin->setEmail($_POST['emp_admin_email']);
    $empresa_admin->setSenha($_POST['emp_admin_senha']);
    $empresa_admin->setId($valor);
    $empresa_admin->setEmpresa($session->getValor('adm_emp_id'));
    
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
      //  echo "[".$empresa_admin->getSenha()."]";exit;
       // $empresa_admin->setId($session->getValor('adm_id'));        
       // var_dump($empresa_admin);echo"<hr>";
        //exit;
        $altera_empresa_admin  =   $aempresa_admin->atualizaDados($pdo, $empresa_admin);
      //  var_dump($altera_empresa_admin);exit;
        //exit;
        if($altera_empresa_admin){
            $msg    =   '<div class="alert alert-success" role="alert"><div><span>Alterado com sucesso.</span></div></div>';
        }else{
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar a alteração, verifique os dados.</div>';                          
            $smarty->assign('emp_admin_nome',$_POST['emp_admin_nome']);
            $smarty->assign('emp_admin_email',$_POST['emp_admin_email']);
            $smarty->assign('emp_admin_empresa',$_POST['emp_admin_nome']);
        }        
    }
 
}
//echo "EMPRESA:".$session->getValor('adm_emp_id');exit;

if($acao!='cadastrar' &&  $acao!='alterar'){
    $lista_clientes  =   $aempresa_admin->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));
    
    if(is_array($lista_clientes)){ 
        for($re=0;$re<count($lista_clientes);$re++){ 
            $array_empresa_admin[$re]["idurl"]              =   $lista_clientes[$re]->getId();                    
            $array_empresa_admin[$re]["id"]                 =   str_pad($lista_clientes[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_empresa_admin[$re]["nome"]               =   $lista_clientes[$re]->getNome();
            $array_empresa_admin[$re]["email"]              =   $lista_clientes[$re]->getEmail();
           // $array_empresa_admin[$re]["dt_cadastro"]      =   $lista_clientes[$re]->getDtCadastro();
            $array_empresa_admin[$re]["dt_cadastro"]        =   $opc->inverteDateTime($lista_clientes[$re]->getDtCadastro());            
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

            $smarty->assign('array_usuarios',$array_empresa_admin);
                       
        }
            $smarty->assign('qte_registros',count($lista_clientes));
    }  
}else if($acao=='alterar' && $valor!=''){
    $retorna_empresa_admin = $aempresa_admin->retornaDados($pdo, 'id', $valor);
    //var_dump($retorna_empresa_admin);exit;
    if(is_object($retorna_empresa_admin)){       
        $smarty->assign('emp_admin_id',$retorna_empresa_admin->getId());
        $smarty->assign('emp_admin_dt_cadastro',$opc->inverteDateTime($retorna_empresa_admin->getDtCadastro()));
        $smarty->assign('emp_admin_nome',$retorna_empresa_admin->getNome());        
        $smarty->assign('emp_admin_email',$retorna_empresa_admin->getEmail());    
       // $smarty->assign('emp_admin_empresa',$retorna_empresa_admin->getEmpresa());    
        $smarty->assign('emp_admin_status',$retorna_empresa_admin->getStatus()=='a'?'Ativo':'Inativo');    
        
            /* Não sei pq tava listando comentei se nao der erro apagar esse trecho
             *   $lista_empresas  =   $aempresas->listarDados($pdo, 'todos');
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
              }      */    
        
    }
    
    unset($re);
    unset($retorna_empresa_admin); 
    unset($array_empresas); 
   
}else if($acao=='cadastrar'){
    //echo "cadastro";exit;
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
        $pagina->titulo = "Alterar dados do usuário da empresa";
        $smarty->assign('pagina',$pagina);                 
        $smarty->display('usuarios/formulario.tpl');
        break;	
    case 'cadastrar':
        $pagina->titulo = "Cadastrar usuário na empresa";
        $smarty->assign('pagina',$pagina);
        $smarty->display('usuarios/formulario.tpl');
        break;							
    case 'excluir':
        $resultado = $aempresa_admin->Deletar($pdo,$valor); 
        if($resultado){
            header("Location: ".$pagina->base."clientes");            
        }
    default:
        $pagina->titulo = "Lista de usuários da empresa";
        $smarty->assign('pagina',$pagina);
        $smarty->display('usuarios/lista.tpl');
        break;		
}
