<style>
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 900px;
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
    }

    .ocupado {
        background: #f8d7da;
        font-weight: bold;
    }
</style>

<h2>Agenda do Dia</h2>

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

                {if $OCUPADOS[$h.hor_id][$p.pis_id]|default:false}
                    <td class="ocupado">Ocupado</td>
                {else}
                    <td class="livre">Livre</td>
                {/if}

            {/foreach}

        </tr>
        {/foreach}
    </tbody>
</table>