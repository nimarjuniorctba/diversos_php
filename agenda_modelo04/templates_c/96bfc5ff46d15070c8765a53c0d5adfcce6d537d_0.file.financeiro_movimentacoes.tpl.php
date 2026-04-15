<?php
/* Smarty version 4.1.0, created on 2026-04-15 09:04:32
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\financeiro_movimentacoes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69df7ed080a1e0_62191131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96bfc5ff46d15070c8765a53c0d5adfcce6d537d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\financeiro_movimentacoes.tpl',
      1 => 1776254404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69df7ed080a1e0_62191131 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Movimentações Financeiras</title>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>

<style>
body { font-family: Arial; margin:0; }
.menu { background:#333; padding:15px; }
.menu a { color:#fff; margin-right:15px; text-decoration:none; font-weight:bold; }
.container { padding:20px; max-width:1100px; margin:auto; }

.filtro { display:flex; gap:10px; flex-wrap:wrap; }
.filtro div { flex:1; min-width:150px; }

input,select,button { padding:10px; width:100%; box-sizing:border-box; margin-top:5px; }

button { background:#007bff; color:#fff; border:none; cursor:pointer; }

.btn-mini { width:auto; padding:6px 10px; font-size:12px; background:#6c757d; }

.bloco-resultado { margin-top:30px; }

.topo { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px; }

.grid { display:flex; gap:20px; margin-top:15px; flex-wrap:wrap; }

.tabela-box { flex:2; min-width:300px; }
.grafico-box { flex:1; min-width:250px; }

table { width:100%; border-collapse:collapse; }
th,td { padding:10px; border:1px solid #ccc; text-align:center; }

th { background:#333; color:#fff; }

.entrada { color:green; }
.saida { color:red; }

.acoes button {
    width:auto;
    padding:4px 6px;
    font-size:14px;
    margin:2px;
}

/* RESPONSIVO */
@media (max-width: 768px){
    .grid { flex-direction:column; }
    .topo { flex-direction:column; align-items:flex-start; }
}
</style>

</head>
<body>

<div class="menu">
    <a href="#">🏠 Home</a>
    <a href="#">📊 Movimentações</a>
</div>

<div class="container">

<h3>Filtros</h3>

<div class="filtro">

<div>
<label>Data Inicial</label>
<input type="date" id="dataInicio">
</div>

<div>
<label>Data Final</label>
<input type="date" id="dataFim">
</div>

<div>
<label>Tipo</label>
<select id="tipoFiltro">
<option value="todos">Todos</option>
<option value="entrada">Entrada</option>
<option value="saida">Saída</option>
</select>
</div>

<div>
<label>Origem</label>
<select id="origemFiltro">
<option value="todos">Todos</option>
<option value="agenda">Agenda</option>
<option value="manual">Manual</option>
</select>
</div>

<div>
<label>Serviço</label>
<select id="servicoFiltro">
<option value="todos">Todos</option>
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

<br>
<button id="btnFiltrar">Filtrar</button>

<div class="bloco-resultado">

<div class="topo">
<div>
Entradas: R$ <span id="totalEntrada">0</span> |
Saídas: R$ <span id="totalSaida">0</span>

<select id="filtroRapido">
<option value="todos">Todos</option>
<option value="entrada">Entradas</option>
<option value="saida">Saídas</option>
</select>
</div>

<button id="btnRelatorio" class="btn-mini">📄 PDF</button>
</div>

<div class="grid">

<div class="tabela-box">
<table>
<thead>
<tr>
<th>Data</th>
<th>Tipo</th>
<th>Origem</th>
<th>Descrição</th>
<th>Valor</th>
<th>Ações</th>
</tr>
</thead>
<tbody id="tabela"></tbody>
</table>
</div>

<div class="grafico-box">
<canvas id="grafico"></canvas>
</div>

</div>
</div>
</div>

<!-- MODAL -->
<div id="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:#00000080;">
<div style="background:#fff; padding:20px; max-width:400px; margin:100px auto;">
<h3>Editar</h3>

<input type="hidden" id="editId">

<label>Descrição</label>
<input type="text" id="editDesc">

<label>Valor</label>
<input type="number" id="editValor">

<br><br>

<button onclick="salvarEdicao()">Salvar</button>
<button onclick="excluir()">Excluir</button>
<button onclick="fecharModal()">Fechar</button>

</div>
</div>


<?php echo '<script'; ?>
>

let chart;
let listaAtual = [];

function render(lista){

    listaAtual = lista;

    let filtroRapido = $('#filtroRapido').val();

    let html = "";
    let totalEntrada = 0;
    let totalSaida = 0;

    lista.forEach((item) => {

        if(item.fin_tipo === 'entrada') totalEntrada += parseFloat(item.fin_valor_final);
        else totalSaida += parseFloat(item.fin_valor_final);

        if(filtroRapido !== 'todos' && item.fin_tipo !== filtroRapido) return;

        html += `
        <tr>
            <td>${item.fin_data}</td>
            <td class="${item.fin_tipo}">${item.fin_tipo}</td>
            <td>${item.fin_origem}</td>
            <td>${item.ser_nome ? item.ser_nome : item.fin_descricao}</td>
            <td>R$ ${item.fin_valor_final}</td>
            <td class="acoes">
                <button onclick="abrirModal(${item.fin_id}, '${item.fin_descricao}', ${item.fin_valor_final})">✏️</button>
            </td>
        </tr>
        `;
    });

    $('#tabela').html(html);
    $('#totalEntrada').text(totalEntrada.toFixed(2));
    $('#totalSaida').text(totalSaida.toFixed(2));

    if(chart) chart.destroy();

    chart = new Chart(document.getElementById('grafico'), {
        type: 'doughnut',
        data: {
            labels: ['Entradas','Saídas'],
            datasets:[{data:[totalEntrada,totalSaida]}]
        }
    });
}

$('#btnFiltrar').click(function(){

    $.post('financeiro_movimentacoes.php',{
        ajax:1,
        dataInicio: $('#dataInicio').val(),
        dataFim: $('#dataFim').val(),
        tipo: $('#tipoFiltro').val(),
        origem: $('#origemFiltro').val(),
        servico: $('#servicoFiltro').val()
    }, function(res){
        render(res);
    }, 'json');

});

$('#filtroRapido').change(function(){
    render(listaAtual);
});

function abrirModal(id, desc, valor){
    $('#editId').val(id);
    $('#editDesc').val(desc);
    $('#editValor').val(valor);
    $('#modal').fadeIn();
}

function fecharModal(){
    $('#modal').fadeOut();
}

function salvarEdicao(){
    $.post('financeiro_movimentacoes.php',{
        editar:1,
        id: $('#editId').val(),
        descricao: $('#editDesc').val(),
        valor: $('#editValor').val()
    }, function(){
        location.reload();
    });
}

function excluir(){
    if(confirm('Excluir?')){
        $.post('financeiro_movimentacoes.php',{
            excluir:1,
            id: $('#editId').val()
        }, function(){
            location.reload();
        });
    }
}

$('#btnRelatorio').click(function(){

    let params = new URLSearchParams({
        dataInicio: $('#dataInicio').val(),
        dataFim: $('#dataFim').val(),
        tipo: $('#tipoFiltro').val(),
        origem: $('#origemFiltro').val(),
        servico: $('#servicoFiltro').val()
    });

    window.open('financeiro_relatorio.php?' + params.toString(), '_blank');

});

$('#btnFiltrar').click();

<?php echo '</script'; ?>
>


</body>
</html><?php }
}
