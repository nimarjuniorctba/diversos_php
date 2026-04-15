<?php
/* Smarty version 4.1.0, created on 2026-04-15 00:43:28
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\financeiro_movimentacoes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69df0960f25fe0_86930989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96bfc5ff46d15070c8765a53c0d5adfcce6d537d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\financeiro_movimentacoes.tpl',
      1 => 1776224589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69df0960f25fe0_86930989 (Smarty_Internal_Template $_smarty_tpl) {
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

input, select, button {
    padding:10px;
    width:100%;
    box-sizing:border-box;
    margin-top:5px;
}

button { background:#007bff; color:#fff; border:none; cursor:pointer; }

.btn-mini {
    width:auto;
    padding:6px 10px;
    font-size:12px;
    background:#6c757d;
}

.bloco-resultado { margin-top:30px; }

.topo {
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
}

.resumo { font-weight:bold; }

.entrada-total { color:green; }
.saida-total { color:red; }

.grid { display:flex; gap:20px; margin-top:15px; flex-wrap:wrap; }

.tabela-box { flex:2; min-width:300px; }
.grafico-box { flex:1; min-width:250px; }

table { width:100%; border-collapse:collapse; }

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
    padding:4px 6px;
    font-size:12px;
    margin:2px;
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
</div>

<br>
<button id="btnFiltrar">Filtrar</button>

<div class="bloco-resultado">

<h3>📊 Movimentações Financeiras</h3>

<div class="topo">

<div class="resumo">
    <span class="entrada-total">Entradas: R$ <span id="totalEntrada">0</span></span> |
    <span class="saida-total">Saídas: R$ <span id="totalSaida">0</span></span>

    <select id="filtroRapido" style="width:auto; margin-left:10px;">
        <option value="todos">Todos</option>
        <option value="entrada">Entradas</option>
        <option value="saida">Saídas</option>
    </select>
</div>

<div>
    <button class="btn-mini">📄 Gerar Relatório (PDF)</button>
</div>

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


<?php echo '<script'; ?>
>

let chart;
let listaAtual = [];

// RENDER
function render(lista){

    listaAtual = lista;

    let filtroRapido = $('#filtroRapido').val();

    let html = "";
    let entrada = 0;
    let saida = 0;

    lista.forEach((item, index)=>{

        let valor = parseFloat(item.fin_valor_final);

        if(item.fin_tipo === 'entrada') entrada += valor;
        else saida += valor;

        if(filtroRapido !== 'todos' && item.fin_tipo !== filtroRapido) return;

        html += `
        <tr>
            <td>${item.fin_data}</td>
            <td class="${item.fin_tipo}">${item.fin_tipo}</td>
            <td>${item.fin_origem}</td>
            <td>${item.fin_descricao}</td>
            <td>R$ ${valor}</td>
            <td class="acoes">
                <button onclick="alert('editar futuro')">✏️</button>
                <button onclick="alert('excluir futuro')">❌</button>
            </td>
        </tr>`;
    });

    $('#tabela').html(html);
    $('#totalEntrada').text(entrada.toFixed(2));
    $('#totalSaida').text(saida.toFixed(2));

    if(chart) chart.destroy();

    chart = new Chart(document.getElementById('grafico'), {
        type: 'doughnut',
        data: {
            labels: ['Entradas','Saídas'],
            datasets: [{
                data: [entrada, saida]
            }]
        }
    });
}

// FILTRO
$('#btnFiltrar').click(function(){

    $.ajax({
        url:'financeiro_movimentacoes.php',
        method:'POST',
        dataType:'json',
        data:{
            ajax:1,
            dataInicio: $('#dataInicio').val(),
            dataFim: $('#dataFim').val(),
            tipo: $('#tipoFiltro').val(),
            origem: $('#origemFiltro').val()
        },
        success:function(res){
            render(res);
        }
    });

});

// FILTRO RÁPIDO
$('#filtroRapido').change(function(){
    render(listaAtual);
});

// INIT
$('#btnFiltrar').click();

<?php echo '</script'; ?>
>


</body>
</html><?php }
}
