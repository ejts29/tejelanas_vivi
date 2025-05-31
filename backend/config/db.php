<?php
//tejelanas_vivi\backend\config\db.php
// Configuración de conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tejelanas";

// Crear conexión con MySQL
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar si hubo error al conectar
if (!$conn) {
    http_response_code(500); // Error interno del servidor
    echo json_encode(["error" => "Conexión fallida: " . mysqli_connect_error()]);
    exit;
}

// Establecer conjunto de caracteres a UTF-8
mysqli_set_charset($conn, "utf8");
?>

