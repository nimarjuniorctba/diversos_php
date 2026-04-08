<h2>Detalhes do Agendamento</h2>

<p><strong>Cliente:</strong> {$AG.cli_nome}</p>
<p><strong>Email:</strong> {$AG.cli_email}</p>

<hr>

<p><strong>Veículo:</strong> {$AG.vei_modelo|default:"-"} ({$AG.vei_placa|default:"-"})</p>

<hr>

<p><strong>Serviço:</strong> {$AG.ser_nome}</p>
<p><strong>Valor:</strong> R$ {$AG.ser_valor}</p>
<p><strong>Duração:</strong> {$AG.ser_duracao} min</p>

<hr>

<p><strong>Início:</strong> {$AG.hor_hora}</p>
<p><strong>Fim:</strong> {$AG.hora_fim}</p>

<hr>

<p><strong>Desconto:</strong> R$ {$AG.age_desconto|default:0}</p>
<p><strong>Valor Final:</strong> R$ {$AG.age_valor_final|default:0}</p>

<hr>

<button id="btnCancelar" data-id="{$AG.age_id}">
Cancelar Agendamento
</button>

<script>
$('#btnCancelar').click(function(){

    if(!confirm('Cancelar agendamento?')) return;

    $.post('agenda_ajax.php?acao=cancelar',{
        id: $(this).data('id')
    }, function(res){

        if(res.status==='ok'){
            alert('Cancelado!');
            location.reload();
        }

    },'json');

});
</script>