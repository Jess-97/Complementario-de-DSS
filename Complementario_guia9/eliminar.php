<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/forms.css">
</head>

<body>

<div class="form-card">
<h2>⚠️ Eliminar Usuario</h2>

<p>¿Seguro que deseas eliminar este usuario?</p>

<button class="btn-danger" onclick="eliminar()">Eliminar</button>
</div>

<script>
const id = new URLSearchParams(location.search).get("id");

function eliminar(){
    fetch("api.php?opc=eliminarUsuario&id="+id)
    .then(()=>{
        alert("Eliminado");
        location.href="index.php";
    });
}
</script>

</body>
</html>