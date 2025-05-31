<?php
// Crear información de QuienesSomos
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['titulo'], $input['descripcion'], $input['mision'], $input['vision'], $input['imagenUrl'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos obligatorios."]);
    exit;
}

$titulo      = mysqli_real_escape_string($conn, $input['titulo']);
$descripcion = mysqli_real_escape_string($conn, $input['descripcion']);
$mision      = mysqli_real_escape_string($conn, $input['mision']);
$vision      = mysqli_real_escape_string($conn, $input['vision']);
$imagenUrl   = mysqli_real_escape_string($conn, $input['imagenUrl']);

$sql = "INSERT INTO QuienesSomos (titulo, descripcion, mision, vision, imagenUrl)
        VALUES ('$titulo', '$descripcion', '$mision', '$vision', '$imagenUrl')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Información agregada correctamente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al insertar: " . mysqli_error($conn)]);
}
?>
