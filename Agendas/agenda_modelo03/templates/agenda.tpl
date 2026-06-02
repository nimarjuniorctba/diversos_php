<style>
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
<input type="date" id="dataAgenda" value="{$DATA_ATUAL}">

<br><br>

<!-- 📊 AGENDA -->
<div id="agendaContainer">

<table>
<thead>
<tr>
    <th>Horário</th>

    {foreach from=$PISTAS item=p}
        <th>{$p.pis_nome}</th>
    {/foreach}
</tr>
</thead>

<tbody>
{foreach from=$HORARIOS item=h}
<tr>

<td>{$h.hor_hora}</td>

{foreach from=$PISTAS item=p}

{assign var=info value=$OCUPADOS[$h.hor_id][$p.pis_id]|default:null}
{assign var=span value=$ROWSPAN[$h.hor_id][$p.pis_id]|default:0}

{if $info}

    {if $span > 0}
        <td class="ocupado"
            rowspan="{$span}"
            data-id="{$info.id}"
            style="background: {$info.cor|default:'#dc3545'};">

            <strong>{$info.cliente}</strong><br>
            <small>{$info.servico}</small>

        </td>
    {/if}

{else}

    <td class="livre"
        data-hora="{$h.hor_id}"
        data-pista="{$p.pis_id}">
        Livre
    </td>

{/if}

{/foreach}

</tr>
{/foreach}
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

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

</script>