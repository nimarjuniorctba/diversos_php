{include file="topo.tpl"}

<br>
<div style="margin-left:32px;"><h6>{$pagina->titulo}</h6></div>
<br>

{include file="abas.tpl"}

<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>
				<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>
				<!--<div class="alert alert-danger" role="alert">Não foi possivel cadastrar, verifique os dados</div>-->
				{$mensagem|default:''}
			</div>
				<br>
					<div class="table-responsive-sm">
					

<div class="header text-center">
    <h2>Sistema de Teste</h2>
</div>

<div class="container mt-4">

    <!-- Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Hoje</h5>
                <h3>R$ 850,00</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Serviços</h5>
                <h3>24</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Clientes</h5>
                <h3>12</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Funcionários</h5>
                <h3>5</h3>
            </div>
        </div>
    </div>

    <!-- Tabela -->
    <div class="card p-3">
        <h5>Movimentações</h5>

        <table id="tabela" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>João</td>
                    <td>Lavagem Completa</td>
                    <td>R$ 50,00</td>
                    <td>27/03/2026</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Maria</td>
                    <td>Polimento</td>
                    <td>R$ 120,00</td>
                    <td>27/03/2026</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Carlos</td>
                    <td>Lavagem Simples</td>
                    <td>R$ 30,00</td>
                    <td>27/03/2026</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            }
        });
    });
</script>
					
					
					
					</div>	
	</td>
    </tr>
</table>


{include file="rodape.tpl"}