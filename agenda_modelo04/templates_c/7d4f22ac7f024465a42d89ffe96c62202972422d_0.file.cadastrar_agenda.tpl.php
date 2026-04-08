<?php
/* Smarty version 4.1.0, created on 2026-04-08 10:21:12
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\agenda\cadastrar_agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d65648c216a3_50723109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d4f22ac7f024465a42d89ffe96c62202972422d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\agenda\\cadastrar_agenda.tpl',
      1 => 1775654448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d65648c216a3_50723109 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Novo Agendamento</h2>

<form id="formAgendamento">

<input type="hidden" name="data" value="<?php echo $_smarty_tpl->tpl_vars['dataSelecionada']->value;?>
">

<label>Cliente:</label><br>
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
</select><br><br>

<label>Serviço:</label><br>
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

        </option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select><br><br>

<label>Pista:</label><br>
<select name="pista" required>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['pis_id'];?>
" 
        <?php if ($_smarty_tpl->tpl_vars['p']->value['pis_id'] == $_smarty_tpl->tpl_vars['pistaSelecionada']->value) {?>selected<?php }?>>
            <?php echo $_smarty_tpl->tpl_vars['p']->value['pis_nome'];?>

        </option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select><br><br>

<label>Horário:</label><br>
<select name="hora" required>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
" 
        <?php if ($_smarty_tpl->tpl_vars['h']->value['hor_id'] == $_smarty_tpl->tpl_vars['horaSelecionada']->value) {?>selected<?php }?>>
            <?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>

        </option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select><br><br>

<label>Desconto:</label><br>
<input type="number" step="0.01" name="desconto" value="0"><br><br>

<button type="submit">Salvar</button>

</form>

<?php echo '<script'; ?>
>
$('#formAgendamento').submit(function(e){

    e.preventDefault();

    $.post('agenda_ajax.php', $(this).serialize(), function(res){

        if(res.status === 'ok'){
            alert('Agendado!');
            location.reload();
        }

    }, 'json');

});
<?php echo '</script'; ?>
><?php }
}
