<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Usuarios</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">

</head>

<body>

<div class="container py-5">

<h1 class="text-center mb-4">🏹 Gestión de Usuarios</h1>

<div class="text-end mb-3">
<a href="nuevo.php" class="btn btn-add">➕ Nuevo Usuario</a>
</div>

<div class="card p-4">
<table class="table text-center">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Correo</th>
<th>Estado</th>
<th>Carrera</th>
<th>Acciones</th>
</tr>
</thead>
<tbody id="datos"></tbody>
</table>
</div>

</div>

<script>
fetch("api.php?opc=listarUsuarios")
.then(r=>r.json())
.then(data=>{
    let html="";
    data.forEach(u=>{
        html+=`
        <tr>
            <td>${u.user_id}</td>
            <td>${u.username}</td>
            <td>${u.user_email}</td>
            <td>
                <span class="${parseInt(u.user_status) === 1 ? 'badge-activo':'badge-inactivo'}">
                ${parseInt(u.user_status) === 1 ? 'Activo':'Inactivo'}
                </span>
            </td>
            <td>${u.carrera}</td>
            <td>
                <a href="editar.php?id=${u.user_id}" class="btn btn-edit">✏️</a>
                <a href="eliminar.php?id=${u.user_id}" class="btn btn-delete">🗑️</a>
            </td>
        </tr>`;
    });

    document.getElementById("datos").innerHTML = html;
});
</script>

</body>
</html>