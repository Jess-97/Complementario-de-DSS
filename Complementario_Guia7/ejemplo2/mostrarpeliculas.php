<?php
spl_autoload_register(function ($classname) {
    require_once("udb_" . $classname . ".class.php");
});

// valor por defecto
$limite = isset($_GET['limite']) ? $_GET['limite'] : 5;

$paginacion = new paginacion();

//Obteniendo el número de página
$npage = isset($_GET['npag']) ? $_GET['npag'] : 1;
$npage = $paginacion->getnumpages($npage);

$db = DataBase::getInstance();

$sql  = "SELECT SQL_CALC_FOUND_ROWS titulopelicula, descripcion, ";
$sql .= "nombre, imgpelicula, generopelicula FROM pelicula ";
$sql .= "JOIN genero ON pelicula.idgenero = genero.idgenero ";
$sql .= "JOIN director ON pelicula.iddirector = director.iddirector ";

if($limite != "todos"){
    $sql .= "LIMIT " . $paginacion->getoffset($limite) . ", " . $limite;
}

$sqlTotal = "SELECT FOUND_ROWS() AS total";

$db->setQuery($sql);
$pelis = $db->loadObjectList();

$regstotal = $db->getNumRows($sqlTotal);
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8"/>
<title>Consultas de varias tablas</title>
<link rel="stylesheet" href="css/tablas.css"/>
</head>

<body>

<section>
<article>

<!-- FORMULARIO SELECT -->
<form method="get" style="margin-bottom:20px;">
Mostrar registros por página:

<select name="limite">

<option value="3" <?php if($limite==3) echo "selected"; ?>>3</option>

<option value="5" <?php if($limite==5) echo "selected"; ?>>5</option>

<option value="10" <?php if($limite==10) echo "selected"; ?>>10</option>

<option value="todos" <?php if($limite=="todos") echo "selected"; ?>>Todos</option>

</select>

<input type="submit" value="Mostrar">

</form>

<?php

$tabla  = "<table class=\"tablaps\">\n";
$tabla .= "<caption>Información de las películas en existencia</caption>\n";

$tabla .= "<thead>\n<tr>\n";
$tabla .= "<th>TÍTULO</th>";
$tabla .= "<th>PORTADA</th>";
$tabla .= "<th>SINOPSIS</th>";
$tabla .= "<th>DIRECTOR</th>";
$tabla .= "<th>GÉNERO</th>";
$tabla .= "</tr>\n</thead>\n<tbody>";

$contador = 1;

foreach ($pelis as $pelicula) {

if ($contador % 2 == 1)
$clase = "impar";
else
$clase = "par";

$tabla .= "<tr class=\"$clase\">";

$tabla .= "<td>".$pelicula['titulopelicula']."</td>";

$tabla .= "<td><img src=\"".$pelicula['imgpelicula']."\" width=\"80\"></td>";

$tabla .= "<td>".$pelicula['descripcion']."</td>";

$tabla .= "<td>".$pelicula['nombre']."</td>";

$tabla .= "<td>".$pelicula['generopelicula']."</td>";

$tabla .= "</tr>";

$contador++;
}

$tabla .= "</tbody>";

if($limite != "todos"){
$tabla .= "<tfoot><tr><th colspan=\"5\">";
$tabla .= $paginacion->showlinkspages($regstotal,$limite);
$tabla .= "</th></tr></tfoot>";
}

$tabla .= "</table>";

echo $tabla;

?>

</article>
</section>

</body>
</html>