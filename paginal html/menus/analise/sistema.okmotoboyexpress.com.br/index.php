<?php
	

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';

$opcao      =   isset($_GET['opcao'])?$_GET['opcao']:'home';
$acao       =   isset($_GET['acao'])?$_GET['acao']:'listar';
$valor      =   isset($_GET['valor'])?$_GET['valor']:'';

$pdo                =   MySQL_PDO::conexao();
$session            =   new Sessions();
$opc                =   new Opcoes();

$aadmin_empresa     =   new acesso_empresa_admin();
$aempresa           =   new acesso_empresas();


//echo $opc->codificaDados("nimar");
//echo "<br>d:".$opc->decodificaDados("V1cweGMyUkdiRmxUVkRBOQ==");
/*
	echo "Opcao:".$opcao;
	echo "<br>Acao:".$acao;
	echo "<br>ID:".$id;
*/

$pagina =   new stdClass();

$pagina->empresa_nome   = "Ok MotoBoy Express";
$pagina->opcao          = $opcao;
$pagina->acao           = $acao;
//$pagina->base           = "http://127.0.0.1/Local%20Web/Produtoresweb.com.br/LocalHost/sistema.petvidafacil.com.br/";
$pagina->base           = "http://".$_SERVER['HTTP_HOST']."/okmotoboyexpress/sistema.okmotoboyexpress.com.br/";

$pagina->upload         = "imagens/uploads/";

//echo "AKI:".$_SERVER['HTTP_HOST'];exit;
//	
//echo "<br>texto:".$pagina->acao;
//echo "<br><pre>";
//echo print_r($pagina,true);
//echo "<br><pre>";
//var_dump($_REQUEST);
//exit;	
    if(($session->getValor('USUARIO_SESSAO')!='') && ($session->getValor('adm_id')!='')){
 
        $retorna_empresa = $aempresa->retornaDados($pdo,'id', $session->getValor('adm_emp_id'));
        if(is_object($retorna_empresa)){
            
            $diferenca = strtotime($retorna_empresa->getValidadeSistema()) - strtotime(date('Y-m-d'));
            $dias_faltando = floor($diferenca / (60 * 60 * 24));            
            if( $dias_faltando < 10 && $dias_faltando > 0){
                $smarty->assign('aviso_validade_sistema','s');   
                $smarty->assign('dias_faltando_validade_sistema',$dias_faltando);   
            }else if($dias_faltando < 0 ){
                $smarty->assign('aviso_validade_sistema','v');   
                $smarty->assign('dias_faltando_validade_sistema',abs($dias_faltando));                   
            }else{
                $smarty->assign('aviso_validade_sistema','n');   
                $smarty->assign('dias_faltando_validade_sistema',$dias_faltando);                   
            }
        }

        $retorna_usuario = $aadmin_empresa->retornaDados($pdo, 'id', $session->getValor('adm_id'));
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
        
        switch($opcao){


                case 'clientes':			
                                require_once('clientes.php');
                                break;
                case 'meus-dados':			
                                require_once('meus_dados.php');
                                break;
                case 'usuarios':			
                                require_once('usuarios.php');
                                break;                              
                case 'agenda':			
                                require_once('agenda.php');
                                break;        
                case 'sair':			
                                require_once('sair.php');
                                break;                            
                default:
                                require_once('agenda.php');
                                break;

            }	
    }else{               
        
         if(isset($_POST['submit']) && $_POST['submit'] == 'Entrar'){
            
            if( isset($_POST['login-email']) && isset($_POST['login-senha']) ){ 

                $login = trim($_POST['login-email']);
                $senha = trim($_POST['login-senha']); 

                $retorna_login = $aadmin_empresa->FazerLogin( $pdo,$login, $senha);
               /* var_dump($retorna_login);
                
                //usuario e senha
                echo "<br><b>[".$login."]";
                echo "[".$senha."]</b>";
                
                exit;*/
                
                if(is_object($retorna_login)){

                    $session->setValor('USUARIO_SESSAO',$retorna_login->getNome());
                    $session->setValor('adm_id',$retorna_login->getId());
                    $session->setValor('adm_emp_id',$retorna_login->getEmpresa());
                    header("Location: ".$pagina->base);                       

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