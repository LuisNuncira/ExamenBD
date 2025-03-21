<?php
require 'incluides/db.php';

$query = $conexion->query("SELECT * FROM personas");
$personas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Personas</h1>
        <a href="crear.php" class="btn-add">Agregar Persona</a>
        <table class="personas-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Mayor de Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona): ?>
                <tr>
                    <td><?= htmlspecialchars($persona['id']) ?></td>
                    <td><?= htmlspecialchars($persona['nombre']) ?></td>
                    <td><?= htmlspecialchars($persona['email']) ?></td>
                    <td><?= htmlspecialchars($persona['edad']) ?></td>
                    <td><?= $persona['edad'] >= 18 ? 'Sí' : 'No' ?></td>
                    <td class="actions">
                        <a href="editar.php?id=<?= $persona['id'] ?>" class="btn-edit">Editar</a>
                        <a href="eliminar.php?id=<?= $persona['id'] ?>" class="btn-delete">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>