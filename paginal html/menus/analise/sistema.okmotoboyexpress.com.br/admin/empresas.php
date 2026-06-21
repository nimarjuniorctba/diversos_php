<?php



$aempresas = new acesso_empresas();



if(isset($_POST['submit'])){
//var_dump($_POST);exit;
    
    $ieIsento = isset($_POST['emp_pj_ie_isento'])?  $_POST['emp_pj_ie_isento'] :'n';        
    
    $empresa    =   new Empresas();
    $empresa->setTipoCadastro($_POST['meu_tipo_cad']);
    $empresa->setPfNome($_POST['emp_pf_nome']);
    $empresa->setPfCpf($_POST['emp_pf_cpf']);
    $empresa->setPfDtNascimento($_POST['emp_pf_dt_nascimento']);
    $empresa->setPjCnpj($_POST['emp_pj_cnpj']);
    $empresa->setPjFantansia($_POST['emp_pj_fantasia']);
    $empresa->setPjRazao($_POST['emp_pj_razao']);
    $empresa->setPjIe($_POST['emp_pj_ie']);
    $empresa->setPjIeIsento($ieIsento);
    $empresa->setPjResponsavel($_POST['emp_pj_responsavel']);
    $empresa->setCep($_POST['emp_cep']);
    $empresa->setRua($_POST['emp_rua']);
    $empresa->setNumero($_POST['emp_numero']);
    $empresa->setComplemento($_POST['emp_complemento']);
    $empresa->setBairro($_POST['emp_bairro']);
    $empresa->setCidade($_POST['emp_cidade']);
    $empresa->setEstado($_POST['emp_estado']);
    $empresa->setTelefone($_POST['emp_telefone']);
    $empresa->setCelular($_POST['emp_celular']);
    $empresa->setFacebook($_POST['emp_facebook']);
    $empresa->setInstagram($_POST['emp_instagram']);
    $empresa->setEmail($_POST['emp_emails']);
    
    if($_POST['submit']=='cadastrar'){
        
        $cadastra_empresa  =   $aempresas->cadastraDados($pdo, $empresa);
        if($cadastra_empresa){
             $msg    =   '<div class="alert alert-success" role="alert">';
             $msg    .=   '<div><span>Cadastrado com sucesso.</span></div>';
             $msg    .=   '</div>';
        }else{
             $msg     =   '<div class="alert alert-danger" role="alert">';
             $msg    .=   'Não foi possivel realizar o cadastro verifique os dados.';
             $msg    .=   '</div>';                          
             
             $smarty->assign('emp_tipo_cadastro','f');
             $smarty->assign('emp_tipo_cadastro',$_POST['meu_tipo_cad']);
             $smarty->assign('emp_pf_nome',$_POST['emp_pf_nome']);
             $smarty->assign('emp_pf_cpf',$_POST['emp_pf_cpf']);
             $smarty->assign('emp_pf_dt_nascimento',$_POST['emp_pf_dt_nascimento']);
             $smarty->assign('emp_pj_cnpj',$_POST['emp_pj_cnpj']);
             $smarty->assign('emp_pj_fantasia',$_POST['emp_pj_fantasia']);
             $smarty->assign('emp_pj_razao',$_POST['emp_pj_razao']);
             $smarty->assign('emp_pj_ie',$_POST['emp_pj_ie']);
          //   $smarty->assign('emp_pj_ie_isento',$_POST['emp_pj_ie']);
             $smarty->assign('emp_pj_responsavel',$_POST['emp_pj_responsavel']);
             $smarty->assign('emp_cep',$_POST['emp_cep']);
             $smarty->assign('emp_rua',$_POST['emp_rua']);
             $smarty->assign('emp_numero',$_POST['emp_numero']);
             $smarty->assign('emp_complemento',$_POST['emp_complemento']);
             $smarty->assign('emp_bairro',$_POST['emp_bairro']);
             $smarty->assign('emp_cidade',$_POST['emp_cidade']);
             $smarty->assign('emp_estado',$_POST['emp_estado']);
             $smarty->assign('emp_telefone',$_POST['emp_telefone']);
             $smarty->assign('emp_celular',$_POST['emp_celular']);
             $smarty->assign('emp_facebook',$_POST['emp_facebook']);
             $smarty->assign('emp_instagram',$_POST['emp_instagram']);
             $smarty->assign('emp_emails',$_POST['emp_emails']);

        }           
    }else{
        
        $empresa->setId($_POST['emp_id']);        
        $altera_empresa  =   $aempresas->atualizaDados($pdo, $empresa); 
        if($altera_empresa){
             $msg    =   '<div class="alert alert-success" role="alert">';
             $msg    .=   '<div><span>Alterado com sucesso.</span></div>';
             $msg    .=   '</div>';
        }else{
             $msg     =   '<div class="alert alert-danger" role="alert">';
             $msg    .=   'Não foi possivel realizar o alteração verifique os dados.';
             $msg    .=   '</div>';                          
             
             $smarty->assign('emp_tipo_cadastro',$_POST['meu_tipo_cad']);
             $smarty->assign('emp_pf_nome',$_POST['emp_pf_nome']);
             $smarty->assign('emp_pf_cpf',$_POST['emp_pf_cpf']);
             $smarty->assign('emp_pf_dt_nascimento',$_POST['emp_pf_dt_nascimento']);
             $smarty->assign('emp_pj_cnpj',$_POST['emp_pj_cnpj']);
             $smarty->assign('emp_pj_fantasia',$_POST['emp_pj_fantasia']);
             $smarty->assign('emp_pj_razao',$_POST['emp_pj_razao']);
             $smarty->assign('emp_pj_ie',$_POST['emp_pj_ie']);
             $smarty->assign('emp_pj_responsavel',$_POST['emp_pj_responsavel']);
             $smarty->assign('emp_cep',$_POST['emp_cep']);
             $smarty->assign('emp_rua',$_POST['emp_rua']);
             $smarty->assign('emp_numero',$_POST['emp_numero']);
             $smarty->assign('emp_complemento',$_POST['emp_complemento']);
             $smarty->assign('emp_bairro',$_POST['emp_bairro']);
             $smarty->assign('emp_cidade',$_POST['emp_cidade']);
             $smarty->assign('emp_estado',$_POST['emp_estado']);
             $smarty->assign('emp_telefone',$_POST['emp_telefone']);
             $smarty->assign('emp_celular',$_POST['emp_celular']);
             $smarty->assign('emp_facebook',$_POST['emp_facebook']);
             $smarty->assign('emp_instagram',$_POST['emp_instagram']);
             $smarty->assign('emp_emails',$_POST['emp_emails']);
        }        
    }
    //echo "d:".$empresa->getTipoCadastro();exit;    
}

