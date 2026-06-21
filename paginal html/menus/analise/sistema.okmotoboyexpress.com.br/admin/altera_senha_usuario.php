<?php

require_once '../classes/autoload.class.php';

$pdo                            =       MySQL_PDO::conexao();
$session                        =       new Sessions();
$opc                            =       new Opcoes();
$aadministradores               =       new acesso_administradores();
$aempresa_admin                 =       new acesso_empresa_admin();

if(($session->getValor('ADMIN_SESSAO')!='') && ($session->getValor('adm_adm_id')!='')){

    $retorno['status']    =   false;

        switch ($_POST['tipo']){

            case 'alterar-admin':

                switch($_POST['opcao']){
                    case'senha':           
                        
                        $administrador =   new administradores();
                        $administrador->setId(isset($_POST['id'])?$_POST['id']:'');
                        $administrador->setSenha(isset($_POST['senha'])?$_POST['senha']:'');
                        $cadastra=$aadministradores->atualizaSenha($pdo, $administrador);
                        if($cadastra!=false){                      
                            $retorno['status']    =   true;
                        }else{
                            $retorno['status']    =   false;
                        }                                    
                        break;
                }
            case 'alterar-empresa':

                switch($_POST['opcao']){
                    case'senha':                 
                        
                        $empresa_admin    =   new Empresa_admin();
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