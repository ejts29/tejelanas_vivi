<?php
// Actualización parcial de FAQ: por ejemplo, solo la respuesta
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include_once '../../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID requerido para actualizar."]);
    exit;
}

$id = intval($input['id']);

$campos = [];
if (isset($input['question'])) {
    $question = mysqli_real_escape_string($conn, $input['question']);
    $campos[] = "question = '$question'";
}
if (isset($input['answer'])) {
    $answer = mysqli_real_escape_string($conn, $input['answer']);
    $campos[] = "answer = '$answer'";
}

if (empty($campos)) {
    http_response_code(400);
    echo json_encode(["error" => "Nada para actualizar."]);
    exit;
}

$sql = "UPDATE FAQ SET " . implode(', ', $campos) . " WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "FAQ actualizada parcialmente."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al hacer PATCH: " . mysqli_error($conn)]);
}
?>
