<?php require 'config/config.php'; require 'classes/Database.php';
$db=new Database();$c=$db->connect();$u=$_SESSION['user_id'];

$groups=$c->query("SELECT g.* FROM groups g JOIN group_users gu ON gu.group_id=g.id WHERE gu.user_id=$u");

include 'includes/header.php';
?>
<div class=card>
<h3>Seus Grupos</h3>
<form method=post action=grupo_criar.php>
<input name=nome placeholder="Novo grupo"><button>Criar</button>
</form>
<hr>
<select>
<option value=all>Todas bases</option>
<?php foreach($groups as $g): ?>
<option><?=$g['nome']?></option>
<?php endforeach; ?>
</select>
</div>
<?php include 'includes/footer.php'; ?>