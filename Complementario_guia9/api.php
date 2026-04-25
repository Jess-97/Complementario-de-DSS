<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'db.php';

$opc = $_GET['opc'] ?? '';

switch($opc){

    case 'listarUsuarios':
        echo json_encode(obtenerUsuarios());
    break;

    case 'listarCarreras':
        echo json_encode(obtenerCarreras());
    break;

    case 'obtenerUsuario':
        echo json_encode(obtenerUsuario($_GET['id']));
    break;

    case 'insertarUsuario':
        $data = json_decode(file_get_contents("php://input"), true);

        insertarUsuario(
            $data['username'],
            $data['email'],
            (int)$data['status'],
            $data['carrera']
        );

        echo json_encode(["success"=>true]);
    break;

    case 'editarUsuario':
        $data = json_decode(file_get_contents("php://input"), true);

        // 🔥 DEBUG (mira qué llega)
        echo json_encode([
            "recibido" => $data
        ]);

        editarUsuario(
            $data['id'],
            $data['username'],
            $data['email'],
            (int)$data['status'], // 🔥 clave
            $data['carrera']
        );

        // puedes comentar el debug luego
    break;

    case 'eliminarUsuario':
        eliminarUsuario($_GET['id']);
        echo json_encode(["success"=>true]);
    break;
}
?>