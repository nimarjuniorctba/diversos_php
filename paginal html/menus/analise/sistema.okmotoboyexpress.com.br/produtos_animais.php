<?php

$aclientes              =   new acesso_clientes();
$aclientes_enderecos    =   new acesso_clientes_enderecos();

$array_endereco[0]    =   Array(); 


if(isset($_POST['submit'])){

    $ieIsento = isset($_POST['emp_pj_ie_isento'])?  $_POST['emp_pj_ie_isento'] :'n';   
    
    $cliente    =   new Clientes();
    $cliente->setTipoCadastro($_POST['meu_tipo_cad']);
    $cliente->setPfNome($_POST['cli_pf_nome']);
    $cliente->setPfCpf($_POST['cli_pf_cpf']);
    $cliente->setPfDtNascimento($_POST['cli_pf_dt_nascimento']);
    $cliente->setPjCnpj($_POST['cli_pj_cnpj']);
    $cliente->setPjFantasia($_POST['cli_pj_fantasia']);
    $cliente->setPjRazao($_POST['cli_pj_razao']);
    $cliente->setPjIe($_POST['cli_pj_ie']);
    $cliente->setPjIeIsento($ieIsento);
    $cliente->setResponsavel($_POST['cli_pj_responsavel']);
    $cliente->setTelefone($_POST['cli_telefone']);
    $cliente->setCelular($_POST['cli_celular']);
    $cliente->setEmail($_POST['cli_email']);
    $cliente->setFacebook($_POST['cli_facebook']);
    $cliente->setInstagram($_POST['cli_instagram']);
    $cliente->setAdmin($session->getValor('adm_id'));
    $cliente->setEmpresa($session->getValor('adm_emp_id'));
     

    ##DEBUG
//    echo "<pre>";
//        var_dump($_REQUEST);
//    echo print_r($cliente,true);exit;
//    echo "</pre>";
    ##DEBUG
    
    
    if($_POST['submit']=='cadastrar'){
        $cadastra_cliente  =   $aclientes->cadastraDados($pdo, $cliente);
        if($cadastra_cliente){
            
            $endereco = new Clientes_enderecos();                
            $endereco->setCep(isset($_POST['cli_end_cep'])?$_POST['cli_end_cep']:'');
            $endereco->setRua(isset($_POST['cli_end_rua'])?$_POST['cli_end_rua']:'');
            $endereco->setNumero(isset($_POST['cli_end_numero'])?$_POST['cli_end_numero']:'');
            $endereco->setComplemento(isset($_POST['cli_end_complemento'])?$_POST['cli_end_complemento']:'');
            $endereco->setBairro(isset($_POST['cli_end_bairro'])?$_POST['cli_end_bairro']:'');
            $endereco->setCidade(isset($_POST['cli_end_cidade'])?$_POST['cli_end_cidade']:'');
            $endereco->setEstado(isset($_POST['cli_end_estado'])?$_POST['cli_end_estado']:'');
            $endereco->setCliente($cadastra_cliente);                                        
            $cadastra = $aclientes_enderecos->cadastraDados($pdo, $endereco);
                if($cadastra!=false){                      
                    $msg     =   '<div class="alert alert-success" role="alert">Cadastrado com sucesso.</div>';
                }else{
                    $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel cadastrar o endereço.</div>';
                }            
        }else{
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o cadastro verifique os dados.</div>';                          
            $smarty->assign('meu_tipo_cad',$_POST['meu_tipo_cad']);
            $smarty->assign('cli_pf_nome',$_POST['cli_pf_nome']);
            $smarty->assign('cli_pf_cpf',$_POST['cli_pf_cpf']);
            $smarty->assign('cli_pf_dt_nascimento',$_POST['cli_pf_dt_nascimento']);
            $smarty->assign('cli_pj_cnpj',$_POST['cli_pj_cnpj']);
            $smarty->assign('cli_pj_fantasia',$_POST['cli_pj_fantasia']);
            $smarty->assign('cli_pj_razao',$_POST['cli_pj_razao']);
            $smarty->assign('cli_pj_ie',$_POST['cli_pj_ie']);
            $smarty->assign('cli_pj_responsavel',$_POST['cli_pj_responsavel']);
            $smarty->assign('cli_telefone',$_POST['cli_telefone']);
            $smarty->assign('cli_celular',$_POST['cli_celular']);
            $smarty->assign('cli_email',$_POST['cli_email']);
            $smarty->assign('cli_facebook',$_POST['cli_facebook']);
            $smarty->assign('cli_instagram',$_POST['cli_instagram']);
        }           
    }else{
        $cliente->setId($_POST['cli_idurl']);
        $altera_cliente  =   $aclientes->atualizaDados($pdo, $cliente); 
        if($altera_cliente){
            $msg    =   '<div class="alert alert-success" role="alert"><div>Alterado com sucesso.</div></div>';
        }else{
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o alteração verifique os dados.</div>';
                          
            $smarty->assign('meu_tipo_cad',$_POST['meu_tipo_cad']);
            $smarty->assign('cli_pf_nome',$_POST['cli_pf_nome']);
            $smarty->assign('cli_pf_cpf',$_POST['cli_pf_cpf']);
            $smarty->assign('cli_pf_dt_nascimento',$_POST['cli_pf_dt_nascimento']);
            $smarty->assign('cli_pj_cnpj',$_POST['cli_pj_cnpj']);
            $smarty->assign('cli_pj_fantasia',$_POST['cli_pj_fantasia']);
            $smarty->assign('cli_pj_razao',$_POST['cli_pj_razao']);
            $smarty->assign('cli_pj_ie',$_POST['cli_pj_ie']);
            $smarty->assign('cli_pj_responsavel',$_POST['cli_pj_responsavel']);
            $smarty->assign('cli_telefone',$_POST['cli_telefone']);
            $smarty->assign('cli_celular',$_POST['cli_celular']);
            $smarty->assign('cli_email',$_POST['cli_email']);
            $smarty->assign('cli_facebook',$_POST['cli_facebook']);
            $smarty->assign('cli_instagram',$_POST['cli_instagram']);
             
        }        
    }      
}

