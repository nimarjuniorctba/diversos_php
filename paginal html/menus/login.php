<?php
require_once __DIR__.'/smarty/config.ini.php';
require_once __DIR__.'/classes/Autoload.class.php';
$pdo=MySQL_PDO::conexao();$session=new Sessions();$acesso=new acesso_empresa_admin();$mensagem='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=trim((string)($_POST['email']??''));$senha=trim((string)($_POST['senha']??''));
    $usuario=$acesso->FazerLogin($pdo,$email,$senha);
    if($usuario){$session->setValor('USUARIO_SESSAO',$usuario->getNome());$session->setValor('adm_id',$usuario->getId());$session->setValor('adm_emp_id',$usuario->getEmpresa());header('Location: index.php');exit;}
    $mensagem='E-mail ou senha inválidos.';$smarty->assign('email',$email);
}
$smarty->assign(array('mensagem'=>$mensagem,'ano_atual'=>date('Y')));$smarty->display('login.tpl');
