<?php
// Obtener todas las preguntas frecuentes
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$preguntas = [
    [
        "question" => "¿Qué materiales se incluyen en los talleres?",
        "answer" => "En todos nuestros talleres incluimos los materiales básicos necesarios para completar el proyecto: lanas, agujas y accesorios..."
    ],
    [
        "question" => "¿Cuál es la política de cancelación de talleres?",
        "answer" => "Puedes cancelar tu inscripción hasta 72 horas antes del inicio..."
    ],
    // ...otras preguntas
];

echo json_encode($preguntas, JSON_UNESCAPED_UNICODE);
?>
