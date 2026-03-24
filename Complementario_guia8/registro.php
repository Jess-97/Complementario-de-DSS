<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
 
<body>

    <h2>Registro de Usuario</h2>

    <form action="guardar_usuario.php" method="POST">

        <input type="text" name="usuario" placeholder="Usuario" required><br><br>

        <input type="text" name="nombre" placeholder="Nombre" required><br><br>

        <input type="text" name="apellido" placeholder="Apellido" required><br><br>

        <input type="password" name="contrasena" placeholder="Contraseña" required><br><br>

        <input type="submit" value="Registrar">

    </form>

    <a href="login.php">Volver</a>

</body>

</html>