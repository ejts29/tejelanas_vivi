<?php
// Encabezados para CORS y tipo de contenido
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST, OPTIONS');

// Manejo de preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Obtener y decodificar el cuerpo JSON
$inputRaw = file_get_contents("php://input");
$input = json_decode($inputRaw, true);

// Validación básica de JSON
if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(["error" => "JSON no válido."]);
    exit;
}

// Validar token reCAPTCHA
if (empty($input['captchaToken'])) {
    http_response_code(400);
    echo json_encode(["error" => "Token reCAPTCHA no proporcionado"]);
    exit;
}

$captchaToken = $input['captchaToken'];
$secretKey = "6LdDZk8rAAAAACbvn0E9-9z1Y-om0yxTi45aPMan";

// Validación del token con Google
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captchaToken");
$captchaResponse = json_decode($verify);

if (!$captchaResponse->success) {
    http_response_code(403);
    echo json_encode(["error" => "Fallo en la verificación de reCAPTCHA"]);
    exit;
}

// Conexión a base de datos
include_once '../../config/db.php';

// Campos requeridos
$requiredFields = ['nombre', 'email', 'asunto', 'categoria', 'mensaje', 'metodoEnvio', 'metodoPago'];
foreach ($requiredFields as $field) {
    if (empty($input[$field])) {
        http_response_code(400);
        echo json_encode(["error" => "El campo '$field' es obligatorio."]);
        exit;
    }
}

// Escapar y sanitizar entradas
function limpiar($valor, $conn) {
    return htmlspecialchars(mysqli_real_escape_string($conn, $valor));
}

$nombre      = limpiar($input['nombre'], $conn);
$email       = limpiar($input['email'], $conn);
$telefono    = limpiar($input['telefono'] ?? '', $conn);
$asunto      = limpiar($input['asunto'], $conn);
$categoria   = limpiar($input['categoria'], $conn);
$mensaje     = limpiar($input['mensaje'], $conn);
$metodoEnvio = limpiar($input['metodoEnvio'], $conn);
$metodoPago  = limpiar($input['metodoPago'], $conn);

// Consulta SQL con campo de fecha automático
$sql = "INSERT INTO contacto 
(nombre, email, telefono, asunto, categoria, mensaje, metodo_envio, metodo_pago, fecha)
VALUES 
('$nombre', '$email', '$telefono', '$asunto', '$categoria', '$mensaje', '$metodoEnvio', '$metodoPago', NOW())";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Mensaje guardado con éxito."]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al guardar: " . mysqli_error($conn)]);
}
?>
