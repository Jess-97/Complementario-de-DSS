<?php
include_once("db-mysqli.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Eliminar libro</title>

    <link rel="stylesheet" href="css/links.css">

</head>

<body>

    <?php

    /* PRIMERA VEZ: mostrar formulario */

    if (!isset($_POST['confirmar'])) {

        $isbn = $_GET['id'];

        $sql = "SELECT * FROM libros WHERE isbn='$isbn'";
        $resultado = $db->query($sql);
        $fila = $resultado->fetch_assoc();

    ?>

        <div class="confirmacion">

            <h2>Confirmar eliminación</h2>

            <form method="POST" action="eliminar.php">

                <input type="hidden" name="isbn" value="<?php echo $fila['isbn']; ?>">

                <label>ISBN</label><br>
                <input type="text" value="<?php echo $fila['isbn']; ?>" disabled><br>

                <label>Autor</label><br>
                <input type="text" value="<?php echo $fila['autor']; ?>" disabled><br>

                <label>Titulo</label><br>
                <input type="text" value="<?php echo $fila['titulo']; ?>" disabled><br>

                <label>Precio</label><br>
                <input type="text" value="<?php echo $fila['precio']; ?>" disabled><br><br>

                <input class="btn-eliminar" type="submit" name="confirmar" value="Eliminar">

                <a href="mostrarlibros.php?opc=eliminar">
                    <input class="btn-cancelar" type="button" value="Cancelar">
                </a>

            </form>

        </div>

    <?php
    }

    /* SEGUNDA VEZ: eliminar registro */ else {

        $isbn = $_POST['isbn'];

        $sql = "DELETE FROM libros WHERE isbn='$isbn'";
        $db->query($sql);

        echo "<div class='confirmacion'>";
        echo "<h2>Libro eliminado correctamente</h2>";
        echo "<br>";
        echo "<a href='mostrarlibros.php?opc=eliminar'>Volver</a>";
        echo "</div>";
    }

    $db->close();
    ?>

</body>

</html>