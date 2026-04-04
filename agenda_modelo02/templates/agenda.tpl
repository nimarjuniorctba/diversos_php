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
    }

    .ocupado {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        font-weight: bold;
        font-size: 12px;
        vertical-align: middle;
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

                {assign var=info value=$OCUPADOS[$h.hor_id][$p.pis_id]|default:null}
                {assign var=span value=$ROWSPAN[$h.hor_id][$p.pis_id]|default:null}

                {if $info}

                    {if $span > 0}
                        <td class="ocupado" rowspan="{$span}">
                            <strong>{$info.cliente}</strong><br>
                            <small>{$info.servico}</small><br>
                            <small>{$info.duracao} min</small>
                        </td>
                    {/if}

                {else}

                    <td class="livre">Livre</td>

                {/if}

            {/foreach}

        </tr>
        {/foreach}
    </tbody>
</table>