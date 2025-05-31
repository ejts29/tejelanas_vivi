<?php
// DELETE - Eliminar un producto por ID
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

// Leer entrada JSON
$input = json_decode(file_get_contents("php://input"), true);

// Validar ID
if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "El campo 'id' es obligatorio."]);
    exit;
}

$id = intval($input['id']);

// Ejecutar la eliminación
$sql = "DELETE FROM productos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(["message" => "Producto eliminado correctamente."]);
    } else {
        echo json_encode(["message" => "No se encontró ningún producto con ese ID."]);
    }
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al eliminar producto: " . mysqli_error($conn)]);
}
?>
