{include file="topo.tpl"}

<br><br><br>

<!-- DataTables CSS (recomendado adicionar se ainda não tiver) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (caso ainda não tenha no topo.tpl) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

{include file="abas.tpl"}

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
                        {if $qte_registros > 0}
                            {foreach $array_clientes item=$clientes}
                                <tr>
                                    <td>{$clientes.nome}</td>
                                    <td>{$clientes.email}</td>
                                    <td>{$clientes.celular}</td>
                                    <td>{$clientes.dt_cadastro}</td>
                                    <td>{$clientes.status}</td>
                                    <td>
                                        <a href="{$pagina->base}clientes/alterar/{$clientes.idurl}">
                                            <img src="{$pagina->base}imagens/icones/editar.png" 
                                                 style="width:20px;height:20px;margin-right:5px;cursor:pointer;">
                                        </a>

                                        <img src="{$pagina->base}imagens/icones/lixo.png" 
                                             style="width:20px;height:20px;margin-right:10px;cursor:pointer;" 
                                             class="btn-excluir" 
                                             data-id="{$clientes.idurl}">
                                    </td>
                                </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td colspan="6" style="text-align:center;">Sem registros</td>
                            </tr>
                        {/if}
                    </tbody>

                </table>
            </div>

        </td>
    </tr>
</table>

<div id="dialog-excluir" title="Confirmar exclusão" style="display:none;">
    {include file="popups/excluir_registro.tpl"}
</div>



<script type="text/javascript" src="{$pagina->base}js/formulario/clientes.js"></script>

{include file="rodape.tpl"}