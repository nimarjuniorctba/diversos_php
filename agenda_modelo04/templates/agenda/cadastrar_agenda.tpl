<h2>Novo Agendamento</h2>

<form id="formAgendamento">

<input type="hidden" name="data" value="{$dataSelecionada}">

<label>Cliente:</label><br>
<select name="cliente" required>
    {foreach from=$CLIENTES item=c}
        <option value="{$c.cli_id}">{$c.cli_nome}</option>
    {/foreach}
</select><br><br>

<label>Serviço:</label><br>
<select name="servico" required>
    {foreach from=$SERVICOS item=s}
        <option value="{$s.ser_id}">
            {$s.ser_nome}
        </option>
    {/foreach}
</select><br><br>

<label>Pista:</label><br>
<select name="pista" required>
    {foreach from=$PISTAS item=p}
        <option value="{$p.pis_id}" 
        {if $p.pis_id == $pistaSelecionada}selected{/if}>
            {$p.pis_nome}
        </option>
    {/foreach}
</select><br><br>

<label>Horário:</label><br>
<select name="hora" required>
    {foreach from=$HORARIOS item=h}
        <option value="{$h.hor_id}" 
        {if $h.hor_id == $horaSelecionada}selected{/if}>
            {$h.hor_hora}
        </option>
    {/foreach}
</select><br><br>

<label>Desconto:</label><br>
<input type="number" step="0.01" name="desconto" value="0"><br><br>

<button type="submit">Salvar</button>

</form>

<script>
$('#formAgendamento').submit(function(e){

    e.preventDefault();

    $.post('agenda_ajax.php', $(this).serialize(), function(res){

        if(res.status === 'ok'){
            alert('Agendado!');
            location.reload();
        }

    }, 'json');

});
</script>