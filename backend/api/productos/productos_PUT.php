<?php
// PUT - Actualizar completamente un producto
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

// Leer datos JSON
$input = json_decode(file_get_contents("php://input"), true);

// Verificar ID
if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID del producto es obligatorio."]);
    exit;
}

// Validar campos necesarios
if (!isset($input['nombre'], $input['descripcion'], $input['precio'], $input['imagenUrl'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos obligatorios."]);
    exit;
}

// Sanitizar
$id          = intval($input['id']);
$nombre      = mysqli_real_escape_string($conn, $input['nombre']);
$descripcion = mysqli_real_escape_string($conn, $input['descripcion']);
$precio      = floatval($input['precio']);
$imagenUrl   = mysqli_real_escape_string($conn, $input['imagenUrl']);

// Actualizar producto
$sql = "UPDATE productos 
        SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, imagenUrl = '$imagenUrl' 
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(["message" => "Producto actualizado correctamente."]);
    } else {
        echo json_encode(["message" => "No se encontró el producto o no hubo cambios."]);
    }
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al actualizar producto: " . mysqli_error($conn)]);
}
?>
