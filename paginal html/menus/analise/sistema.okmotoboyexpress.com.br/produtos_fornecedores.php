<?php

$aprodutos_categorias      =   new acesso_produtos_categorias();
$aprodutos_fornecedores    =   new acesso_produtos_fornecedores();


if(isset($_POST['submit'])){

    $fornecedores    =   new produtos_fornecedores();
    $fornecedores->setNome($_POST['for_nome']);
    $fornecedores->setCnpj($_POST['for_cnpj']);
    $fornecedores->setEmail($_POST['for_email']);
    $fornecedores->setTelefone($_POST['for_telefone']);
    $fornecedores->setCelular($_POST['for_celular']);
    $fornecedores->setDescricao($_POST['for_descricao']);
    $fornecedores->setCategoria($_POST['for_cat_id']);
    $fornecedores->setEmpresa($session->getValor('adm_emp_id'));


    
    if($_POST['submit']=='Cadastrar'){
        $cadastra_fornecedores  =   $aprodutos_fornecedores->cadastraDados($pdo, $fornecedores);
        if($cadastra_fornecedores){
                   
            $msg     =   '<div class="alert alert-success" role="alert">Cadastrado com sucesso.</div>';
            
        }else{
            
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o cadastro verifique os dados.</div>';                          
            $smarty->assign('for_nome',$_POST['for_nome']);
            $smarty->assign('for_cnpj',$_POST['for_cnpj']);
            $smarty->assign('for_email',$_POST['for_email']);
            $smarty->assign('for_telefone',$_POST['for_telefone']);
            $smarty->assign('for_celular',$_POST['for_celular']);
            $smarty->assign('for_descricao',$_POST['for_descricao']);
            $smarty->assign('for_cat_id',$_POST['for_cat_id']);
        }           
    }else{
        
        $fornecedores->setId($_POST['for_idurl']);
        $fornecedores->setStatus($_POST['for_status']);
        $altera_fornecedores  =   $aprodutos_fornecedores->atualizaDados($pdo, $fornecedores); 
        if($altera_fornecedores){
            
            $msg    =   '<div class="alert alert-success" role="alert"><div>Alterado com sucesso.</div></div>';
            
        }else{
            
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o alteração verifique os dados.</div>';                         
            $smarty->assign('for_nome',$_POST['for_nome']);
            $smarty->assign('for_cnpj',$_POST['for_cnpj']);
            $smarty->assign('for_email',$_POST['for_email']);
            $smarty->assign('for_telefone',$_POST['for_telefone']);
            $smarty->assign('for_celular',$_POST['for_celular']);
            $smarty->assign('for_descricao',$_POST['for_descricao']);
            $smarty->assign('for_cat_id',$_POST['for_cat_id']);
             
        }        
    }      
}

if($acao=='alterar' && $valor!=''){
    $retorna_fornecedor = $aprodutos_fornecedores->retornaDados($pdo, 'id', $valor);
    if(is_object($retorna_fornecedor)){       
        $smarty->assign('for_idurl',$retorna_fornecedor->getId());
        $smarty->assign('for_nome',$retorna_fornecedor->getNome());
        $smarty->assign('for_cnpj',$retorna_fornecedor->getCnpj());
        $smarty->assign('for_email',$retorna_fornecedor->getEmail());
        $smarty->assign('for_telefone',$retorna_fornecedor->getTelefone());
        $smarty->assign('for_celular',$retorna_fornecedor->getCelular());
        $smarty->assign('for_descricao',$retorna_fornecedor->getDescricao());
        $smarty->assign('for_cat_id',$retorna_fornecedor->getCategoria());   
        $smarty->assign('for_status',$retorna_fornecedor->getStatus());  
    }
    
    
}else if($acao!='cadastrar'   &&    $acao!='alterar'){
    
    $lista_fornecedor  =   $aprodutos_fornecedores->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));
    if(is_array($lista_fornecedor)){
        for($re=0;$re<count($lista_fornecedor);$re++){
            
            $array_fornecedor[$re]["idurl"]           =   $lista_fornecedor[$re]->getId();
            $array_fornecedor[$re]["id"]              =   str_pad($lista_fornecedor[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_fornecedor[$re]["nome"]            =   $lista_fornecedor[$re]->getNome();
            
          //  echo '['.$lista_fornecedor[$re]->getCategoria().']';
            
            $retorna_categoria_nome = $aprodutos_categorias->retornaDados($pdo, 'id', $lista_fornecedor[$re]->getCategoria());
            $array_fornecedor[$re]["categoria"]       =   $retorna_categoria_nome->getNome();//s$lista_fornecedor[$re]->getCategoria();
          //  $array_fornecedor[$re]["categoria"]       =   "categoria";
            $array_fornecedor[$re]["celular"]         =   $lista_fornecedor[$re]->getCelular();
            $array_fornecedor[$re]["dt_cadastro"]     =   $opc->inverteDateTime($lista_fornecedor[$re]->getDtCadastro());
            $array_fornecedor[$re]["status"]          =   $lista_fornecedor[$re]->getStatus()=='a'?'Ativo':'Inativo';
            $smarty->assign('array_fornecedor',$array_fornecedor);         
        }
            $smarty->assign('qte_registros',count($lista_fornecedor));
    }  
}

//Lista Categorias para a tela cadastrar ou alterar
if($acao=='cadastrar'   ||    $acao=='alterar'){

    $lista_produtos_categorias  =   $aprodutos_categorias->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));
    if(is_array($lista_produtos_categorias)){
        
        if($acao=='alterar'){
            $produto_categoria["categoria"]            =   $retorna_fornecedor->getCategoria();
            $smarty->assign('produto_categoria',$produto_categoria);
        }

        for($re=0;$re<count($lista_produtos_categorias);$re++){
            
            $array_produtos_categorias[$re]["idurl"]           =   $lista_produtos_categorias[$re]->getId();
            $array_produtos_categorias[$re]["id"]              =   $lista_produtos_categorias[$re]->getId();
            $array_produtos_categorias[$re]["nome"]            =   $lista_produtos_categorias[$re]->getNome();
            $smarty->assign('array_produtos_categorias',$array_produtos_categorias);         
        }
                   
            $smarty->assign('qte_registros',count($lista_produtos_categorias));
    }  
}


if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do Fornecedor";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('produtos_fornecedores/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar Fornecedor";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_fornecedores/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aprodutos_fornecedores->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."produtos-fornecedores");            
            }
    default:
            $pagina->titulo = "Lista de Fornecedores";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_fornecedores/lista.tpl');
            break;		
}
