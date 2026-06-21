<?php

$aprodutos_categorias    =   new acesso_produtos_categorias();
//$aclientes              =   new acesso_clientes();


if(isset($_POST['submit'])){
         
    $produtos_categorias    =   new Produtos_Categorias();
    $produtos_categorias->setNome($_POST['cat_nome']);
    $produtos_categorias->setDescricao($_POST['cat_descricao']);
    $produtos_categorias->setEmpresa($session->getValor('adm_emp_id'));   
    
    if($_POST['submit']=='cadastrar'){
        
        $cadastra_produtos_categorias  =   $aprodutos_categorias->cadastraDados($pdo, $produtos_categorias);
            if($cadastra_produtos_categorias!=false){                      
                $msg     =   '<div class="alert alert-success" role="alert">Categoria cadastrada com sucesso.</div>';
            }else{
                $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel cadastrar a categoria.</div>';
            } 
           
    }else{
        
        $produtos_categorias->setId($_POST['cat_idurl']);
        $produtos_categorias->setStatus($_POST['cat_status']);             
        $altera_produtos_categorias  =   $aprodutos_categorias->atualizaDados($pdo, $produtos_categorias); 
        
        if($altera_produtos_categorias){
            
            $msg    =   '<div class="alert alert-success" role="alert"><div>Alterado com sucesso.</div></div>';
            
        }else{
            
            $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o alteração verifique os dados.</div>';                          
            $smarty->assign('cat_nome',$_POST['cat_nome']);
            $smarty->assign('cat_descricao',$_POST['cat_descricao']);
            $smarty->assign('cat_status',$_POST['cat_status']);
            $smarty->assign('cat_idurl',$_POST['cat_idurl']);           
        }        
    }      
}

if($acao=='alterar' && $valor!=''){
    
    $retorna_produtos_categorias = $aprodutos_categorias->retornaDados($pdo, 'id', $valor);

    if(is_object($retorna_produtos_categorias)){   
        
        $smarty->assign('cat_idurl',$retorna_produtos_categorias->getId());
        $smarty->assign('cat_nome',$retorna_produtos_categorias->getNome());
        $smarty->assign('cat_descricao',$retorna_produtos_categorias->getDescricao());
        $smarty->assign('cat_status',$retorna_produtos_categorias->getStatus());
   
    }
    
    
}else if($acao!='cadastrar'   &&    $acao!='alterar'){
    
    $lista_produtos_categorias  =   $aprodutos_categorias->listarDados($pdo, 'empresa',$session->getValor('adm_emp_id'));
    if(is_array($lista_produtos_categorias)){
        
        for($re=0;$re<count($lista_produtos_categorias);$re++){
            
            $array_produtos_categorias[$re]["idurl"]           =   $lista_produtos_categorias[$re]->getId();
            $array_produtos_categorias[$re]["id"]              =   str_pad($lista_produtos_categorias[$re]->getId(),6,'0',STR_PAD_LEFT);
            $array_produtos_categorias[$re]["nome"]            =   $lista_produtos_categorias[$re]->getNome();
            $array_produtos_categorias[$re]["descricao"]       =   $lista_produtos_categorias[$re]->getDescricao();
            $array_produtos_categorias[$re]["dt_cadastro"]     =   $opc->inverteDateTime($lista_produtos_categorias[$re]->getDtCadastro());
            $array_produtos_categorias[$re]["status"]          =   $lista_produtos_categorias[$re]->getStatus()=='a'?'Ativo':'Inativo';
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
            $pagina->titulo = "Alterar dados da Categoria do Produto";
            $smarty->assign('pagina',$pagina);                 
            $smarty->display('produtos_categoria/formulario.tpl');
            break;	
    case 'cadastrar'://echo "cd";exit;
            $pagina->titulo = "Cadastrar Categoria do Produto";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_categoria/formulario.tpl');
            break;							
    case 'excluir':
          //  $resultado = $aclientes->Deletar($pdo,$valor); 
            if($resultado){
                header("Location: ".$pagina->base."clientes");            
            }
    default:
            $pagina->titulo = "Lista de Categorias de Produto";
            $smarty->assign('pagina',$pagina);
            $smarty->display('produtos_categoria/lista.tpl');
            break;		
}
