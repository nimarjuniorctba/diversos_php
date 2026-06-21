<?php

require_once 'classes/autoload.class.php';

$pdo                            =       MySQL_PDO::conexao();
$session                        =       new Sessions();
$opc                            =       new Opcoes();
$aempresa_admin                 =       new acesso_empresa_admin();

if(($session->getValor('USUARIO_SESSAO')!='') && ($session->getValor('adm_id')!='')){


        switch ($_POST['tipo']){

                    case 'alterar':

                        switch($_POST['opcao']){
                                case'senha':                                    
                                    $empresa_admin =   new empresa_admin();
                                    $empresa_admin->setId(isset($_POST['id'])?$_POST['id']:'');
                                    $empresa_admin->setSenha(isset($_POST['senha'])?$_POST['senha']:'');
                                    $cadastra=$aempresa_admin->atualizaSenha($pdo, $empresa_admin);
                                    if($cadastra!=false){                      
                                        $retorno['status']    =   true;
                                    }else{
                                        $retorno['status']    =   false;
                                    }                                    
                                    break;
                        }
        }

echo json_encode($retorno);        
        
}