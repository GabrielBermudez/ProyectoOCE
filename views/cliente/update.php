<?php
//incluye la clase Libro y CrudLibro
	require_once('../../bd/Query_Cliente.php');
	require_once('../../models/Cliente.php');
	$query= new QueryCliente();
	$cliente= new Cliente();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$cliente=$query->obtenerCliente($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cargar Cliente</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script src="https://use.fontawesome.com/05582c731b.js"></script>
</head>
<body>

	<form action="../../controllers/Cliente_Controller.php" method="POST">
		<input type='hidden' name='id' value='<?= $cliente->getId()?>'>
		<div class="container">
			<h1>Actualizar Cliente: <?=$cliente->getApellido() . " " . $cliente->getNombre()?></h1>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputNombre">Nombre</label>
			      <input type="text" class="form-control" id="inputNombre" name="nombre" value="<?=$cliente->getNombre()?>">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputApellido">Apellido</label>
			      <input type="text" class="form-control" id="inputApellido" name="apellido" value="<?=$cliente->getApellido()?>">
			    </div>
			</div>

		  	<div class="form-row">
			   	<div class="form-group col-md-6">
				    <label for="inputDni">DNI</label>
					<input type="number" class="form-control" id="inputDni" placeholder="" name="dni" value="<?=$cliente->getDni()?>">
				</div>
			    <div class="form-group col-md-6">
			      <label for="inputCorreo">Correo</label>
			      <input type="email" class="form-control" id="inputCorreo" name="correo" value="<?=$cliente->getCorreo()?>">
			    </div> 
		  	</div>
		  
		  
			<div class="form-row">
			    <div class="form-group col-md-12">
			    	<label for="inputTelefono">Telefono</label>
			    	<input type="number" class="form-control" id="inputTelefono" placeholder="" name="telefono" value="<?=$cliente->getTelefono()?>">
			  	</div>
			</div>
			<input type='hidden' name='actualizar' value='actualizar'>
		  	<button type="submit" class="btn btn-primary">Actualizar</button>
		</div>

	</form>
	
</body>
</html>