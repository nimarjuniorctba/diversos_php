<?php
/* Smarty version 4.1.0, created on 2026-06-16 15:24:08
  from 'C:\xampp\htdocs\okmotoboyexpress\sistema.okmotoboyexpress.com.br\template\agenda\agenda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6a3194c8e07861_15010637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd73b0f56c74755f456aab48e163b05ee7f9564ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\okmotoboyexpress\\sistema.okmotoboyexpress.com.br\\template\\agenda\\agenda.tpl',
      1 => 1781365210,
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
function content_6a3194c8e07861_15010637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>
<br>
<br>

<?php $_smarty_tpl->_subTemplateRender("file:abas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table border principal" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
	<td>
<div >
filtros
</div>

<br>
<br>
<br>				
					
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        --max-width: 900px;
        background: #fff;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 6px;
        text-align: center;
        font-size: 14px;
    }

    th {
        background: #333;
        color: white;
    }

    .pista1 { background: #cce5ff; font-weight: bold; }
    .pista2 { background: #d4edda; font-weight: bold; }
    .pista3 { background: #fff3cd; font-weight: bold; }

    .livre {
        background: #f8f9fa;
        color: #999;
    }
</style>

<h2>Agenda do Dia (08:00 às 18:00)</h2>

<table>
<tr>
    <th>Horário</th>
    <th>Pista 1</th>
    <th>Pista 2</th>
    <th>Pista 3</th>
</tr>

<!-- 08:00 -->
<tr>
    <td>08:00</td>
    <td class="pista1" rowspan="2">Lavagem Rápida</td>
    <td class="pista2" rowspan="4">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>08:15</td>
    <td class="pista3">Lavagem Interna</td>
</tr>

<tr>
    <td>08:30</td>
    <td class="livre">Livre</td>
    <td class="pista3" rowspan="2">Lavagem Interna</td>
</tr>

<tr>
    <td>08:45</td>
    <td class="pista1" rowspan="4">Lavagem com Cera</td>
</tr>

<tr>
    <td>09:00</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>09:15</td>
    <td class="pista2" rowspan="2">Lavagem Rápida</td>
    <td class="livre">Livre</td>
</tr>

<!-- 🔥 CORREÇÃO DO ERRO (09:30 agora tem pista correta) -->
<tr>
    <td>09:30</td>
    <td class="livre">Livre</td>
   
</tr>

<tr>
    <td>09:45</td>
    <td class="pista1">Lavagem Interna</td>
    <td class="livre">Livre</td> <td class="livre">Livre</td>
</tr>

<tr>
    <td>10:00</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
	 <td class="livre">Livre</td>
</tr>

<tr>
    <td>10:15</td>
    <td class="pista1" rowspan="2">Lavagem Rápida</td>
    <td class="pista2" rowspan="4">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>10:30</td>
    <td class="pista3" rowspan="2">Lavagem Interna</td>
</tr>

<tr>
    <td>10:45</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>11:00</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>11:15</td>
    <td class="pista1" rowspan="4">Lavagem com Cera</td>
    <td class="livre">Livre</td>
    <td class="pista3" rowspan="2">Lavagem Rápida</td>
</tr>

<tr>
    <td>11:30</td>
    <td class="pista2" rowspan="2">Lavagem Completa</td>
</tr>

<tr>
    <td>11:45</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>12:00</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<!-- TARDE PREENCHIDA EXEMPLO -->

<tr>
    <td>12:15</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>12:30</td>
    <td class="pista1" rowspan="2">Lavagem Rápida</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>12:45</td>
    <td class="pista2" rowspan="3">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>13:00</td>
    <td class="livre">Livre</td>
    <td class="pista3" rowspan="2">Lavagem Interna</td>
</tr>

<tr>
    <td>13:15</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>13:30</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>13:45</td>
    <td class="pista1" rowspan="2">Lavagem com Cera</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>14:00</td>
    <td class="livre">Livre</td>
    <td class="pista3">Lavagem Interna</td>
</tr>

<tr>
    <td>14:15</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>14:30</td>
    <td class="livre">Livre</td>
    <td class="pista2" rowspan="2">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>14:45</td>
    <td class="pista1">Lavagem Rápida</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>15:00</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="pista3" rowspan="2">Lavagem Interna</td>
</tr>

<tr>
    <td>15:15</td>
    <td class="pista1">Lavagem Rápida</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>15:30</td>
    <td class="livre">Livre</td>
    <td class="pista2">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>15:45</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>16:00</td>
    <td class="pista1" rowspan="2">Lavagem com Cera</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>16:15</td>
    <td class="pista2">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>16:30</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="pista3">Lavagem Interna</td>
</tr>

<tr>
    <td>16:45</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>17:00</td>
    <td class="pista1">Lavagem Rápida</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>17:15</td>
    <td class="livre">Livre</td>
    <td class="pista2">Lavagem Completa</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>17:30</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="pista3">Lavagem Interna</td>
</tr>

<tr>
    <td>17:45</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

<tr>
    <td>18:00</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
    <td class="livre">Livre</td>
</tr>

</table>			
					
					
</div>
	
	</td>
    </tr>
</table>


<div id="dialog-excluir" title="Confirmar exclusão" style="display: none;">

	<?php $_smarty_tpl->_subTemplateRender("file:popups/excluir_registro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
</div>



<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->base;?>
js/formulario/clientes.js"> <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
