<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>QRASIST</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <div class="card">
    <h2>Registrar Estudiante</h2>
    <form action="insertar_estudiante.php" method="POST">
        <input type="text" name="id_estudiante" placeholder="ID del Estudiante">
        <input type="text" name="nombre" placeholder="Nombre Completo">
        <button type="submit">Registrar</button>
    </form>


  </div>

  <div class="card">
    <h2>Confirmar Asistencia</h2>
    <form action="confirmar_asistencia.php" method="POST">
     <input type="text" name="id_estudiante" placeholder="ID del Estudiante">
     <button type="submit">Confirmar Asistencia</button>
    </form>


  </div>
</div>
</body>
</html>

