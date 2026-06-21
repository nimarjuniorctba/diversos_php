<?php
	
require_once '../smarty/config.ini.php';
require_once '../classes/Autoload.class.php';

$opcao      =   isset($_GET['opcao'])?$_GET['opcao']:'home';
$acao       =   isset($_GET['acao'])?$_GET['acao']:'listar';
$valor      =   isset($_GET['valor'])?$_GET['valor']:'';

$pdo                =   MySQL_PDO::conexao();
$session            =   new Sessions();
$opc                =   new Opcoes();

$aadministradores     =   new acesso_administradores();

//echo "123";exit;

//echo $opc->codificaDados("nimar");
//echo "<br>d:".$opc->decodificaDados("V1cweGMyUkdiRmxUVkRBOQ==");
/*
	echo "Opcao:".$opcao;
	echo "<br>Acao:".$acao;
	echo "<br>ID:".$id;
*/

$pagina =   new stdClass();

$pagina->empresa_nome   = "Painel Administrativo";
$pagina->opcao          = $opcao;
$pagina->acao           = $acao;
//$pagina->base           = "http://127.0.0.1/Local%20Web/Produtoresweb.com.br/LocalHost/sistema.petvidafacil.com.br/";
//$pagina->base           = "http://".$_SERVER['HTTP_HOST']."/PetVidaFacil/sistema.petvidafacil.com.br/admin/";
$pagina->base           = "http://".$_SERVER['HTTP_HOST']."/okmotoboyexpress/sistema.okmotoboyexpress.com.br/admin/";
$pagina->base_cliente   = "http://".$_SERVER['HTTP_HOST']."/okmotoboyexpress/sistema.okmotoboyexpress.com.br/";
$pagina->upload         = "imagens/uploads/";


//	
//echo "<br>texto:".$pagina->acao;
//echo "<br><pre>";
//echo print_r($pagina,true);
//echo "<br><pre>";
//var_dump($_REQUEST);
//exit;	



    if(($session->getValor('ADMIN_SESSAO')!='') && ($session->getValor('adm_adm_id')!='')){
        
        $retorna_usuario = $aadministradores->retornaDados($pdo, 'id', $session->getValor('adm_adm_id'));
        if(is_object($retorna_usuario)){        

            if(date("H") > 6 && date("H") < 12){
                $mensagem_identificacao = 'Bom Dia, '.$retorna_usuario->getNome();
            }else if(date("H") >= 12 && date("H") < 18){
                $mensagem_identificacao = 'Boa Tarde, '.$retorna_usuario->getNome();
            }else{
                $mensagem_identificacao = 'Boa Noite, '.$retorna_usuario->getNome();
            }            
            $pagina->mensagem_identificacao = $mensagem_identificacao;
            
        }         

        //   echo 'aki'.$opcao;exit;	
        
        switch($opcao){

                case 'empresas'://	 echo 'aki'.$acao;exit;		
                                require_once('empresas.php');
                                break;
                case 'usuarios-empresas'://echo 'aki1'.$acao;exit;			
                                require_once('usuarios_empresas.php');
                                break;
                case 'meus-dados':	//echo 'aki2'.$acao;exit;		
                                require_once('meus_dados.php');
                                break; 
                case 'administradores':	//echo 'aki3'.$acao;exit;		
                                require_once('administradores.php');
                                break;   
                case 'condutores':	//echo 'aki3'.$acao;exit;		
                                require_once('condutores.php');
                                break;                            
                case 'sair':	//	echo '[sair]'.$acao;exit;	
                                require_once('sair.php');
                                break;                            
                default:
                                require_once('home.php');
                                break;

            }	
    }else{               
        
         if(isset($_POST['submit']) && $_POST['submit'] == 'Entrar'){
            
            if( isset($_POST['login-email']) && isset($_POST['login-senha']) ){ 

                $login = trim($_POST['login-email']);
                $senha = trim($_POST['login-senha']); 

                $retorna_login = $aadministradores->FazerLogin( $pdo,$login, $senha);
                    if(is_object($retorna_login)){
                        
                        $session->setValor('ADMIN_SESSAO',$retorna_login->getNome());
                        $session->setValor('adm_adm_id',$retorna_login->getId());
                        header("Location: ".$pagina->base.'/admin');                       
                        
                    }else{
                        $smarty->assign('email',$_POST['login-email']);
                        $smarty->assign('mensagem','<p style="color:red;font-weight:600">Senha invalida</p>');  
                    }
            }
         }
        $pagina->titulo = "Login";
        $smarty->assign('pagina',$pagina);        
        $smarty->display('login.tpl');       
        
    }	