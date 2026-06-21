{include file="topo.tpl"}

<br>
<br>
<br>

{include file="abas.tpl"}

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

	{include file="popups/excluir_registro.tpl"}
  
</div>



<script type="text/javascript" src="{$pagina->base}js/formulario/clientes.js"> </script>
{include file="rodape.tpl"}