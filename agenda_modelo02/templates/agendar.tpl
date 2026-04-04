<style>
    body {
        font-family: Arial;
        background: #f4f4f4;
        padding: 20px;
    }

    form {
        background: #fff;
        padding: 20px;
        max-width: 400px;
        border-radius: 8px;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    select, input, button {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
    }

    button {
        background: #28a745;
        color: #fff;
        border: none;
        margin-top: 15px;
        cursor: pointer;
    }
</style>

<h2>Novo Agendamento</h2>

<form method="POST">

    <label>Data</label>
    <input type="date" name="data" required>

    <label>Horário</label>
    <select name="hora" required>
        {foreach from=$HORARIOS item=h}
            <option value="{$h.hor_id}">{$h.hor_hora}</option>
        {/foreach}
    </select>

    <label>Pista</label>
    <select name="pista" required>
        {foreach from=$PISTAS item=p}
            <option value="{$p.pis_id}">{$p.pis_nome}</option>
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