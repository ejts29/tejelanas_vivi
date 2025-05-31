<?php
// Agregar una nueva pregunta frecuente
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['question'], $input['answer'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos obligatorios."]);
    exit;
}

$question = mysqli_real_escape_string($conn, $input['question']);
$answer   = mysqli_real_escape_string($conn, $input['answer']);

$sql = "INSERT INTO FAQ (question, answer) VALUES ('$question', '$answer')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Pregunta añadida correctamente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al insertar pregunta: " . mysqli_error($conn)]);
}
?>
