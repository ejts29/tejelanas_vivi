<?php
// Obtener todos los productos
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include_once '../../config/db.php';

$sql = "SELECT * FROM productos";
$result = mysqli_query($conn, $sql);

$datos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row;
}

echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
