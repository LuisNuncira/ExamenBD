<?php
$servidor = '127.0.0.1'; 
$nombreBD = 'examen_tallerbd'; 
$usuarioBD = 'root';
$claveBD = ''; 

try {
   
    $conexion = new PDO("mysql:host=$servidor;dbname=$nombreBD;charset=utf8", $usuarioBD, $claveBD);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Error de conexión: " . $error->getMessage());
}
?>