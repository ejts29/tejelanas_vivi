<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID requerido para actualizar."]);
    exit;
}

$id = intval($input['id']);
$actualizaciones = [];

foreach ($input as $key => $value) {
    if ($key !== 'id') {
        $valorEscapado = mysqli_real_escape_string($conn, $value);
        $actualizaciones[] = "$key = '$valorEscapado'";
    }
}

if (empty($actualizaciones)) {
    http_response_code(400);
    echo json_encode(["error" => "Ningún campo a actualizar."]);
    exit;
}

$sql = "UPDATE contactos SET " . implode(', ', $actualizaciones) . " WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Contacto actualizado parcialmente"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al hacer PATCH: " . mysqli_error($conn)]);
}
?>
