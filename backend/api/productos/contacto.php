<?php
// tejelanas_vivi/backend/api/contacto.php (o productos/contacto.php, según tu estructura final)

// --- CABECERAS CORS ---
// Permite solicitudes desde cualquier origen (*) para desarrollo.
// ¡ADVERTENCIA!: Para producción, cambia '*' a la URL específica de tu frontend (ej: 'https://tu-dominio.com').
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS"); // Métodos permitidos para esta API
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeceras permitidas
header("Content-Type: application/json"); // Indica que la respuesta será JSON

// Manejo de la solicitud "preflight" OPTIONS
// Los navegadores envían una solicitud OPTIONS antes de la solicitud POST real para verificar los permisos CORS.
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200); // Responder con éxito a la preflight
    exit(); // Terminar la ejecución, no procesar más PHP para OPTIONS
}

// --- PROCESAMIENTO DE LA SOLICITUD POST ---

// Decodificar el cuerpo de la solicitud JSON
$input = json_decode(file_get_contents("php://input"), true);

// --- Validación del token reCAPTCHA ---
if (!isset($input['captchaToken'])) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Token reCAPTCHA no proporcionado."]);
    exit;
}

$captchaToken = $input['captchaToken'];
// ¡IMPORTANTE!: Usa tu SECRET KEY de reCAPTCHA aquí.
// Esta es la clave secreta que Google te proporciona para el backend.
$secretKey = "6LdDZk8rAAAAACbvn0E9-9z1Y-om0yxTi45aPMan"; 

// Validar el token con el servicio de Google reCAPTCHA
$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captchaToken");
$responseData = json_decode($verifyResponse);

// Verificar si la validación de reCAPTCHA fue exitosa
if (!$responseData->success) {
    http_response_code(403); // Forbidden
    // Opcional: puedes loggear $responseData->{'error-codes'} para depuración
    echo json_encode(["error" => "Fallo en la verificación de reCAPTCHA.", "code" => $responseData->{'error-codes'} ?? 'unknown_error']);
    exit;
}

// --- Conexión a la base de datos ---
// Asegúrate de que la ruta a tu archivo db.php sea correcta.
// Si este archivo está en 'tejelanas_vivi/backend/api/', y db.php está en 'tejelanas_vivi/backend/config/',
// entonces '../../config/db.php' es la ruta correcta.
include_once '../../config/db.php'; 

// --- Sanitización de los datos de entrada ---
// Esto es crucial para prevenir inyecciones SQL.
// Asegúrate de que $conn esté disponible globalmente o se pase a esta función desde db.php
$nombre        = mysqli_real_escape_string($conn, $input['nombre'] ?? '');
$email         = mysqli_real_escape_string($conn, $input['email'] ?? '');
$telefono      = mysqli_real_escape_string($conn, $input['telefono'] ?? '');
$asunto        = mysqli_real_escape_string($conn, $input['asunto'] ?? '');
$categoria     = mysqli_real_escape_string($conn, $input['categoria'] ?? '');
$mensaje       = mysqli_real_escape_string($conn, $input['mensaje'] ?? '');
$metodoEnvio   = mysqli_real_escape_string($conn, $input['metodoEnvio'] ?? '');
$metodoPago    = mysqli_real_escape_string($conn, $input['metodoPago'] ?? '');

// --- Inserción de datos en la base de datos ---
$sql = "INSERT INTO contacto (nombre, email, telefono, asunto, categoria, mensaje, metodo_envio, metodo_pago, fecha)
        VALUES ('$nombre', '$email', '$telefono', '$asunto', '$categoria', '$mensaje', '$metodoEnvio', '$metodoPago', NOW())";

if (mysqli_query($conn, $sql)) {
    http_response_code(200); // OK
    echo json_encode(["message" => "Mensaje guardado con éxito."]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Error al guardar en la base de datos: " . mysqli_error($conn)]);
}

// Cerrar la conexión a la base de datos si es necesario (mysqli_close($conn);)
// Esto dependerá de cómo gestiones las conexiones en tu db.php.
// Si db.php ya cierra la conexión automáticamente al final del script, no es necesario aquí.
?>