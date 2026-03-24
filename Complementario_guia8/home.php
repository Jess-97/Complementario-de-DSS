<?php
require_once('seguridad.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Inicio</title>

    <!-- CSS -->
   <link rel="stylesheet" href="css/home.css">
</head>

<body>

<!-- TITULO -->
<h1>Bienvenido <?php echo $_SESSION['nombreusr']; ?> 👋</h1>

<!-- MENU -->
<ul id="mainmenu">
    <li><a href="home.php">Inicio</a></li>
    <li><a href="menu.php">Menú</a></li>
    <li><a href="costos.php">Costos</a></li>
    <li><a href="salir.php">Cerrar sesión</a></li>
</ul>

<!-- CONTENIDO -->
<div class="container">

    <div class="card">
        <h2>Inicio del sistema</h2>
        <p>
            Has iniciado sesión correctamente en el sistema.
            Desde aquí puedes navegar por las diferentes opciones
            disponibles en el menú.
        </p>
    </div>

    <div class="card">
        <h2>Información</h2>
        <p>
            Este sistema permite gestionar usuarios, visualizar costos
            y acceder a diferentes módulos protegidos mediante autenticación.
        </p>
    </div>

</div>

<!-- FOOTER -->
<div id="footer">
    <p>© Sistema Web - Todos los derechos reservados</p>
</div>

</body>
</html>