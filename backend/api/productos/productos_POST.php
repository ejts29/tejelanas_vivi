<?php
// Crear nuevo producto
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

// Leer datos JSON de la solicitud
$input = json_decode(file_get_contents("php://input"), true);

// Validar campos obligatorios
if (!isset($input['nombre'], $input['descripcion'], $input['precio'], $input['imagenUrl'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos obligatorios."]);
    exit;
}

// Sanitizar datos
$nombre      = mysqli_real_escape_string($conn, $input['nombre']);
$descripcion = mysqli_real_escape_string($conn, $input['descripcion']);
$precio      = floatval($input['precio']);
$imagenUrl   = mysqli_real_escape_string($conn, $input['imagenUrl']);

// Insertar en la base de datos
$sql = "INSERT INTO productos (nombre, descripcion, precio, imagenUrl)
        VALUES ('$nombre', '$descripcion', $precio, '$imagenUrl')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Producto creado correctamente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al crear producto: " . mysqli_error($conn)]);
}
?>
