<?php
$conexion = new mysqli("localhost", "root", "", "asistencia");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_estudiante"])) {
        $id_estudiante = $_POST["id_estudiante"];
        $fecha = date("Y-m-d H:i:s");

        // ✅ Corregido el nombre de la columna aquí
        $verificar = $conexion->query("SELECT * FROM estudiantes WHERE id_estudiante = '$id_estudiante'");
        if ($verificar->num_rows > 0) {
            $sql = "INSERT INTO asistencia (id_estudiante, fecha) VALUES ('$id_estudiante', '$fecha')";

            if ($conexion->query($sql) === TRUE) {
                echo "✅ Asistencia registrada correctamente.";
            } else {
                echo "❌ Error al registrar asistencia: " . $conexion->error;
            }
        } else {
            echo "⚠️ ID de estudiante no válido.";
        }
    } else {
        echo "⚠️ No se recibió el ID del estudiante.";
    }
}

$conexion->close();
?>


