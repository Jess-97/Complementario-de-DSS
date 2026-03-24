<?php
require 'conexion.php';

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contrasena = $_POST['contrasena'];

$hash = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (usuario, contrasena, nombre, apellido)
        VALUES (:usuario, :contrasena, :nombre, :apellido)";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':contrasena', $hash);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellido', $apellido);

$stmt->execute();

echo "Usuario registrado correctamente<br>";
echo "<a href='login.php'>Ir al login</a>";
?>