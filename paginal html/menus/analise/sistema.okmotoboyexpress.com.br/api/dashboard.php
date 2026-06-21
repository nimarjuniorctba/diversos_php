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

	$caminhoCompleto = [];
	$res = $con->query("
		SELECT id, latitude, longitude, velocidade, datahora
		FROM localizacao
		ORDER BY id ASC
	");

	while ($row = $res->fetch_assoc()) {
		$caminhoCompleto[] = $row;
	}

    echo json_encode([
        "total" => $total,
        "ultimo" => $ultimo,
        "porHora" => $porHora,
        "porMinuto" => $porMinuto,
        "ultimos" => $ultimos,
        "caminhoCompleto" => $caminhoCompleto,
        "atualizado" => date("d/m/Y H:i:s"),
        "ultima_atualizacao_banco" => $ultimo
            ? date("d/m/Y H:i:s", strtotime($ultimo["datahora"]))
            : "-"
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

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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
    grid-template-columns: repeat(5, 1fr);
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

.card.blue { border-left: 5px solid #2563eb; }
.card.green { border-left: 5px solid #16a34a; }
.card.orange { border-left: 5px solid #f97316; }
.card.purple { border-left: 5px solid #7c3aed; }
.card.red { border-left: 5px solid #dc2626; }

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
    margin-bottom: 25px;
}

.box h3 {
    margin-top: 0;
    margin-bottom: 15px;
}

#mapaCaminho {
    width: 100%;
    height: 430px;
    border-radius: 16px;
    overflow: hidden;
}

.info-mapa {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 12px;
    font-size: 13px;
    color: #6b7280;
}

.info-mapa span {
    background: #f3f4f6;
    padding: 8px 12px;
    border-radius: 12px;
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

@media(max-width: 1100px) {
    .cards {
        grid-template-columns: repeat(2, 1fr);
    }

    .grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 600px) {
    .cards {
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

        <div class="card red">
            <small>Último GPS recebido</small>
            <h2 id="ultima_atualizacao_banco" style="font-size:20px;">-</h2>
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
        <h3>Caminho percorrido desde o início dos registros</h3>

        <div id="mapaCaminho"></div>

        <div class="info-mapa">
            <span>Pontos no mapa: <strong id="total_pontos_mapa">0</strong></span>
            <span>Início: <strong id="inicio_caminho">-</strong></span>
            <span>Fim: <strong id="fim_caminho">-</strong></span>
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
            Última atualização da página:
            <strong><span id="atualizado">-</span></strong>
            <br>
            Último GPS recebido:
            <strong><span id="rodape_ultima_atualizacao_banco">-</span></strong>
        </div>
    </div>

</div>

<script>
let chartHora = null;
let chartMinuto = null;

let mapa = L.map('mapaCaminho').setView([-25.4284, -49.2733], 13);
let linhaCaminho = null;
let marcadorInicio = null;
let marcadorFim = null;
let marcadoresPontos = [];

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
}).addTo(mapa);

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
                legend: { display: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });
}

function limparMapa() {
    if (linhaCaminho) mapa.removeLayer(linhaCaminho);
    if (marcadorInicio) mapa.removeLayer(marcadorInicio);
    if (marcadorFim) mapa.removeLayer(marcadorFim);

    marcadoresPontos.forEach(function(marker) {
        mapa.removeLayer(marker);
    });

    marcadoresPontos = [];
    linhaCaminho = null;
    marcadorInicio = null;
    marcadorFim = null;
}

function atualizarMapa(caminho) {
    limparMapa();

    let pontos = [];

    if (caminho && caminho.length > 0) {
        caminho.forEach(function(item) {
            let lat = parseFloat(item.latitude);
            let lng = parseFloat(item.longitude);

            if (!isNaN(lat) && !isNaN(lng)) {
                pontos.push([lat, lng]);
            }
        });
    }

    $('#total_pontos_mapa').text(pontos.length);

    if (pontos.length === 0) {
        $('#inicio_caminho').text('-');
        $('#fim_caminho').text('-');
        return;
    }

    $('#inicio_caminho').text(caminho[0].datahora);
    $('#fim_caminho').text(caminho[caminho.length - 1].datahora);

    if (pontos.length === 1) {
        marcadorFim = L.marker(pontos[0]).addTo(mapa)
            .bindPopup('Última posição nos últimos 10 minutos');

        mapa.setView(pontos[0], 16);
        return;
    }

    linhaCaminho = L.polyline(pontos, {
        color: '#2563eb',
        weight: 5,
        opacity: 0.9
    }).addTo(mapa);

    marcadorInicio = L.marker(pontos[0]).addTo(mapa)
        .bindPopup('Início do caminho');

    marcadorFim = L.marker(pontos[pontos.length - 1]).addTo(mapa)
        .bindPopup('Última posição');

    pontos.forEach(function(ponto, index) {
        let marker = L.circleMarker(ponto, {
            radius: 4,
            color: '#111827',
            fillColor: '#2563eb',
            fillOpacity: 0.8,
            weight: 1
        }).addTo(mapa);

        marcadoresPontos.push(marker);
    });

    mapa.fitBounds(linhaCaminho.getBounds(), {
        padding: [30, 30]
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
        $('#ultima_atualizacao_banco').text(dados.ultima_atualizacao_banco);
        $('#rodape_ultima_atualizacao_banco').text(dados.ultima_atualizacao_banco);

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

        atualizarMapa(dados.caminhoCompleto);

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

        setTimeout(function() {
            mapa.invalidateSize();
        }, 300);

    }).fail(function() {
        $('#atualizado').text('Erro ao atualizar');
    });
}

atualizarDashboard();

// Atualiza a cada 5 minutos
setInterval(atualizarDashboard, 300000);
</script>

</body>
</html>