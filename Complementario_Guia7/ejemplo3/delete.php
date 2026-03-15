<?php

require 'connection.php';

$id = null;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM usuario WHERE idusuario = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);

Database::disconnect();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-offset-2 col-md-8">

                <h3>Confirmar eliminación</h3>

                <div class="alert alert-warning">

                    <p><b>Nombre:</b> <?php echo $data['nombre']; ?></p>
                    <p><b>Apellido:</b> <?php echo $data['apellido']; ?></p>

                </div>

                <form method="post" action="delete2.php">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <button type="submit" class="btn btn-danger">Eliminar</button>

                    <a href="index.php" class="btn btn-default">Cancelar</a>

                </form>

            </div>
        </div>

    </div>

</body>

</html>