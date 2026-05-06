<!DOCTYPE html>
<?php require "views/templates/header.php"; ?>
<?php require "views/templates/nav.php"; ?>
<body>
 <br>
 <br>
 <br>
 <div class="container">
 <h1 class="text-center">Gestion personas</h1>
 <div style="padding: 0;" id="conten">
 <form role="form" action="<?php echo constant("URL") ?>Main/modificarPersona"
method="POST">
 <div class="col-md-12" id="conten">
 <input type="hidden" name="id" id="idpersona">

 <div class="form-group">
 <label for="nombre">Ingrese el nombre de la persona:</label>
 <div class="input-group">
 <input type="text" class="form-control" name="nombre" value="<?php echo $this->persona->getNombre(); ?>" id="nombre" placeholder="Ingresa el nombre" required>
 </div>
 </div>
 <div class="form-group">
 <label for="edad">Ingrese la edad de la persona:</label>
 <div class="input-group">
 <input type="number" class="form-control" id="edad" name="edad" value="<?php echo
$this->persona->getEdad(); ?>" placeholder="Ingresa la edad" required>
 </div>
 </div>
 <div class="form-group">
 <label for="edad">Ingrese el telefono de la persona:</label>
 <div class="input-group">
 <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php
echo $this->persona->getTelefono(); ?>" placeholder="Ingresa el telefono" required>
 </div>
 </div>
 <div class="form-group">
 <label for="sexo">Ingrese el sexo de la persona:</label>
 <div class="input-group">
 <select name="sexo" id="sexo" class="form-control" required>
 <option value="Masculino">Maculino</option>
 <option value="Femenino">Femenino</option>
 </select>
 </div>
 </div>
 <div class="form-group">
 <label for="ocupacion">Ingrese la ocupacion de la persona:</label>
 <div class="input-group">
    <select name="ocupacion" id="ocupacion" class="form-control" required>
 <?php
 foreach($this->listaOcupaciones as $lista ){
 ?>
 <option value="<?php echo $lista->getIdOcupacion(); ?>"><?php echo $lista->getOcupacion(); ?></option>
 <?php
 }
 ?>
 </select>
 </div>
 </div>
 <div class="form-group">
 <label for="fecha">Ingrese la fecha de nacimiento de la persona:</label>
 <div class="input-group">
 <input type="date" class="form-control" id="fecha" value="<?php echo $this->persona->getFecha(); ?>" name="fecha" placeholder="Ingresa la fecha" required>
 </div>
 </div>

 <div style="margin-left: 30%;">
 <input type="submit" class="btn btn-success col-md-6 " >
 </div>
 </div>
 </form>
 </div>
<br>
 <div>
 <div class="">
 <table class="table table-striped table-hover table-dark">
 <thead class="table-dark table-striped">
 <tr>
 <th>Id</th>
 <th>Nombre</th>
 <th>Edad</th>
 <th>Telefono</th>
 <th>Sexo</th>
 <th>Ocupacion</th>
 <th>Fecha nacimiento</th>
 <th colspan="2">Operaciones</th>
 </tr>
 </thead>
 <tbody>
 <?php

 foreach($this->listaPersonas as $lista ){
 ?>
 <tr>
    <th><?php echo $lista->getIdPersona(); ?></th>
 <th><?php echo $lista->getNombre(); ?></th>
 <th><?php echo $lista->getEdad(); ?></th>
 <th><?php echo $lista->getTelefono(); ?></th>
 <th><?php echo $lista->getSexo(); ?></th>
 <th><?php echo $lista->getOcupacion()->getOcupacion(); ?></th>
 <th><?php echo $lista->getFecha(); ?></th>
 <th><button onclick="alerta('<?php echo $lista->getIdPersona() ?>')" class="btn btn-danger">Eliminar</button></th>
 <th><button onclick="modificar('<?php echo $lista->getIdPersona() ?>',
 '<?php echo $lista->getNombre(); ?>',
 '<?php echo $lista->getEdad(); ?>',
 '<?php echo $lista->getTelefono(); ?>',
 '<?php echo $lista->getSexo(); ?>',
 '<?php echo $lista->getOcupacion()->getIdOcupacion(); ?>',
 '<?php echo $lista->getFecha(); ?>')" class="btn btn-info">Modificar</button></th>
 </tr>
 <?php
 }

 ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
<?php require "views/templates/modal.php"; ?>
<?php require "views/templates/footer.php"; ?>
</body>
</html>