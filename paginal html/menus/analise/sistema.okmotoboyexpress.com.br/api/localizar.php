<?php

header('Content-Type: application/json');

$con = new mysqli("localhost","root","","rastreador");

$sql = $con->query("
SELECT *
FROM localizacao
ORDER BY id DESC
LIMIT 1
");

echo json_encode($sql->fetch_assoc());