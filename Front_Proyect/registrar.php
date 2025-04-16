<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Verifica el método de la solicitud
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conexión con la base de datos
    $conexion = new mysqli("localhost", "root", "", "colegio", 3305);

    if ($conexion->connect_error) {
        die(json_encode(["mensaje" => "Conexión fallida: " . $conexion->connect_error]));
    }

    $data = json_decode(file_get_contents("php://input"), true);

    $padre = $data["padre"];
    $estudiantes = $data["estudiantes"];

    // Guardar datos del padre
    $nombrePadre = $conexion->real_escape_string($padre["nombre"]);
    $correoPadre = $conexion->real_escape_string($padre["correo"]);
    $contrasenaPadre = $conexion->real_escape_string($padre["contrasena"]);

    $sqlPadre = "INSERT INTO padres (nombre, correo, contrasena) VALUES ('$nombrePadre', '$correoPadre', '$contrasenaPadre')";
    if (!$conexion->query($sqlPadre)) {
        echo json_encode(["mensaje" => "Error al registrar el padre: " . $conexion->error]);
        exit;
    }

    $idPadre = $conexion->insert_id;

    foreach ($estudiantes as $estudiante) {
        $nombreEst = $conexion->real_escape_string($estudiante["nombre"]);
        $correoEst = $conexion->real_escape_string($estudiante["correo"]);

        $sqlEst = "INSERT INTO estudiantes (nombre, correo, id_padre) VALUES ('$nombreEst', '$correoEst', '$idPadre')";
        if (!$conexion->query($sqlEst)) {
            echo json_encode(["mensaje" => "Error al registrar estudiante: " . $conexion->error]);
            exit;
        }
    }

    echo json_encode(["mensaje" => "Padre y estudiantes registrados con éxito."]);
} else {
    http_response_code(405);
    echo json_encode(["mensaje" => "Método no permitido"]);
    exit;
}
?>

