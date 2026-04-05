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
        <td class="ocupado" rowspan="{$span}" data-id="{$info.id}">
            <strong>{$info.cliente}</strong><br>
            <small>{$info.servico}</small>
        </td>
    {/if}

{else}

    <td class="livre" data-hora="{$h.hor_id}" data-pista="{$p.pis_id}">
        Livre
    </td>

{/if}

{/foreach}

</tr>
{/foreach}
</tbody>
</table>