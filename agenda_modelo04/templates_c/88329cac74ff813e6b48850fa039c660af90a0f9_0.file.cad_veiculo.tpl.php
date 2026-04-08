<?php
/* Smarty version 4.1.0, created on 2026-04-08 09:48:33
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\cad_veiculo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d64ea1ab9ee8_82888616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88329cac74ff813e6b48850fa039c660af90a0f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\cad_veiculo.tpl',
      1 => 1775652266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d64ea1ab9ee8_82888616 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Cadastro Veículo</h2>

<form method="POST">

    Cliente:
    <select name="cliente">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CLIENTES']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['cli_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['cli_nome'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br>

    Placa: <input type="text" name="placa"><br>
    Modelo: <input type="text" name="modelo"><br>
    Marca: <input type="text" name="marca"><br>
    Cor: <input type="text" name="cor"><br>

    Comentário:
    <textarea name="comentario"></textarea><br>

    <button>Salvar</button>

</form><?php }
}
