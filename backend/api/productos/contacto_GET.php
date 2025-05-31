<?php
// Obtener todos los contactos (solo para administración)
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include_once '../../config/db.php';

$sql = "SELECT * FROM contactos ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$datos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row;
}

echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
