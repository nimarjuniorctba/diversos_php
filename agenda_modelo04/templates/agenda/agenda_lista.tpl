<style>
table {
    border-collapse: collapse;
    width: 100%;
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
    border-radius: 4px;
}

.ocupado small {
    display:block;
    font-size:10px;
}
</style>

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

            <strong>{$info.cliente}</strong>

            <small>{$info.servico}</small>

            {if $info.placa}
                <small>🚗 {$info.placa}</small>
            {/if}

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