<?php
/* Smarty version 4.1.0, created on 2026-04-05 10:07:48
  from 'C:\xampp\htdocs\diversos_php\agenda_modelo03\templates\agenda\descricao.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69d25ea41c82b0_74126855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '823372ba62bfdd014a1d2e7b47f74a1687c650d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\diversos_php\\agenda_modelo03\\templates\\agenda\\descricao.tpl',
      1 => 1775307875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d25ea41c82b0_74126855 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Detalhes do Agendamento</h2>

<p><strong>Cliente:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['cli_nome'];?>
</p>
<p><strong>Email:</strong> <?php echo $_smarty_tpl->tpl_vars['AG']->value['cli_email'];?>
</p>

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

<p><strong>Desconto:</strong> R$ <?php echo $_smarty_tpl->tpl_vars['AG']->value['age_desconto'];?>
</p>
<p><strong>Valor Final:</strong> R$ <?php echo $_smarty_tpl->tpl_vars['AG']->value['age_valor_final'];?>
</p>

<hr>

<p><strong>Comentário:</strong><br><?php echo (($tmp = $_smarty_tpl->tpl_vars['AG']->value['com_comentario'] ?? null)===null||$tmp==='' ? "-" ?? null : $tmp);?>
</p>

<hr>

<button id="btnCancelar" data-id="<?php echo $_smarty_tpl->tpl_vars['AG']->value['age_id'];?>
">
Cancelar Agendamento
</button>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
><?php }
}
