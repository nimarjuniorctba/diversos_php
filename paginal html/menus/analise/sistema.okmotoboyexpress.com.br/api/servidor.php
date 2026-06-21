<?php
echo "INI";


// Salva tudo que chegou no POST

file_put_contents(
    'logs_recebe.txt',
    "\n\n[".date('d/m/Y H:i:s')."]\n".
    print_r($_POST, true),
    FILE_APPEND
);

$con = new mysqli("localhost", "root", "", "okmotoboyexpress");

if ($con->connect_error) {
    die("Erro conexão: " . $con->connect_error);
}

$lat 		= $_POST['latitude'] ?? '';
$lng 		= $_POST['longitude'] ?? '';
$vel 		= $_POST['velocidade'] ?? '';
$condutor 	= $_POST['user_id'] ?? '';

$sql = "
INSERT INTO mod_localizacao
(
    loc_latitude,
    loc_longitude,
    loc_velocidade,
    con_id_fk	
)
VALUES
(
    '$lat',
    '$lng',
    '$vel',
	'$condutor'
)
";

$con->query($sql);

// Salva o que foi gravado
file_put_contents(
    'logs_salva.txt',
    "\n\n[".date('d/m/Y H:i:s')."] ".
    "LAT={$lat} LNG={$lng} VEL={$vel}",
    FILE_APPEND
);

echo "OK";

?>