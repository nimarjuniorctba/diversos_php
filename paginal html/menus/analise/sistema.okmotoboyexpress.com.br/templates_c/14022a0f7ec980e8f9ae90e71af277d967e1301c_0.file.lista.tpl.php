<?php
/* Smarty version 4.1.0, created on 2026-03-27 10:09:47
  from 'C:\xampp\htdocs\boxlav\sistema.boxlav.com.br\template\clientes\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69c6819bf1b570_10032944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14022a0f7ec980e8f9ae90e71af277d967e1301c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\boxlav\\sistema.boxlav.com.br\\template\\clientes\\lista.tpl',
      1 => 1774616985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
    'file:abas.tpl' => 1,
    'file:popups/excluir_registro.tpl' => 1,
    'file:rodape.tpl' => 1,
  ),
),false)) {
function content_69c6819bf1b570_10032944 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br><br><br>

<!-- DataTables CSS (recomendado adicionar se ainda não tiver) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (caso ainda não tenha no topo.tpl) -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

<!-- DataTables -->
<?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table border principal" style="width:94%; margin-top:-1; margin-left:3%;">
    <tr>
        <td>

            <div style="display:none;">
                filtros
            </div>

            <br><br><br>

            <div class="table-responsive-sm">
                <table id="tabela" class="table table-bordered table-striped table-hover" style="cursor:pointer;">
                    
                    <thead>
                        <tr class="table-active">
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Data de cadastro</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($_smarty_tpl->tpl_vars['qte_registros']->value > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_clientes']->value, 'clientes');
$_smarty_tpl->tpl_vars['clientes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['clientes']->value) {
$_smarty_tpl->tpl_vars['clientes']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['nome'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['email'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['celular'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['dt_cadastro'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value['status'];?>
</td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
clientes/alterar/<?php echo $_smarty_tpl->tpl_vars['clientes']->value['idurl'];?>
">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/editar.png" 
                                                 style="width:20px;height:20px;margin-right:5px;cursor:pointer;">
                                        </a>

                                        <img src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
imagens/icones/lixo.png" 
                                             style="width:20px;height:20px;margin-right:10px;cursor:pointer;" 
                                             class="btn-excluir" 
                                             data-id="<?php echo $_smarty_tpl->tpl_vars['clientes']->value['idurl'];?>
">
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">Sem registros</td>
                            </tr>
                        <?php }?>
                    </tbody>

                </table>
            </div>

        </td>
    </tr>
</table>

<div id="dialog-excluir" title="Confirmar exclusão" style="display:none;">
    <?php $_smarty_tpl->_subTemplateRender("file:popups/excluir_registro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>



<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/clientes.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
