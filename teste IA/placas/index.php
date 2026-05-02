<?php require 'config/config.php'; require 'classes/Auth.php';
if(!Auth::check()) header("Location:login.php");
include 'includes/header.php';
?>
<div class=card>
<a href=grupo.php>Grupos</a><br>
<a href=veiculos.php>Veículos</a><br>
<a href=perfil.php>Perfil</a><br>
<a href=logout.php>Sair</a>
</div>
<?php include 'includes/footer.php'; ?>