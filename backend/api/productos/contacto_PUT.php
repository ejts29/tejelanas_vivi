<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID requerido"]);
    exit;
}

$id = intval($input['id']);

$campos = [
    'nombre', 'email', 'telefono', 'asunto',
    'categoria', 'mensaje', 'metodoEnvio', 'metodoPago'
];

$actualizaciones = [];

foreach ($campos as $campo) {
    if (!isset($input[$campo])) {
        http_response_code(400);
        echo json_encode(["error" => "Campo $campo requerido para PUT"]);
        exit;
    }
    $valor = mysqli_real_escape_string($conn, $input[$campo]);
    $actualizaciones[] = "$campo = '$valor'";
}

$sql = "UPDATE contactos SET " . implode(', ', $actualizaciones) . " WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Contacto actualizado correctamente"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al actualizar: " . mysqli_error($conn)]);
}
?>
