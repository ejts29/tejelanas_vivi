<?php
// Eliminar FAQ por ID
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID requerido para eliminar."]);
    exit;
}

$id = intval($input['id']);
$sql = "DELETE FROM FAQ WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Pregunta eliminada correctamente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al eliminar: " . mysqli_error($conn)]);
}
?>
