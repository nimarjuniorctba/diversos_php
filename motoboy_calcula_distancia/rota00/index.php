<?php

$apiKey = "337e58f007064ddab3461394b4cbd903";

$distancia = "";
$erro = "";

function geocodificar($endereco, $apiKey)
{
    $url = "https://api.geoapify.com/v1/geocode/search?text=" .
        urlencode($endereco) .
        "&apiKey=" . $apiKey;

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $origem = trim($_POST['origem']);
    $destino = trim($_POST['destino']);

    $coordOrigem = geocodificar($origem, $apiKey);
    $coordDestino = geocodificar($destino, $apiKey);

    if ($coordOrigem && $coordDestino) {

        $url = "https://api.geoapify.com/v1/routing?waypoints=" .
            $coordOrigem['lat'] . "," . $coordOrigem['lon'] .
            "|" .
            $coordDestino['lat'] . "," . $coordDestino['lon'] .
            "&mode=drive&apiKey=" . $apiKey;

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $resposta = curl_exec($ch);
        curl_close($ch);

        $dados = json_decode($resposta, true);

        if (isset($dados['features'][0]['properties']['distance'])) {

            $metros = $dados['features'][0]['properties']['distance'];
            $km = round($metros / 1000, 2);

            $distancia = $km . " KM";

        } else {
            $erro = "Não foi possível calcular a distância.";
        }

    } else {
        $erro = "Origem ou destino inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Calcular Distância</title>

<style>
body{
    font-family:Arial;
    max-width:700px;
    margin:50px auto;
}

input{
    width:100%;
    padding:10px;
    margin-bottom:10px;
}

button{
    padding:10px 20px;
}

.resultado{
    margin-top:20px;
    padding:15px;
    background:#e9ffe9;
}

.erro{
    margin-top:20px;
    padding:15px;
    background:#ffe9e9;
}
</style>

</head>
<body>

<h2>Calcular Distância</h2>

<form method="post">

    <input
        type="text"
        name="origem"
        placeholder="Digite a origem"
        required
    >

    <input
        type="text"
        name="destino"
        placeholder="Digite o destino"
        required
    >

    <button type="submit">
        Calcular
    </button>

</form>

<?php if($distancia){ ?>
    <div class="resultado">
        Distância: <strong><?php echo $distancia; ?></strong>
    </div>
<?php } ?>

<?php if($erro){ ?>
    <div class="erro">
        <?php echo $erro; ?>
    </div>
<?php } ?>

</body>
</html>0