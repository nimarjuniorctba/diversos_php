<?php
/* Smarty version 4.1.0, created on 2022-05-04 16:23:54
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\aulas_smart\template\teste.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62728c7a689a02_51583266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b16a4f90d05a5b19028718de59b364f6528849b' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\aulas_smart\\template\\teste.tpl',
      1 => 1650583228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62728c7a689a02_51583266 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<title>jquery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<head>
<body>


 <h1><?php echo $_smarty_tpl->tpl_vars['minha_var']->value;?>
</h1> 
 <hr>

 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'dados');
$_smarty_tpl->tpl_vars['dados']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dados']->value) {
$_smarty_tpl->tpl_vars['dados']->do_else = false;
?>
 <b>Nome:</b><?php echo $_smarty_tpl->tpl_vars['dados']->value['nome'];?>
<br>
 <b>Sobrenome:</b><?php echo $_smarty_tpl->tpl_vars['dados']->value['sobrenome'];?>
<br>
 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<a href="" class="btn-floating green"><i class="material-icons">edit</i></a>

</body>
</html>





<?php }
}
