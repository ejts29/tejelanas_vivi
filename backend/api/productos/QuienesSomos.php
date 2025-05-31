<?php
//tejelanas_vivi\backend\api\productos\QuienesSomos.php
// GET - Obtener información de QuienesSomos
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include_once '../../config/db.php';

$sql = "SELECT * FROM QuienesSomos LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["error" => "No se encontró información."]);
}
?>
