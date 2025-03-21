<?php
require 'incluides/db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conexion->prepare("SELECT * FROM personas WHERE id = ?");
$stmt->execute([$id]);
$persona = $stmt->fetch();

if (!$persona) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];

    $stmt = $conexion->prepare("UPDATE personas SET nombre = ?, email = ?, edad = ? WHERE id = ?");
    $stmt->execute([$nombre, $correo, $edad, $id]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Editar Persona</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($persona['nombre']) ?>" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($persona['email']) ?>" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?= htmlspecialchars($persona['edad']) ?>" required>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="index.php"><button>Cancelar</button></a>
</body>
</html>