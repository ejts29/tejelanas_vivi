<?php
// Actualización parcial de QuienesSomos
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID obligatorio para actualizar."]);
    exit;
}

$id = intval($input['id']);
$campos = [];

foreach (['titulo', 'descripcion', 'mision', 'vision', 'imagenUrl'] as $campo) {
    if (isset($input[$campo])) {
        $valor = mysqli_real_escape_string($conn, $input[$campo]);
        $campos[] = "$campo = '$valor'";
    }
}

if (empty($campos)) {
    http_response_code(400);
    echo json_encode(["error" => "No se proporcionaron campos para actualizar."]);
    exit;
}

$sql = "UPDATE QuienesSomos SET " . implode(', ', $campos) . " WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Información actualizada parcialmente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al actualizar: " . mysqli_error($conn)]);
}
?>
