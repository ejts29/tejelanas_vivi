<?php
// Eliminar información de QuienesSomos
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "El campo 'id' es obligatorio."]);
    exit;
}

$id = intval($input['id']);
$sql = "DELETE FROM QuienesSomos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(["message" => "Registro eliminado correctamente."]);
    } else {
        echo json_encode(["message" => "No se encontró registro con ese ID."]);
    }
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al eliminar: " . mysqli_error($conn)]);
}
?>