if($acao=='alterar' && $valor!=''){
    $retorna_cliente = $aclientes->retornaDados($pdo, 'id', $valor);
    if(is_object($retorna_cliente)){       
        $smarty->assign('cli_idurl',$retorna_cliente->getId());
        $smarty->assign('meu_tipo_cad',$retorna_cliente->getTipoCadastro());
        $smarty->assign('cli_pf_nome',$retorna_cliente->getPfNome());
        $smarty->assign('cli_pf_cpf',$retorna_cliente->getPfCpf());
        $smarty->assign('cli_pf_dt_nascimento',$retorna_cliente->getPfDtNascimento());
        $smarty->assign('cli_pj_cnpj',$retorna_cliente->getPjCnpj());
        $smarty->assign('cli_pj_fantasia',$retorna_cliente->getPjFantasia());
        $smarty->assign('cli_pj_razao',$retorna_cliente->getPjRazao());
        $smarty->assign('cli_pj_ie',$retorna_cliente->getPjIe());
        $smarty->assign('ie_pj_isento',$retorna_cliente->getPjIeIsento());
        $smarty->assign('cli_pj_responsavel',$retorna_cliente->getResponsavel());        
        $smarty->assign('cli_telefone',$retorna_cliente->getTelefone());        
        $smarty->assign('cli_celular',$retorna_cliente->getCelular());        
        $smarty->assign('cli_email',$retorna_cliente->getEmail());        
        $smarty->assign('cli_facebook',$retorna_cliente->getFacebook());        
        $smarty->assign('cli_instagram',$retorna_cliente->getInstagram());     
        
        //Lista endereços
        $lista_endereco = $aclientes_enderecos->listarDados($pdo, 'cliente', $valor);
        if(is_array($lista_endereco)){
            
            for($r=0;$r<count($lista_endereco);$r++){
                
                $endereco = $lista_endereco[$r];                
                $array_endereco[$r]["id"]        =   $endereco->getId();
                $array_endereco[$r]["rua"]       =   $endereco->getRua();
                $array_endereco[$r]["numero"]    =   $endereco->getNumero();
                $array_endereco[$r]["cep"]       =   $endereco->getCep();
                $array_endereco[$r]["bairro"]    =   $endereco->getBairro();
                $array_endereco[$r]["cidade"]    =   $endereco->getCidade();
                $array_endereco[$r]["estado"]    =   $endereco->getEstado();                
                
            }
            $smarty->assign('endereco',$array_endereco);  
            $smarty->assign('qtde_endereco',count($lista_endereco)); 
        }  
    }
    
    
}else if($acao!='cadastrar'   &&    $acao!='alterar'){
    
    $lista_clientes  =   $aclientes->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));
    if(is_array($lista_clientes)){
        for($re=0;$re<count($lista_clientes);$re++){
            
            $array_clientes[$re]["idurl"]           =   $lista_clientes[$re]->getId();
            $array_clientes[$re]["id"]              =   str_pad($lista_clientes[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_clientes[$re]["nome"]            =   $lista_clientes[$re]->getPfNome();
            $array_clientes[$re]["email"]           =   $lista_clientes[$re]->getEmail();
            $array_clientes[$re]["celular"]         =   $lista_clientes[$re]->getCelular();
            $array_clientes[$re]["dt_cadastro"]     =   $opc->inverteDateTime($lista_clientes[$re]->getDtCadastro());
            $array_clientes[$re]["status"]          =   $lista_clientes[$re]->getStatus()=='a'?'Ativo':'Inativo';
            $smarty->assign('array_clientes',$array_clientes);         
        }
            $smarty->assign('qte_registros',count($lista_clientes));
    }  
}


if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do Animal";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('produtos_animais/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar Animal";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_animais/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aclientes->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."clientes");            
            }
    default:
            $pagina->titulo = "Lista de animais";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_animais/lista.tpl');
            break;		
}
