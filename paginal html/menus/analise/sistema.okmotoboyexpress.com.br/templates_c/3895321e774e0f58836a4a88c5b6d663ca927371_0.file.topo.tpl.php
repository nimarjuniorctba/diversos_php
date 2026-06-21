<?php
/* Smarty version 4.1.0, created on 2023-03-12 03:19:53
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Alfa\portaldenoticias\template\topo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_640d36c9b4afb5_41419898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3895321e774e0f58836a4a88c5b6d663ca927371' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Alfa\\portaldenoticias\\template\\topo.tpl',
      1 => 1678501119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640d36c9b4afb5_41419898 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>

<title><?php echo $_smarty_tpl->tpl_vars['pagina']->value->empresa_nome;?>
</title>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.js"   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="   crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />



<head>
<body>


<div style="background:#ffffff;display:inline-block;width:100%">
	<div style="float:left;">
		<a href="" style="text-decoration:none"><img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/config/logo.png" style="height: 94px;width: 211px;"></a>
	</div>	
</div>
<div style="clear:both;"></div>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
cartoes/">Cartões</a>
          <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
empresas/">Empresas</a>
          <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
logins/">Logins</a>
          <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
nomes/">Nomes</a>
          <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
sites/">Sites</a>
        </div>
      </li>	
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Aplicativos
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  <a class="dropdown-item" href="#">Recarga Orage</a>
			  <a class="dropdown-item" href="#">Relatorios</a>
			  <a class="dropdown-item" href="#">PDV</a>
			</div>
		 </li>	
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Configurações
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Meus dados</a>
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Definições</a>
          <a class="dropdown-item" href="#">Aplicativo</a>
        </div>
      </li>	
      <li class="nav-item">
        <a class="nav-link" href="#">Sair</a>
      </li>

    </ul>
  </div>
</nav><?php }
}
