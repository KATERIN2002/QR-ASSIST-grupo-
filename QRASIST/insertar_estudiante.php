<?php
$conexion = new mysqli("localhost", "root", "", "asistencia");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_estudiante"]) && isset($_POST["nombre"])) {
        $id_estudiante = $_POST["id_estudiante"];
        $nombre = $_POST["nombre"];

        if (!empty($id_estudiante) && !empty($nombre)) {
            $sql = "INSERT INTO estudiantes (id_estudiante, nombre) VALUES ('$id_estudiante', '$nombre')";
            
            if ($conexion->query($sql) === TRUE) {
                echo "✅ Estudiante registrado con éxito.";
            } else {
                echo "❌ Error al registrar: " . $conexion->error;
            }
        } else {
            echo "⚠️ Por favor completa todos los campos.";
        }
    } else {
        echo "⚠️ No se recibieron todos los datos esperados.";
    }
}

$conexion->close();
?>



