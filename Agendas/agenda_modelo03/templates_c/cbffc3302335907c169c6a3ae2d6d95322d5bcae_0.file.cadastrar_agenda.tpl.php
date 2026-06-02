<?php
/* Smarty version 4.1.0, created on 2026-04-07 07:40:13
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo03\templates\agenda\cadastrar_agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d4df0dc21926_79178478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbffc3302335907c169c6a3ae2d6d95322d5bcae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo03\\templates\\agenda\\cadastrar_agenda.tpl',
      1 => 1775306224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d4df0dc21926_79178478 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
form {
    background:#fff;
    padding:20px;
}
</style>

<h2>Novo Agendamento</h2>

<form id="formAgenda">

<label>Data</label>
<input type="date" name="data" required>

<label>Horário</label>
<select name="hora" required>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['h']->value['hor_id'] == $_smarty_tpl->tpl_vars['horaSelecionada']->value) {?>selected<?php }?>>
<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>

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
" <?php if ($_smarty_tpl->tpl_vars['p']->value['pis_id'] == $_smarty_tpl->tpl_vars['pistaSelecionada']->value) {?>selected<?php }?>>
<?php echo $_smarty_tpl->tpl_vars['p']->value['pis_nome'];?>

</option>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>

<label>Cliente</label>
<select name="cliente" required>
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

<label>Serviço</label>
<select name="servico" required>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVICOS']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['ser_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['ser_nome'];?>
</option>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>

<button type="submit">Agendar</button>

</form>

<?php echo '<script'; ?>
>
$('#formAgenda').submit(function(e){

    e.preventDefault();

    $.ajax({
        url: 'agenda_ajax.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(res){

            if(res.status === 'ok'){
                alert('Agendado com sucesso!');

                // fecha modal
                $('#modalBg').hide();

                // 🔥 atualiza agenda (reload simples)
                location.reload();
            } else {
                alert('Erro ao salvar');
            }
        }
    });

});
<?php echo '</script'; ?>
><?php }
}
