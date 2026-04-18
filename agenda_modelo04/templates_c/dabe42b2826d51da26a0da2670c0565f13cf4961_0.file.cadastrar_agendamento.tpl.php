<?php
/* Smarty version 4.1.0, created on 2026-04-18 16:57:24
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\agenda\cadastrar_agendamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69e3e224bec0f8_87489910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dabe42b2826d51da26a0da2670c0565f13cf4961' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\agenda\\cadastrar_agendamento.tpl',
      1 => 1776542240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69e3e224bec0f8_87489910 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
}

form {
    background: #fff;
    padding: 20px;
    max-width: 500px;
    border-radius: 8px;
}

label {
    display: block;
    margin-top: 10px;
}

select, input, button {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}

button {
    background: #28a745;
    color: #fff;
    border: none;
    margin-top: 15px;
    cursor: pointer;
}
</style>

<h2>Novo Agendamento</h2>

<form method="POST">

    <label>Data</label>
    <input type="date" name="data" required>

    <label>Cliente</label>
    <select name="cliente" id="cliente" required>
        <option value="">Selecione</option>
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
    </select>

    <label>Veículo</label>
    <select name="veiculo" id="veiculo" required>
        <option value="">Selecione o cliente primeiro</option>
    </select>

    <label>Serviço</label>
    <select name="servico" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVICOS']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['ser_id'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['s']->value['ser_nome'];?>
 - R$ <?php echo $_smarty_tpl->tpl_vars['s']->value['ser_valor'];?>

            </option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>

    <label>Pista</label>
    <select name="pista" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['pis_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['pis_nome'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
	
	<select name="forma_pagamento">
    <option value="">Selecione</option>
    <option value="1">Dinheiro</option>
    <option value="2">Pix</option>
	</select>

    <label>Horário Inicial</label>
    <select name="hora_inicio" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>

    <label>Desconto (R$)</label>
    <input type="number" step="0.01" name="desconto">

    <button type="submit">Agendar</button>

</form>

<!-- JQUERY -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

// =============================
// 🔄 CARREGAR VEÍCULOS POR CLIENTE
// =============================
$('#cliente').change(function(){

    let cliente = $(this).val();

    $('#veiculo').html('<option>Carregando...</option>');

    $.get('buscar_veiculos.php?cliente='+cliente, function(data){
        $('#veiculo').html(data);
    });

});
<?php echo '</script'; ?>
><?php }
}
