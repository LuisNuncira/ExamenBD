<?php
require 'incluides/db.php';

$query = $conexion->query("SELECT * FROM personas");
$personas = $query->fetchAll(PDO::FETCH_ASSOC);


$total_personas = count($personas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Personas</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Tu archivo CSS personalizado -->
</head>
<body>
    <div class="container">
     
        <header class="header">
            <h1>Lista de Personas</h1>
            <a href="crear.php" class="btn-add">Agregar Persona</a>
        </header>

      
        <div class="summary">
            <p>Total de personas registradas: <strong><?= $total_personas ?></strong></p>
        </div>

     
        <table class="personas-table">
            <thead>
                <tr>
                    <th>Nombre</th> 
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Mayor de Edad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona): ?>
                <tr>
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