<?php require 'config/config.php'; require 'classes/Database.php';
$db=new Database();$c=$db->connect();$u=$_SESSION['user_id'];

$groups=$c->query("SELECT group_id FROM group_users WHERE user_id=$u");

$where="";
if(isset($_GET['plate'])) $where="AND plate LIKE '%".$_GET['plate']."%'";

$res=$c->query("SELECT * FROM vehicles WHERE 1 $where");

include 'includes/header.php';
?>
<div class=card>
<form>
<input name=plate placeholder="Buscar placa">
<button>Buscar</button>
</form>
</div>

<div class=card>
<form method=post>
<input name=plate placeholder="Placa">
<textarea name=notes></textarea>
<button>Salvar</button>
</form>
</div>

<div class=card>
<h3>Resultados</h3>
<?php foreach($res as $r){ echo $r['plate']." - ".$r['notes']."<br>"; } ?>
</div>

<?php include 'includes/footer.php'; ?>