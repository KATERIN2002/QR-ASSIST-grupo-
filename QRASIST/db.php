<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "asistencia"; // Asegúrate de usar el nombre correcto

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
