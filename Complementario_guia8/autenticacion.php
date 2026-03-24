<?php
session_start();
require 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT usuario, contrasena, nombre, apellido FROM usuario WHERE usuario = :usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($contrasena, $user['contrasena'])) {

    $_SESSION["autenticado"] = "si";
    $_SESSION["usuario"] = $user['usuario'];
    $_SESSION["nombreusr"] = $user['nombre'] . " " . $user['apellido'];

    header("Location: home.php");

} else {
    header("Location: login.php?errorusuario=si");
}
?>
