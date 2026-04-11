<?php
/* Smarty version 4.1.0, created on 2026-04-09 17:11:02
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d807d6a38916_57887561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7fb4a14abd040d6a4a62b24887da3e3ffcfb659' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\agenda.tpl',
      1 => 1775765457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d807d6a38916_57887561 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
}

h2 {
    margin-bottom: 10px;
}

.topo {
    margin-bottom: 15px;
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

<div class="topo">
    <label><strong>Data:</strong></label>
    <input type="date" id="dataAgenda" value="<?php echo $_smarty_tpl->tpl_vars['DATA_ATUAL']->value;?>
">
</div>

<!-- MODAL -->
<div id="modalBg" class="modal-bg">
    <div class="modal">
        <div id="modalContent"></div>
    </div>
</div>

<!-- AGENDA CARREGA VIA AJAX -->
<div id="agendaContainer"></div>

<!-- JQUERY -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

// =============================
// 🔄 CARREGA AGENDA
// =============================
function carregarAgenda(){

    let data = $('#dataAgenda').val();

    $('#agendaContainer').load(
        'agenda_ajax.php?acao=lista&data=' + data
    );
}

// =============================
// 📅 TROCA DE DATA
// =============================
$('#dataAgenda').on('change', function(){
    carregarAgenda();
});

// =============================
// ⏱ AUTO REFRESH (30s)
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
        'agenda_ajax.php?acao=cadastrar&hora=' + hora + '&pista=' + pista + '&data=' + data
    );
});

// =============================
// 🔴 DETALHES
// =============================
$(document).on('click', '.ocupado', function(){

    let id = $(this).data('id');

    $('#modalBg').show();

    $('#modalContent').load(
        'agenda_ajax.php?acao=descricao&id=' + id
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

// =============================
// 🚀 INICIALIZA
// =============================
carregarAgenda();

<?php echo '</script'; ?>
><?php }
}
