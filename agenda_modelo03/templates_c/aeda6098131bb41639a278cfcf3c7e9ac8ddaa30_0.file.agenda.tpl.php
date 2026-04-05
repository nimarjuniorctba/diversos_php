<?php
/* Smarty version 4.1.0, created on 2026-04-05 10:06:04
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo03\templates\agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d25e3c5e6394_35136050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aeda6098131bb41639a278cfcf3c7e9ac8ddaa30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo03\\templates\\agenda.tpl',
      1 => 1775394356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d25e3c5e6394_35136050 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
}

table {
    border-collapse: collapse;
    width: 100%;
    max-width: 1100px;
    background: #fff;
}

th, td {
    border: 1px solid #ccc;
    padding: 6px;
    text-align: center;
}

th {
    background: #333;
    color: #fff;
}

.livre {
    background: #d4edda;
    cursor: pointer;
}

.ocupado {
    color: #fff;
    font-weight: bold;
    font-size: 12px;
    cursor: pointer;
}

.livre:hover {
    background: #bfe5c6;
}

/* MODAL */
.modal-bg {
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.6);
    display:none;
    z-index:999;
}

.modal {
    background:#fff;
    width:500px;
    margin:80px auto;
    padding:20px;
    border-radius:8px;
}
</style>

<h2>Agenda</h2>

<!-- 📅 DATA -->
<input type="date" id="dataAgenda" value="<?php echo $_smarty_tpl->tpl_vars['DATA_ATUAL']->value;?>
">

<br><br>

<!-- 📊 AGENDA -->
<div id="agendaContainer">

<table>
<thead>
<tr>
    <th>Horário</th>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <th><?php echo $_smarty_tpl->tpl_vars['p']->value['pis_nome'];?>
</th>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tr>
</thead>

<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HORARIOS']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
<tr>

<td><?php echo $_smarty_tpl->tpl_vars['h']->value['hor_hora'];?>
</td>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PISTAS']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>

<?php $_smarty_tpl->_assignInScope('info', (($tmp = $_smarty_tpl->tpl_vars['OCUPADOS']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? null ?? null : $tmp));
$_smarty_tpl->_assignInScope('span', (($tmp = $_smarty_tpl->tpl_vars['ROWSPAN']->value[$_smarty_tpl->tpl_vars['h']->value['hor_id']][$_smarty_tpl->tpl_vars['p']->value['pis_id']] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp));?>

<?php if ($_smarty_tpl->tpl_vars['info']->value) {?>

    <?php if ($_smarty_tpl->tpl_vars['span']->value > 0) {?>
        <td class="ocupado"
            rowspan="<?php echo $_smarty_tpl->tpl_vars['span']->value;?>
"
            data-id="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
"
            style="background: <?php echo (($tmp = $_smarty_tpl->tpl_vars['info']->value['cor'] ?? null)===null||$tmp==='' ? '#dc3545' ?? null : $tmp);?>
;">

            <strong><?php echo $_smarty_tpl->tpl_vars['info']->value['cliente'];?>
</strong><br>
            <small><?php echo $_smarty_tpl->tpl_vars['info']->value['servico'];?>
</small>

        </td>
    <?php }?>

<?php } else { ?>

    <td class="livre"
        data-hora="<?php echo $_smarty_tpl->tpl_vars['h']->value['hor_id'];?>
"
        data-pista="<?php echo $_smarty_tpl->tpl_vars['p']->value['pis_id'];?>
">
        Livre
    </td>

<?php }?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

</div>

<!-- 🔳 MODAL -->
<div id="modalBg" class="modal-bg">
    <div class="modal">
        <div id="modalContent"></div>
    </div>
</div>

<!-- JQUERY -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

// =============================
// 🔄 CARREGAR AGENDA
// =============================
function carregarAgenda(){

    let data = $('#dataAgenda').val();

    $('#agendaContainer').load(
        'agenda_ajax.php?acao=lista&data=' + data
    );

}

// =============================
// 📅 TROCAR DATA
// =============================
$('#dataAgenda').on('change', function(){
    carregarAgenda();
});

// =============================
// ⏱ AUTO REFRESH
// =============================
setInterval(function(){
    carregarAgenda();
}, 30000);

// =============================
// 🟢 NOVO AGENDAMENTO
// =============================
$(document).on('click', '.livre', function(){

    let hora  = $(this).data('hora');
    let pista = $(this).data('pista');
    let data  = $('#dataAgenda').val();

    $('#modalBg').show();

    $('#modalContent').load(
        'agenda_ajax.php?acao=cadastrar&hora='+hora+'&pista='+pista+'&data='+data
    );

});

// =============================
// 🔴 DETALHES
// =============================
$(document).on('click', '.ocupado', function(){

    let id = $(this).data('id');

    $('#modalBg').show();

    $('#modalContent').load(
        'agenda_ajax.php?acao=descricao&id='+id
    );

});

// =============================
// ❌ FECHAR MODAL
// =============================
$('#modalBg').click(function(e){
    if(e.target.id === 'modalBg'){
        $(this).hide();
    }
});

<?php echo '</script'; ?>
><?php }
}
