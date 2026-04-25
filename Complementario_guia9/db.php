<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'rest_api_demo');
define('DB_USER', 'root');
define('DB_PASS', '');

function getConnection(){
    return new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

/* ===== CARRERAS ===== */
function obtenerCarreras(){
    $conn = getConnection();
    return $conn->query("SELECT * FROM carreras")->fetchAll(PDO::FETCH_ASSOC);
}

/* ===== USERS ===== */
function obtenerUsuarios(){
    $conn = getConnection();

    $sql = "SELECT u.*, c.nombre AS carrera
            FROM users u
            INNER JOIN carreras c ON u.id_carrera = c.id_carrera";

    return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerUsuario($id){
    $conn = getConnection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertarUsuario($username,$email,$status,$carrera){
    $conn = getConnection();

    $sql = "INSERT INTO users(username,user_email,user_status,id_carrera)
            VALUES(:username,:email,:status,:carrera)";

    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':status' => (int)$status,
        ':carrera' => $carrera
    ]);
}

/* 🔥 ESTA ES LA IMPORTANTE (ARREGLADA) */
function editarUsuario($id,$username,$email,$status,$carrera){
    $conn = getConnection();

    $sql = "UPDATE users 
            SET username = :username,
                user_email = :email,
                user_status = :status,
                id_carrera = :carrera
            WHERE user_id = :id";

    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':status' => (int)$status,  // 🔥 clave
        ':carrera' => $carrera,
        ':id' => $id
    ]);
}

function eliminarUsuario($id){
    $conn = getConnection();

    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    return $stmt->execute([$id]);
}
?>