<?php

$apiKey = "337e58f007064ddab3461394b4cbd903";

$distancia = "";
$tempo = "";
$valorEntrega = "";
$erro = "";

function geocodificar($endereco, $apiKey)
{
    $url = "https://api.geoapify.com/v1/geocode/search?text=" .
        urlencode($endereco) .
        "&apiKey=" . $apiKey;

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 20
    ]);

    $resposta = curl_exec($ch);
    curl_close($ch);

    $dados = json_decode($resposta, true);

    if (
        isset($dados['features'][0]['properties']['lat']) &&
        isset($dados['features'][0]['properties']['lon'])
    ) {
        return [
            'lat' => $dados['features'][0]['properties']['lat'],
            'lon' => $dados['features'][0]['properties']['lon']
        ];
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $origem = trim($_POST['origem']);
    $destino = trim($_POST['destino']);

    if (empty($origem) || empty($destino)) {
        $erro = "Informe origem e destino.";
    } else {

        $coordOrigem = geocodificar($origem, $apiKey);
        $coordDestino = geocodificar($destino, $apiKey);

        if ($coordOrigem && $coordDestino) {

            $url = "https://api.geoapify.com/v1/routing?" .
                "waypoints=" .
                $coordOrigem['lat'] . "," . $coordOrigem['lon'] .
                "|" .
                $coordDestino['lat'] . "," . $coordDestino['lon'] .
                "&mode=drive" .
                "&apiKey=" . $apiKey;

            $ch = curl_init($url);

            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_TIMEOUT => 20
            ]);

            $resposta = curl_exec($ch);
            curl_close($ch);

            $dados = json_decode($resposta, true);

            if (isset($dados['features'][0]['properties'])) {

                $rota = $dados['features'][0]['properties'];

                $metros = $rota['distance'];
                $segundos = $rota['time'];

                $km = round($metros / 1000, 2);

                $horas = floor($segundos / 3600);
                $minutos = floor(($segundos % 3600) / 60);

                $distancia = $km . " KM";

                if ($horas > 0) {
                    $tempo = $horas . "h " . $minutos . "min";
                } else {
                    $tempo = $minutos . " min";
                }

                // Exemplo de cálculo de entrega
                $valorPorKm = 2.50;
                $valorEntrega = $km * $valorPorKm;

            } else {
                $erro = "Não foi possível calcular a rota.";
            }

        } else {
            $erro = "Não foi possível localizar um dos endereços.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Calculadora de Distância</title>

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    max-width:800px;
    margin:40px auto;
    padding:20px;
}

h2{
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:4px;
    box-sizing:border-box;
}

button{
    background:#28a745;
    color:#fff;
    border:none;
    padding:12px 25px;
    cursor:pointer;
    border-radius:4px;
}

button:hover{
    opacity:.9;
}

.resultado{
    margin-top:20px;
    background:#e9ffe9;
    padding:20px;
    border-radius:5px;
}

.erro{
    margin-top:20px;
    background:#ffe5e5;
    padding:20px;
    border-radius:5px;
    color:#c00;
}

.info{
    margin-bottom:10px;
    font-size:18px;
}

</style>

</head>
<body>

<h2>Calcular Distância e Tempo</h2>

<form method="POST">

    <input
        type="text"
        name="origem"
        placeholder="Digite o endereço de origem"
        required
        value="<?= isset($_POST['origem']) ? htmlspecialchars($_POST['origem']) : '' ?>"
    >

    <input
        type="text"
        name="destino"
        placeholder="Digite o endereço de destino"
        required
        value="<?= isset($_POST['destino']) ? htmlspecialchars($_POST['destino']) : '' ?>"
    >

    <button type="submit">
        Calcular
    </button>

</form>

<?php if($distancia): ?>

<div class="resultado">

    <div class="info">
        📍 Distância: <strong><?= $distancia ?></strong>
    </div>

    <div class="info">
        ⏱ Tempo estimado: <strong><?= $tempo ?></strong>
    </div>

    <div class="info">
        💰 Valor estimado: <strong>
            R$ <?= number_format($valorEntrega, 2, ',', '.') ?>
        </strong>
    </div>

</div>

<?php endif; ?>

<?php if($erro): ?>

<div class="erro">
    <?= $erro ?>
</div>

<?php endif; ?>

</body>
</html>