if($acao!='cadastrar' &&    $acao!='alterar'){
 
    $lista_empresas  =   $aempresas->listarDados($pdo, 'todos');
    if(is_array($lista_empresas)){
        for($re=0;$re<count($lista_empresas);$re++){
            $empresa = $lista_empresas[$re];            
            $array_clientes[$re]["idurl"]               =  $empresa->getId();
            $array_clientes[$re]["id"]                  =  str_pad($empresa->getId(),6,'0',STR_PAD_LEFT);
            $array_clientes[$re]["tipo_cadastro"]       =  $empresa->getTipoCadastro()=='j' ? 'Pessoa Juridica':'Pessoa Fisica';
            $array_clientes[$re]["documeto"]            =  $empresa->getTipoCadastro()=='j' ? $empresa->getPjCnpj() : $empresa->getPfCpf();
            $array_clientes[$re]["nome"]                =  $empresa->getTipoCadastro()=='j' ? $empresa->getPjFantansia() : $empresa->getPfNome();
            $array_clientes[$re]["razao"]               =  $empresa->getTipoCadastro()=='j' ? $empresa->getPjRazao() : '';
            $array_clientes[$re]["data_cadastro"]       =  $empresa->getDtCadastro();
            $array_clientes[$re]["status"]              =  $empresa->getStatus()=='a'?'Ativo':'Inativo';
            $smarty->assign('array_empresa',$array_clientes);
        }
        $smarty->assign("qte_registros", count($lista_empresas));    
    }else{
        $smarty->assign("qte_registros", '0');                
    }    
        
}else if($acao=='alterar' && $valor!=''){
    $retorna_empresa = $aempresas->retornaDados($pdo, 'id', $valor);
    if(is_object($retorna_empresa)){       
        $smarty->assign('emp_tipo_cadastro',$retorna_empresa->getTipoCadastro());
        //$smarty->assign('emp_id',str_pad($retorna_empresa->getId(), 10, "0", STR_PAD_LEFT));
        $smarty->assign('emp_id',$retorna_empresa->getId());
        $smarty->assign('emp_pf_nome',$retorna_empresa->getPfNome());
        $smarty->assign('emp_pf_cpf',$retorna_empresa->getPfCpf());
        $smarty->assign('emp_pf_dt_nascimento',$retorna_empresa->getPfDtNascimento());
        $smarty->assign('emp_pj_cnpj',$retorna_empresa->getPjCnpj());
        $smarty->assign('emp_pj_fantasia',$retorna_empresa->getPjFantansia());
        $smarty->assign('emp_pj_razao',$retorna_empresa->getPjRazao());
        $smarty->assign('emp_pj_ie',$retorna_empresa->getPjIe());
        $smarty->assign('emp_pj_ie_isento',$retorna_empresa->getPjIeIsento());
        $smarty->assign('emp_pj_responsavel',$retorna_empresa->getPjResponsavel());
        $smarty->assign('emp_cep',$retorna_empresa->getCep());
        $smarty->assign('emp_rua',$retorna_empresa->getRua());
        $smarty->assign('emp_numero',$retorna_empresa->getNumero());
        $smarty->assign('emp_complemento',$retorna_empresa->getComplemento());
        $smarty->assign('emp_bairro',$retorna_empresa->getBairro());
        $smarty->assign('emp_cidade',$retorna_empresa->getCidade());
        $smarty->assign('emp_estado',$retorna_empresa->getEstado());
        $smarty->assign('emp_telefone',$retorna_empresa->getTelefone());
        $smarty->assign('emp_celular',$retorna_empresa->getCelular());
        $smarty->assign('emp_facebook',$retorna_empresa->getFacebook());
        $smarty->assign('emp_instagram',$retorna_empresa->getInstagram());
        $smarty->assign('emp_emails',$retorna_empresa->getEmail());
    }
    
    unset($re);
    unset($lista_empresas);
    unset($retorna_empresa);     
 
}

if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	 


switch($acao){
       
    case 'alterar'://echo "fim";exit;
            $pagina->titulo = "Alterar dados da empresas";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('empresas/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar Empresas";
            $smarty->assign('emp_tipo_cadastro','f');
            $smarty->assign('pagina',$pagina);
            $smarty->display('empresas/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aempresas->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."empresas");            
            }
    default:
            $pagina->titulo = "Lista de Empresas";
            $smarty->assign('pagina',$pagina);
            $smarty->display('empresas/lista.tpl');
            break;		
}

