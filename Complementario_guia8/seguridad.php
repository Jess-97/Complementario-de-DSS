<?php
session_start();

if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != "si") {
    header("Location: login.php");
    exit();
}
?>