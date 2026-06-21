<?php
$con = new mysqli("localhost", "root", "", "rastreador");
$con->set_charset("utf8");

if ($con->connect_error) {
    die("Erro conexão: " . $con->connect_error);
}

if (isset($_GET['ajax'])) {

    $total = $con->query("SELECT COUNT(*) AS total FROM localizacao")
        ->fetch_assoc()['total'];

    $ultimo = $con->query("
        SELECT *
        FROM localizacao
        ORDER BY id DESC
        LIMIT 1
    ")->fetch_assoc();

    $porHora = [];
    $res = $con->query("
        SELECT DATE_FORMAT(datahora, '%H:00') AS hora, COUNT(*) AS total
        FROM localizacao
        WHERE datahora >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
        GROUP BY DATE_FORMAT(datahora, '%Y-%m-%d %H')
        ORDER BY datahora ASC
    ");

    while ($row = $res->fetch_assoc()) {
        $porHora[] = $row;
    }

    $porMinuto = [];
    $res = $con->query("
        SELECT DATE_FORMAT(datahora, '%H:%i') AS minuto, COUNT(*) AS total
        FROM localizacao
        WHERE datahora >= DATE_SUB(NOW(), INTERVAL 60 MINUTE)
        GROUP BY DATE_FORMAT(datahora, '%Y-%m-%d %H:%i')
        ORDER BY datahora ASC
    ");

    while ($row = $res->fetch_assoc()) {
        $porMinuto[] = $row;
    }

    $ultimos = [];
    $res = $con->query("
        SELECT *
        FROM localizacao
        ORDER BY id DESC
        LIMIT 10
    ");

    while ($row = $res->fetch_assoc()) {
        $ultimos[] = $row;
    }

    echo json_encode([
        "total" => $total,
        "ultimo" => $ultimo,
        "porHora" => $porHora,
        "porMinuto" => $porMinuto,
        "ultimos" => $ultimos,
        "atualizado" => date("d/m/Y H:i:s")
    ]);

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard Rastreador</title>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f3f6fb;
    color: #1f2937;
}

header {
    background: linear-gradient(135deg, #111827, #2563eb);
    color: white;
    padding: 25px;
}

header h1 {
    margin: 0;
    font-size: 28px;
}

header p {
    margin: 6px 0 0;
    color: #dbeafe;
}

.container {
    padding: 25px;
}

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 25px;
}

.card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.card small {
    color: #6b7280;
    font-size: 13px;
}

.card h2 {
    margin: 10px 0 0;
    font-size: 28px;
}

.card.blue {
    border-left: 5px solid #2563eb;
}

.card.green {
    border-left: 5px solid #16a34a;
}

.card.orange {
    border-left: 5px solid #f97316;
}

.card.purple {
    border-left: 5px solid #7c3aed;
}

.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    margin-bottom: 25px;
}

.box {
    background: white;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.box h3 {
    margin-top: 0;
    margin-bottom: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #111827;
    color: white;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #e5e7eb;
    font-size: 14px;
    text-align: left;
}

tbody tr:hover {
    background: #f9fafb;
}

.status {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 20px;
    background: #dcfce7;
    color: #166534;
    font-size: 12px;
    font-weight: bold;
}

.footer-info {
    margin-top: 12px;
    font-size: 13px;
    color: #6b7280;
}

@media(max-width: 900px) {
    .cards, .grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>

<header>
    <h1>Dashboard Rastreador</h1>
    <p>Monitoramento de localização em tempo real</p>
</header>

<div class="container">

    <div class="cards">
        <div class="card blue">
            <small>Total de registros</small>
            <h2 id="total">0</h2>
        </div>

        <div class="card green">
            <small>Última latitude</small>
            <h2 id="ultima_lat">-</h2>
        </div>

        <div class="card orange">
            <small>Última longitude</small>
            <h2 id="ultima_lng">-</h2>
        </div>

        <div class="card purple">
            <small>Velocidade atual</small>
            <h2 id="velocidade">0 km/h</h2>
        </div>
    </div>

    <div class="grid">
        <div class="box">
            <h3>Registros por hora - últimas 24h</h3>
            <canvas id="graficoHora"></canvas>
        </div>

        <div class="box">
            <h3>Registros por minuto - últimos 60 min</h3>
            <canvas id="graficoMinuto"></canvas>
        </div>
    </div>

    <div class="box">
        <h3>Últimos 10 registros</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Velocidade</th>
                    <th>Data/Hora</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tabelaRegistros">
                <tr>
                    <td colspan="6">Carregando...</td>
                </tr>
            </tbody>
        </table>

        <div class="footer-info">
            Última atualização: <span id="atualizado">-</span>
        </div>
    </div>

</div>

<script>
let chartHora = null;
let chartMinuto = null;

function criarGrafico(idCanvas, labels, valores, label, cor) {
    const ctx = document.getElementById(idCanvas);

    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: valores,
                borderColor: cor,
                backgroundColor: cor + '33',
                borderWidth: 3,
                tension: 0.35,
                fill: true,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
}

function atualizarDashboard() {
    $.getJSON('dashboard.php?ajax=1', function(dados) {

        $('#total').text(dados.total);

        if (dados.ultimo) {
            $('#ultima_lat').text(dados.ultimo.latitude);
            $('#ultima_lng').text(dados.ultimo.longitude);
            $('#velocidade').text(dados.ultimo.velocidade + ' km/h');
        }

        $('#atualizado').text(dados.atualizado);

        let labelsHora = dados.porHora.map(item => item.hora);
        let valoresHora = dados.porHora.map(item => item.total);

        let labelsMinuto = dados.porMinuto.map(item => item.minuto);
        let valoresMinuto = dados.porMinuto.map(item => item.total);

        if (chartHora) chartHora.destroy();
        if (chartMinuto) chartMinuto.destroy();

        chartHora = criarGrafico(
            'graficoHora',
            labelsHora,
            valoresHora,
            'Registros por hora',
            '#2563eb'
        );

        chartMinuto = criarGrafico(
            'graficoMinuto',
            labelsMinuto,
            valoresMinuto,
            'Registros por minuto',
            '#16a34a'
        );

        let html = '';

        if (dados.ultimos.length === 0) {
            html = '<tr><td colspan="6">Nenhum registro encontrado.</td></tr>';
        } else {
            dados.ultimos.forEach(function(item) {
                html += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.latitude}</td>
                        <td>${item.longitude}</td>
                        <td>${item.velocidade} km/h</td>
                        <td>${item.datahora}</td>
                        <td><span class="status">Recebido</span></td>
                    </tr>
                `;
            });
        }

        $('#tabelaRegistros').html(html);
    });
}

atualizarDashboard();

setInterval(atualizarDashboard, 300000);
</script>

</body>
</html>