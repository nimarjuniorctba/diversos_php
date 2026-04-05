<style>
form {
    background:#fff;
    padding:20px;
}
</style>

<h2>Novo Agendamento</h2>

<form id="formAgenda">

<label>Data</label>
<input type="date" name="data" required>

<label>Horário</label>
<select name="hora" required>
{foreach from=$HORARIOS item=h}
<option value="{$h.hor_id}" {if $h.hor_id == $horaSelecionada}selected{/if}>
{$h.hor_hora}
</option>
{/foreach}
</select>

<label>Pista</label>
<select name="pista" required>
{foreach from=$PISTAS item=p}
<option value="{$p.pis_id}" {if $p.pis_id == $pistaSelecionada}selected{/if}>
{$p.pis_nome}
</option>
{/foreach}
</select>

<label>Cliente</label>
<select name="cliente" required>
{foreach from=$CLIENTES item=c}
<option value="{$c.cli_id}">{$c.cli_nome}</option>
{/foreach}
</select>

<label>Serviço</label>
<select name="servico" required>
{foreach from=$SERVICOS item=s}
<option value="{$s.ser_id}">{$s.ser_nome}</option>
{/foreach}
</select>

<button type="submit">Agendar</button>

</form>

<script>
$('#formAgenda').submit(function(e){

    e.preventDefault();

    $.ajax({
        url: 'agenda_ajax.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(res){

            if(res.status === 'ok'){
                alert('Agendado com sucesso!');

                // fecha modal
                $('#modalBg').hide();

                // 🔥 atualiza agenda (reload simples)
                location.reload();
            } else {
                alert('Erro ao salvar');
            }
        }
    });

});
</script>