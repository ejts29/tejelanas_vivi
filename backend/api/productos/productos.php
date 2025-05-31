<?php
// tejelanas_vivi\backend\api\productos\productos.php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

// Incluir archivo de conexión
include_once '../../config/db.php';

// Consultar productos
$sql = "SELECT * FROM productos";
$result = mysqli_query($conn, $sql);

// Convertir a JSON
$datos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row;
}

echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
