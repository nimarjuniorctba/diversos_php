<?php
require_once __DIR__.'/classes/Autoload.class.php';
header('Content-Type: application/json; charset=utf-8');
$pdo=MySQL_PDO::conexao();$session=new Sessions();
$tipo=(string)($_POST['tipo']??'');$id=(int)($_POST['id']??0);$senha=trim((string)($_POST['senha']??''));$confirmacao=trim((string)($_POST['confirmacao']??''));$token=(string)($_POST['csrf_token']??'');
$tokens=array('condutor'=>$_SESSION['csrf_condutores']??'','administrador'=>$_SESSION['csrf_administradores']??'','empresa_admin'=>$_SESSION['csrf_empresa_admin']??'');
function respostaSenha($ok,$mensagem){echo json_encode(array('ok'=>$ok,'mensagem'=>$mensagem),JSON_UNESCAPED_UNICODE);exit;}
if(!isset($tokens[$tipo])||$tokens[$tipo]===''||!hash_equals($tokens[$tipo],$token))respostaSenha(false,'A sessão expirou. Atualize a página.');
if($id<=0)respostaSenha(false,'Registro inválido.');
if(strlen($senha)<4)respostaSenha(false,'A senha deve possuir pelo menos 4 caracteres.');
if($senha!==$confirmacao)respostaSenha(false,'As senhas não correspondem.');
if($tipo==='condutor'){$o=new Condutores();$o->setId($id);$o->setSenha($senha);$ok=(new acesso_condutores())->atualizaSenha($pdo,$o);}
elseif($tipo==='administrador'){$o=new Administradores();$o->setId($id);$o->setSenha($senha);$ok=(new acesso_administradores())->atualizaSenha($pdo,$o);}
else{$o=new Empresa_admin();$o->setId($id);$o->setSenha($senha);$ok=(new acesso_empresa_admin())->atualizaSenha($pdo,$o);}
respostaSenha((bool)$ok,$ok?'Senha alterada com sucesso.':'Não foi possível alterar a senha.');
