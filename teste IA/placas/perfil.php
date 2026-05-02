<?php require 'config/config.php'; require 'classes/Database.php';
$db=new Database();$c=$db->connect();$id=$_SESSION['user_id'];

if($_POST){
$n=$_POST['nome'];
if($_POST['senha']){
$c->prepare("UPDATE users SET nome=?,senha=? WHERE id=?")
->execute([$n,md5($_POST['senha']),$id]);
}else{
$c->prepare("UPDATE users SET nome=? WHERE id=?")->execute([$n,$id]);
}}
$u=$c->query("SELECT * FROM users WHERE id=$id")->fetch();
include 'includes/header.php';
?>
<div class=card>
<form method=post>
<input name=nome value="<?=$u['nome']?>">
<input name=senha placeholder="Nova senha">
<button>Salvar</button>
</form>
</div>
<?php include 'includes/footer.php'; ?>