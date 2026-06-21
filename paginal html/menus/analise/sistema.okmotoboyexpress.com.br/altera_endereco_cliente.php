<?php

require_once 'classes/autoload.class.php';

$pdo                =   MySQL_PDO::conexao();

$aclientes_enderecos    =   new acesso_clientes_enderecos();

switch ($_POST['tipo']){

            case 'cadastrar':                
                $endereco = new Clientes_enderecos();                
                $endereco->setRua(isset($_POST['end_rua'])?$_POST['end_rua']:'');
                $endereco->setNumero(isset($_POST['end_numero'])?$_POST['end_numero']:'');
                $endereco->setComplemento(isset($_POST['end_comp'])?$_POST['end_comp']:'');
                $endereco->setCep(isset($_POST['end_cep'])?$_POST['end_cep']:'');
                $endereco->setBairro(isset($_POST['end_bairro'])?$_POST['end_bairro']:'');
                $endereco->setCidade(isset($_POST['end_cidade'])?$_POST['end_cidade']:'');
                $endereco->setEstado(isset($_POST['end_estado'])?$_POST['end_estado']:'');
                $endereco->setCliente(isset($_POST['cliente'])?$_POST['cliente']:'');                                        
                $cadastra = $aclientes_enderecos->cadastraDados($pdo, $endereco);
                if($cadastra!=false){                      
                    $retorno['status']    =   true;
                }else{
                    $retorno['status']    =   false;
                }
                echo json_encode($retorno);                                      
                break;
            case 'visualiza':                
                $end_id = $_POST['idurl'];                
                $retorna_endereco = $aclientes_enderecos->retornaDados($pdo, 'id',$end_id);
                $retorno["end_idurl"]              = $retorna_endereco->getId();
                $retorno["end_rua"]             = $retorna_endereco->getRua();
                $retorno["end_numero"]          = $retorna_endereco->getNumero();
                $retorno["end_comp"]            = $retorna_endereco->getComplemento();
                $retorno["end_cep"]             = $retorna_endereco->getCep();
                $retorno["end_bairro"]          = $retorna_endereco->getBairro();
                $retorno["end_cidade"]          = $retorna_endereco->getCidade();
                $retorno["end_estado"]          = $retorna_endereco->getEstado();
                echo json_encode($retorno);                                      
                break;
            case 'alterar':
                $endereco = new Clientes_enderecos();
                $endereco->setId(isset($_POST['idurl'])?$_POST['idurl']:'');
                $endereco->setRua(isset($_POST['end_rua'])?$_POST['end_rua']:'');
                $endereco->setNumero(isset($_POST['end_numero'])?$_POST['end_numero']:'');
                $endereco->setComplemento(isset($_POST['end_comp'])?$_POST['end_comp']:'');
                $endereco->setCep(isset($_POST['end_cep'])?$_POST['end_cep']:'');
                $endereco->setBairro(isset($_POST['end_bairro'])?$_POST['end_bairro']:'');
                $endereco->setCidade(isset($_POST['end_cidade'])?$_POST['end_cidade']:'');
                $endereco->setEstado(isset($_POST['end_estado'])?$_POST['end_estado']:'');
                $cadastra = $aclientes_enderecos->atualizaDados($pdo, $endereco);
                if($cadastra!=false){                      
                    $retorno['status']    =   'true';
                }else{
               //     $retorno['status']    =   false;
                }
                echo json_encode($retorno);                                      
                break;                
            case 'deletar':

                $end_id = isset($_POST['idurl'])?$_POST['idurl']:'';
                $cadastra = $aclientes_enderecos->Deletar($pdo, $end_id);
                if($cadastra!=false){                      
                    $retorno['status']    =   true;
                }else{
                    $retorno['status']    =   false;
                }
                echo json_encode($retorno);                                      
                break;  
}