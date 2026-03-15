<?php

require 'connection.php';

$id = 0;

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
}

$pdo = Database::connect();

$sql = "DELETE FROM usuario WHERE idusuario = ?";

$q = $pdo->prepare($sql);
$q->execute(array($id));

Database::disconnect();

header("Location: index.php");
