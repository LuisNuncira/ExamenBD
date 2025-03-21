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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Agregar Nueva Persona</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php"><button>Cancelar</button></a>
</body>
</html>