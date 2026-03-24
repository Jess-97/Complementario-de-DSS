<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Autenticación PHP</title>
    <link rel="stylesheet" href="css/modernform.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/font-league-gothic.css">
    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <header>
        <h1>Formulario de inicio de sesión</h1>
    </header>

    <section>
        <article>

            <?php
            if (isset($_GET["errorusuario"]) && $_GET["errorusuario"] == "si") {
                echo '<span class="error">Datos incorrectos</span>';
            } else {
                echo '<span class="msg">Introduce tu usuario y contraseña</span>';
            }
            ?>

            <div class="container">
                <section class="tabblue">

                    <ul class="tabs blue">

                        <li>
                            <!-- 🔥 CORREGIDO -->
                            <input type="radio" name="tabs" id="tab1" checked>
                            <label for="tab1">Inicio de sesión</label>

                            <!-- 🔥 CORREGIDO -->
                            <div id="tab-content1" class="tab-content">

                                <p>Ingrese sus datos de usuario.</p>

                                <form action="autenticacion.php" method="POST">

                                    <!-- USUARIO -->
                                    <div class="input-group">
                                        <span class="tabaddon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="usuario" placeholder="(Ingresar su usuario)" required class="field" />
                                    </div>

                                    <br>

                                    <!-- CONTRASEÑA -->
                                    <div class="input-group">
                                        <span class="tabaddon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" name="contrasena" placeholder="(Ingresar su contraseña)" required class="field" />
                                    </div>

                                    <br>

                                    <!-- BOTÓN -->
                                    <div class="btn">
                                        <input type="submit" value="Ingresar" />
                                    </div>

                                </form>

                                <br>

                                <p>¿No tienes cuenta? <a href="registro.php">Registrarse</a></p>

                            </div>

                        </li>
                    </ul>

                </section>
            </div>

            <p>
                Debes estar registrado en el sistema para poder ingresar.
                Si no estás registrado consulta al administrador.
            </p>

        </article>
    </section>

</body>

</html>