<?php
/* Smarty version 4.1.0, created on 2026-04-05 08:35:45
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo03\templates\agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d24911d6c1f3_12240916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aeda6098131bb41639a278cfcf3c7e9ac8ddaa30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo03\\templates\\agenda.tpl',
      1 => 1775388945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/agenda/agenda_lista.tpl' => 1,
  ),
),false)) {
function content_69d24911d6c1f3_12240916 (Smarty_Internal_Template $_smarty_tpl) {
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
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
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

<!-- ✅ SELECT ÚNICO -->
<input type="date" id="dataAgenda" value="<?php echo $_smarty_tpl->tpl_vars['DATA_ATUAL']->value;?>
">

<br><br>

<!-- ✅ CONTAINER DINÂMICO -->
<div id="agendaContainer">
    <?php $_smarty_tpl->_subTemplateRender("file:templates/agenda/agenda_lista.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<!-- MODAL -->
<div id="modalBg" class="modal-bg">
    <div class="modal">
        <div id="modalContent"></div>
    </div>
</div>

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
// 📅 TROCA DATA
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
