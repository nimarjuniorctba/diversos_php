<?php

$aprodutos              =   new acesso_produtos();


$aprodutos_categorias   =   new acesso_produtos_categorias();
$aprodutos_fornecedores =   new acesso_produtos_fornecedores();

//echo "fim";exit;
if(isset($_POST['submit'])){


    $produtos    =   new Produtos();
    $produtos->setTitulo($_POST['pro_titulo']);
    $produtos->setQuantidade($_POST['pro_quantidade']);
    $produtos->setEmpresa($session->getValor('adm_emp_id'));
     

    ##DEBUG
//    echo "<pre>";
//        var_dump($_REQUEST);
//    echo print_r($cliente,true);exit;
//    echo "</pre>";
    ##DEBUG
    

    if($_POST['submit']=='Cadastrar'){
        $cadastra_produtos  =   $aprodutos->cadastraDados($pdo, $produtos);
        if($cadastra_produtos){
                                             
            $msg     =   '<div class="alert alert-success" role="alert">Cadastrado com sucesso.</div>';
                      
        }else{
            
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o cadastro verifique os dados.</div>';                          
            $smarty->assign('pro_categoria',$_POST['pro_categoria']);
            $smarty->assign('pro_fornecedor',$_POST['pro_fornecedor']);
            $smarty->assign('pro_titulo',$_POST['pro_titulo']);
            $smarty->assign('pro_descricao',$_POST['pro_descricao']);
            $smarty->assign('pro_codigobaras',$_POST['pro_codigobaras']);
            $smarty->assign('pro_valor_custo',$_POST['pro_valor_custo']);
            $smarty->assign('pro_valor_venda',$_POST['pro_valor_venda']);
            $smarty->assign('pro_quantidade',$_POST['pro_quantidade']);
        }           
    }else{
        $produtos->setId($_POST['pro_idurl']);
        $produtos->setStatus($_POST['pro_status']);        
        $altera_produtos  =   $aprodutos->atualizaDados($pdo, $produtos); 
        if($altera_produtos){
            $msg    =   '<div class="alert alert-success" role="alert"><div>Alterado com sucesso.</div></div>';
        }else{
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o alteração verifique os dados.</div>';                          
            $smarty->assign('pro_categoria',$_POST['pro_categoria']);
            $smarty->assign('pro_fornecedor',$_POST['pro_fornecedor']);
            $smarty->assign('pro_titulo',$_POST['pro_titulo']);
            $smarty->assign('pro_descricao',$_POST['pro_descricao']);
            $smarty->assign('pro_codigobaras',$_POST['pro_codigobaras']);
            $smarty->assign('pro_valor_custo',$_POST['pro_valor_custo']);
            $smarty->assign('pro_valor_venda',$_POST['pro_valor_venda']);
            $smarty->assign('pro_quantidade',$_POST['pro_quantidade']);             
        }        
    }      
}

if($acao=='alterar' && $valor!=''){
    $retorna_produtos = $aprodutos->retornaDados($pdo, 'id', $valor);
    if(is_object($retorna_produtos)){  
        
        $smarty->assign('pro_idurl',$retorna_produtos->getId());
        $smarty->assign('pro_categoria',$retorna_produtos->getCategoria());
        $smarty->assign('pro_fornecedor',$retorna_produtos->getFornecedor());
        $smarty->assign('pro_titulo',$retorna_produtos->getTitulo());
        $smarty->assign('pro_status',$retorna_produtos->getStatus());
        $smarty->assign('pro_descricao',$retorna_produtos->getDescricao());
        $smarty->assign('pro_codigobaras',$retorna_produtos->getCodigoBarras());
        $smarty->assign('pro_valor_custo',$retorna_produtos->getValorCusto());
        $smarty->assign('pro_valor_venda',$retorna_produtos->getValorVenda());
        $smarty->assign('pro_quantidade',$retorna_produtos->getQuantidade());
                    
    }
      
    
}else if($acao!='cadastrar'   &&    $acao!='alterar'){
  
    $lista_produtos  =   $aprodutos->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));
    if(is_array($lista_produtos)){
        for($re=0;$re<count($lista_produtos);$re++){
            
            $array_produtos[$re]["idurl"]               =   $lista_produtos[$re]->getId();
            $array_produtos[$re]["id"]                  =   str_pad($lista_produtos[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_produtos[$re]["titulo"]              =   $lista_produtos[$re]->getTitulo();    
            $array_produtos[$re]["dt_cadastro"]         =   $opc->inverteDateTime($lista_produtos[$re]->getDtCadastro());
            $array_produtos[$re]["quantidade"]          =   $lista_produtos[$re]->getQuantidade();            
            $array_produtos[$re]["status"]              =   $lista_produtos[$re]->getStatus()=='a'?'Ativo':'Inativo';
            $smarty->assign('array_produtos',$array_produtos);         
        }
            $smarty->assign('qte_registros',count($lista_produtos));
    }  
}

if($acao=='cadastrar'   ||    $acao=='alterar'){

//Lista de Categoria e Fornecedores
    $lista_categorias  =   $aprodutos_categorias->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));    
    if(is_array($lista_categorias)){
        for($re=0;$re<count($lista_categorias);$re++){           
            $array_categorias[$re]["idurl"]               =   $lista_categorias[$re]->getId();
            $array_categorias[$re]["id"]                  =   str_pad($lista_categorias[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_categorias[$re]["categoria"]           =   $lista_categorias[$re]->getNome();
            $smarty->assign('array_categoria',$array_categorias);         
        }
    }
    
    $lista_fornecedores  =   $aprodutos_fornecedores->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));    
    if(is_array($lista_fornecedores)){
        for($re=0;$re<count($lista_fornecedores);$re++){           
            $array_fornecedores[$re]["idurl"]               =   $lista_fornecedores[$re]->getId();
            $array_fornecedores[$re]["id"]                  =   str_pad($lista_fornecedores[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_fornecedores[$re]["fornecedor"]           =   $lista_fornecedores[$re]->getNome();
            $smarty->assign('array_fornecedor',$array_fornecedores);         
        }
    } 
}

//echo "[".$acao."]";exit;

if(isset($msg)){
    $smarty->assign("mensagem", $msg);        
}	
switch($acao){
    case 'alterar':
            $pagina->titulo = "Alterar dados do Estoque";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('produtos_estoque/formulario.tpl');
            break;	
    case 'cadastrar':
            $pagina->titulo = "Cadastrar Estoque de Produto";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_estoque/formulario.tpl');
            break;							
    case 'excluir':
            $resultado = $aclientes->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."clientes");            
            }
    default:
            $pagina->titulo = "Lista de Produtos com estoque";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_estoque/lista.tpl');
            break;		
}
