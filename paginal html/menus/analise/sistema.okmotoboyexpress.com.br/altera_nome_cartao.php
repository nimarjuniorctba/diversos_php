<?php

require_once 'classes/autoload.class.php';

$pdo                =   MySQL_PDO::conexao();

$anomes          =   new acesso_nomes();
$acartao         =   new acesso_cartao();


switch ($_POST['tipo']){

            case 'cadastrar':
                                
                switch($_POST['opcao']){
                                case'nome':                                    
                                  /*  $comentario =   new comentario();
                                    $comentario->setTitulo(isset($_POST['titulo'])?$_POST['titulo']:'');
                                    $comentario->setDescricao(isset($_POST['descricao'])?$_POST['descricao']:'');
                                    $comentario->setNome(isset($_POST['nome'])?$_POST['nome']:'');
                                    $cadastra=$acomentario->cadastraDados($pdo, $comentario);
                                    if($cadastra!=false){                      
                                        $retorno['status']    =   true;
                                    }else{
                                        $retorno['status']    =   false;
                                    }                                    
                                    break;*/
                                case'cartao':                                    
                                    $nomes      =   new nomes();
                                    $nomes->setNome(isset($_POST['car_nome'])?$_POST['car_nome']:'');
                                    $nomes->setCpf(isset($_POST['car_cpf'])?$_POST['car_cpf']:'');
                                    $nomes->setMae(isset($_POST['car_mae'])?$_POST['car_mae']:'');
                                    $nomes->setPai(isset($_POST['car_pai'])?$_POST['car_pai']:'');
                                    $nomes->setRg(isset($_POST['car_rg'])?$_POST['car_rg']:'');
                                    $nomes->setRg_expedicao(isset($_POST['car_dt_rg'])?$_POST['car_dt_rg']:'');
                                    $nomes->setDtNascimento(isset($_POST['car_dt_nascimento'])?$_POST['car_dt_nascimento']:'');
                                    $nomes->setLocalNascimento(isset($_POST['car_lc_nascimento'])?$_POST['car_lc_nascimento']:'');
                                    $nomes->setTituloEleitor(isset($_POST['car_tt_eleitor'])?$_POST['car_tt_eleitor']:'');
                                    $cadastra=$anomes->cadastraDados($pdo, $nomes);
                                    if($cadastra!=false){                      
                                        $retorno['status']    =   true;
                                        
                                        $retorna_cartao     =   $acartao->AlteraDonoCartao($pdo, $_POST['car_id'], $cadastra );
                                        
                                    }else{
                                        $retorno['status']    =   false;
                                    }                                    
                                    break;                                                    
                }                
                echo json_encode($retorno);                                      
                break;
                
            case 'deletar-nome':
                                   
                    $nome_id = isset($_POST['id'])?$_POST['id']:'';
                    $deleta = $anomes->Deletar($pdo, $nome_id);
                    if($deleta!=false){                      
                        $retorno['status']    =   true;
                    }else{
                        $retorno['status']    =   false;
                    }
                                
                echo json_encode($retorno);                                      
                break;                 

}