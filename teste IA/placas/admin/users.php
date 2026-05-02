<?php require '../config/config.php'; require '../classes/Auth.php'; require '../classes/Database.php';
if(!Auth::admin()) die("Sem acesso");
$db=new Database();$c=$db->connect();
$u=$c->query("SELECT * FROM users");
foreach($u as $x){
echo $x['email']." - ".($x['ativo']?'Ativo':'Inativo')."<br>";
}
