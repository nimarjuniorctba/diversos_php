<?php require 'config/config.php'; require 'classes/Database.php';
$db=new Database();$c=$db->connect();
if($_POST){
$s=md5($_POST['senha']);
$q=$c->prepare("SELECT * FROM users WHERE email=? AND senha=? AND ativo=1");
$q->execute([$_POST['email'],$s]);
if($u=$q->fetch()){
$_SESSION['user_id']=$u['id'];$_SESSION['is_admin']=$u['is_admin'];
header("Location:index.php");exit;}
$e="Erro";}
?>
<form method=post><input name=email><input name=senha type=password>
<button>Entrar</button><?=$e??''?></form>