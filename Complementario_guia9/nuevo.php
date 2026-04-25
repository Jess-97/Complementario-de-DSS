<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/forms.css">
</head>

<body>

<div class="form-card">
<h2>➕ Nuevo Usuario</h2>

<input id="username" placeholder="Nombre">
<input id="email" placeholder="Correo">

<select id="status">
<option value="1">Activo</option>
<option value="0">Inactivo</option>
</select>

<select id="carrera"></select>

<button class="btn-save" onclick="guardar()">Guardar</button>
</div>

<script>
fetch("api.php?opc=listarCarreras")
.then(r=>r.json())
.then(data=>{
    let opt="";
    data.forEach(c=>{
        opt+=`<option value="${c.id_carrera}">${c.nombre}</option>`;
    });
    document.getElementById("carrera").innerHTML=opt;
});

function guardar(){
    fetch("api.php?opc=insertarUsuario",{
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({
            username:document.getElementById("username").value,
            email:document.getElementById("email").value,
            status: parseInt(document.getElementById("status").value),
            carrera:document.getElementById("carrera").value
        })
    }).then(()=>{
        alert("Guardado");
        location.href="index.php";
    });
}
</script>

</body>
</html>