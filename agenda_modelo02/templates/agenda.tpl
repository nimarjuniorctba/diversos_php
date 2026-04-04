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

<h2>Agenda do Dia</h2>

<!-- MODAL -->
<div id="modalBg" class="modal-bg">
    <div class="modal">
        <div id="modalContent"></div>
    </div>
</div>

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

                {* INFO DO OCUPADO *}
                {assign var=info value=$OCUPADOS[$h.hor_id][$p.pis_id]|default:null}

                {* ROWSPAN *}
                {assign var=span value=$ROWSPAN[$h.hor_id][$p.pis_id]|default:0}

                {* =========================
                   🔴 SE ESTIVER OCUPADO
                ========================== *}
                {if $info}

                    {if $span > 0}
                        <td class="ocupado"
                            rowspan="{$span}"
                            data-id="{$info.id}">

                            <strong>{$info.cliente}</strong><br>
                            <small>{$info.servico}</small>

                        </td>
                    {/if}

                {* =========================
                   🟢 SE ESTIVER LIVRE
                ========================== *}
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

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

// =============================
// 🟢 NOVO AGENDAMENTO
// =============================
$(document).on('click', '.livre', function(){

    let hora  = $(this).data('hora');
    let pista = $(this).data('pista');

    $('#modalBg').show();

    $('#modalContent').load(
        'agenda_ajax.php?acao=cadastrar&hora=' + hora + '&pista=' + pista
    );

});

// =============================
// 🔴 DETALHES DO AGENDAMENTO
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

</script>