<?php
// Actualización completa de FAQ por ID
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'], $input['question'], $input['answer'])) {
    http_response_code(400);
    echo json_encode(["error" => "Datos incompletos."]);
    exit;
}

$id       = intval($input['id']);
$question = mysqli_real_escape_string($conn, $input['question']);
$answer   = mysqli_real_escape_string($conn, $input['answer']);

$sql = "UPDATE FAQ SET question='$question', answer='$answer' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "FAQ actualizada correctamente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al actualizar FAQ: " . mysqli_error($conn)]);
}
?>
