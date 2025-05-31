<?php
// PATCH - Actualización parcial de un producto (por ejemplo, solo nombre o imagen)
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
$updates = [];

// Verificar y preparar los campos que se actualizarán
if (isset($input['nombre'])) {
    $nombre = mysqli_real_escape_string($conn, $input['nombre']);
    $updates[] = "nombre = '$nombre'";
}
if (isset($input['descripcion'])) {
    $descripcion = mysqli_real_escape_string($conn, $input['descripcion']);
    $updates[] = "descripcion = '$descripcion'";
}
if (isset($input['precio'])) {
    $precio = floatval($input['precio']);
    $updates[] = "precio = $precio";
}
if (isset($input['imagenUrl'])) {
    $imagenUrl = mysqli_real_escape_string($conn, $input['imagenUrl']);
    $updates[] = "imagenUrl = '$imagenUrl'";
}

if (empty($updates)) {
    http_response_code(400);
    echo json_encode(["error" => "No se proporcionaron campos para actualizar."]);
    exit;
}

// Generar y ejecutar consulta
$sql = "UPDATE productos SET " . implode(", ", $updates) . " WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(["message" => "Producto actualizado correctamente."]);
    } else {
        echo json_encode(["message" => "No se encontró el producto o no hubo cambios."]);
    }
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al actualizar: " . mysqli_error($conn)]);
}
?>
