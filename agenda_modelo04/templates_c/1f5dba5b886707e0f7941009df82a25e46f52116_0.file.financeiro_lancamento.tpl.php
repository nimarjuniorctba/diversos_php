<?php
/* Smarty version 4.1.0, created on 2026-04-15 00:23:19
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\financeiro_lancamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69df04a7de91b7_71149385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5dba5b886707e0f7941009df82a25e46f52116' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\financeiro_lancamento.tpl',
      1 => 1776223396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69df04a7de91b7_71149385 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lançamentos Financeiros</title>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: Arial; margin: 0; }

.menu { background:#333; padding:15px; }
.menu a { color:#fff; margin-right:15px; text-decoration:none; font-weight:bold; }

.container { padding:20px; max-width:800px; margin:auto; }

input, select, button {
    padding:10px;
    margin:5px 0;
    width:100%;
    box-sizing:border-box;
}

button {
    background:#28a745;
    color:#fff;
    border:none;
    cursor:pointer;
}
button:hover { background:#218838; }

.btn-danger { background:#dc3545; }
.btn-danger:hover { background:#c82333; }

.hidden { display:none; }

.bloco-tabela { margin-top:30px; }

.topo-tabela {
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.resumo { font-weight:bold; }
.entrada-total { color:green; }
.saida-total { color:red; }

table {
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

th, td {
    padding:10px;
    border:1px solid #ccc;
    text-align:center;
}

th { background:#333; color:#fff; }

.entrada { color:green; }
.saida { color:red; }

.acoes button {
    width:auto;
    padding:5px 8px;
    font-size:12px;
}

/* MODAL */
.modal {
    display:none;
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.5);
}

.modal-content {
    background:#fff;
    padding:20px;
    width:300px;
    margin:10% auto;
    border-radius:8px;
}
</style>
</head>

<body>

<div class="menu">
    <a href="#">🏠 Home</a>
    <a href="#">💰 Lançamentos</a>
</div>

<div class="container">

<h2>Novo Lançamento</h2>

<form method="POST" action="financeiro_lancamento.php">

<label>Tipo:</label>
<select name="tipo" id="tipo">
    <option value="entrada">Entrada</option>
    <option value="saida">Saída</option>
</select>

<!-- ENTRADA -->
<div id="boxEntrada">
    <label>Tipo da Entrada:</label>
    <select name="tipoEntrada" id="tipoEntrada">
        <option value="servico">Serviço</option>
        <option value="manual">Manual</option>
    </select>

    <div id="selectServico">
        <label>Serviço:</label>
        <select name="servico">
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
    </div>
</div>

<!-- SAÍDA -->
<div id="boxSaida" class="hidden">
    <label>Categoria:</label>
    <select name="categoria">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['cat_nome'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
</div>

<label>Valor:</label>
<input type="number" name="valor" required>

<label>Descrição:</label>
<input type="text" name="descricao" required>

<button type="submit">Salvar</button>

</form>

<!-- BLOCO TABELA -->
<div class="bloco-tabela">

<h3>📅 Lançamentos do Dia</h3>

<div class="topo-tabela">

    <div class="resumo">
        <span class="entrada-total">Entradas: R$ <span id="totalEntrada">0</span></span> |
        <span class="saida-total">Saídas: R$ <span id="totalSaida">0</span></span>
    </div>

    <!-- 🔥 FILTRO RESTAURADO -->
    <div style="width:150px;">
        <select id="filtro">
            <option value="todos">Todos</option>
            <option value="entrada">Entradas</option>
            <option value="saida">Saídas</option>
        </select>
    </div>

</div>

<table>
<thead>
<tr>
    <th>Tipo</th>
    <th>Descrição</th>
    <th>Valor</th>
    <th>Ações</th>
</tr>
</thead>

<tbody id="tabelaDia">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LANCAMENTOS']->value, 'l');
$_smarty_tpl->tpl_vars['l']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->do_else = false;
?>
<tr data-tipo="<?php echo $_smarty_tpl->tpl_vars['l']->value['fin_tipo'];?>
">
    <td class="<?php echo $_smarty_tpl->tpl_vars['l']->value['fin_tipo'];?>
"><?php echo $_smarty_tpl->tpl_vars['l']->value['fin_tipo'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['l']->value['fin_descricao'];?>
</td>
    <td>R$ <?php echo $_smarty_tpl->tpl_vars['l']->value['fin_valor_final'];?>
</td>
    <td class="acoes">
        <button onclick="abrirModal(<?php echo $_smarty_tpl->tpl_vars['l']->value['fin_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['l']->value['fin_tipo'];?>
','<?php echo $_smarty_tpl->tpl_vars['l']->value['fin_descricao'];?>
',<?php echo $_smarty_tpl->tpl_vars['l']->value['fin_valor_final'];?>
)">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>

</table>

</div>
</div>

<!-- MODAL -->
<div class="modal" id="modal">
    <div class="modal-content">

        <h3>Detalhes</h3>

        <input type="hidden" id="modal_id">

        <p><b>Tipo:</b> <span id="modal_tipo"></span></p>
        <p><b>Descrição:</b> <span id="modal_desc"></span></p>
        <p><b>Valor:</b> R$ <span id="modal_valor"></span></p>

        <button id="btnExcluir" class="btn-danger">
            <i class="fa-solid fa-trash"></i> Excluir
        </button>

        <button id="btnFechar">Fechar</button>

    </div>
</div>


<?php echo '<script'; ?>
>

// MODAL
function abrirModal(id,tipo,desc,valor){
    $('#modal_id').val(id);
    $('#modal_tipo').text(tipo);
    $('#modal_desc').text(desc);
    $('#modal_valor').text(valor);
    $('#modal').fadeIn();
}

$('#btnFechar').click(function(){
    $('#modal').fadeOut();
});

$('#btnExcluir').click(function(){
    var id = $('#modal_id').val();

    if(confirm('Excluir lançamento?')){
        $.post('financeiro_excluir.php',{id:id},function(){
            location.reload();
        });
    }
});

// FILTRO 🔥
$('#filtro').change(function(){

    var filtro = $(this).val();

    $('#tabelaDia tr').each(function(){

        var tipo = $(this).data('tipo');

        if(filtro === 'todos' || tipo === filtro){
            $(this).show();
        } else {
            $(this).hide();
        }

    });

});

// TIPO FORM
$('#tipo').change(function(){
    if($(this).val() === 'entrada'){
        $('#boxEntrada').show();
        $('#boxSaida').hide();
    } else {
        $('#boxEntrada').hide();
        $('#boxSaida').show();
    }
});

$('#tipoEntrada').change(function(){
    if($(this).val() === 'manual'){
        $('#selectServico').hide();
    } else {
        $('#selectServico').show();
    }
});

// TOTAL
$(document).ready(function(){

    var totalEntrada = 0;
    var totalSaida = 0;

    $('#tabelaDia tr').each(function(){

        var tipo = $(this).find('td:eq(0)').text();
        var valor = parseFloat($(this).find('td:eq(2)').text().replace('R$',''));

        if(tipo === 'entrada') totalEntrada += valor;
        else totalSaida += valor;

    });

    $('#totalEntrada').text(totalEntrada.toFixed(2));
    $('#totalSaida').text(totalSaida.toFixed(2));

});

<?php echo '</script'; ?>
>


</body>
</html><?php }
}
