<?php
require 'incluides/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];

    $stmt = $conexion->prepare("INSERT INTO personas (nombre, email, edad) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $correo, $edad]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Persona</title>
    <link rel="stylesheet" href="css/stylec.css"> 
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Agregar Nueva Persona</h1>
            <a href="index.php" class="btn-back">Regresar</a>
        </header>

        <form method="POST" class="form">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-submit">Guardar</button>
                <a href="index.php" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>