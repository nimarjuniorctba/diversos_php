<?php
/* Smarty version 4.1.0, created on 2026-05-02 09:58:57
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo04\templates\agenda\descricao.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f5f511a71207_15692514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7fe0d372d8b53cf33b77476bfef5257c12d3a13' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo04\\templates\\agenda\\descricao.tpl',
      1 => 1777726091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f5f511a71207_15692514 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Detalhes do Agendamento</h2>

<p><strong>Cliente:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['cli_nome'];?>
</p>
<p><strong>Email:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['cli_email'];?>
</p>

<hr>

<p><strong>Veículo:</strong> <?php echo (($tmp = $_smarty_tpl->tpl_vars['AG']->value['vei_modelo'] ?? null)===null||$tmp==='' ? "-" ?? null : $tmp);?>
 (<?php echo (($tmp = $_smarty_tpl->tpl_vars['AG']->value['vei_placa'] ?? null)===null||$tmp==='' ? "-" ?? null : $tmp);?>
)</p>

<hr>

<p><strong>Serviço:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['ser_nome'];?>
</p>
<p><strong>Valor:</strong> R$ <?php echo $_smarty_tpl->tpl_vars['AG']->value['ser_valor'];?>
</p>
<p><strong>Duração:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['ser_duracao'];?>
 min</p>

<hr>

<p><strong>Início:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['hor_hora'];?>
</p>
<p><strong>Fim:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['hora_fim'];?>
</p>

<hr>

<p><strong>Desconto:</strong> R$ <?php echo (($tmp = $_smarty_tpl->tpl_vars['AG']->value['age_desconto'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</p>
<p><strong>Valor Final:</strong> R$ <?php echo (($tmp = $_smarty_tpl->tpl_vars['AG']->value['age_valor_final'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</p>

<hr>

<button id="btnCancelar" data-id="<?php echo $_smarty_tpl->tpl_vars['AG']->value['age_id'];?>
">
Cancelar Agendamento
</button>

<?php if (!$_smarty_tpl->tpl_vars['JA_PAGO']->value) {?>
<button id="btnPagar" data-id="<?php echo $_smarty_tpl->tpl_vars['AG']->value['age_id'];?>
" style="background:green;color:#fff;">
💰 Fazer Pagamento
</button>
<?php } else { ?>
<p style="color:green;font-weight:bold;">✅ Pagamento já realizado</p>
<?php }?>


<?php echo '<script'; ?>
>

// CANCELAR
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


// PAGAR
$('#btnPagar').click(function(){

    if(!confirm('Confirmar pagamento?')) return;

    $.post('agenda_ajax.php?acao=pagar',{
        id: $(this).data('id')
    }, function(res){

        if(res.status === 'ok'){
            alert('Pagamento registrado!');
            location.reload();
        }

        if(res.status === 'erro'){
            alert('Erro ao pagar');
        }

    },'json');

});

<?php echo '</script'; ?>
>
<?php }
}
