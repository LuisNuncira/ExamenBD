<?php
require 'incluides/db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conexion->prepare("DELETE FROM personas WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
?>