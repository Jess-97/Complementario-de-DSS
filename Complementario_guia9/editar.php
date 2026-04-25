<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/forms.css">
<meta charset="UTF-8">
</head>

<body>

<div class="form-card">
<h2>✏️ Editar Usuario</h2>

<input id="username" placeholder="Nombre">
<input id="email" placeholder="Correo">

<select id="status">
<option value="1">Activo</option>
<option value="0">Inactivo</option>
</select>

<select id="carrera"></select>

<button class="btn-update" onclick="actualizar()">Actualizar</button>
</div>

<script>
const id = new URLSearchParams(location.search).get("id");

// cargar carreras
fetch("api.php?opc=listarCarreras")
.then(r=>r.json())
.then(data=>{
    let opt="";
    data.forEach(c=>{
        opt+=`<option value="${c.id_carrera}">${c.nombre}</option>`;
    });
    document.getElementById("carrera").innerHTML=opt;
});

// cargar usuario
fetch("api.php?opc=obtenerUsuario&id="+id)
.then(r=>r.json())
.then(u=>{
    document.getElementById("username").value = u.username;
    document.getElementById("email").value = u.user_email;
    document.getElementById("status").value = String(u.user_status); // 🔥 CLAVE
    document.getElementById("carrera").value = u.id_carrera;
});

function actualizar(){

    const statusValue = document.getElementById("status").value;

    console.log("STATUS ENVIADO:", statusValue); // 🔥 DEBUG

    fetch("api.php?opc=editarUsuario",{
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({
            id: id,
            username: document.getElementById("username").value,
            email: document.getElementById("email").value,
            status: Number(statusValue), // 🔥 CLAVE REAL
            carrera: document.getElementById("carrera").value
        })
    })
    .then(r=>r.json())
    .then(()=>{
        alert("Actualizado correctamente");
        location.href="index.php";
    });
}
</script>

</body>
</html>