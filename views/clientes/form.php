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
		<div class="container">
			<h1>Registro de Cliente</h1>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputNombre">Nombre</label>
			      <input type="text" class="form-control" id="inputNombre" name="nombre">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputApellido">Apellido</label>
			      <input type="text" class="form-control" id="inputApellido" name="apellido">
			    </div>
			</div>

		  	<div class="form-row">
			   	<div class="form-group col-md-6">
				    <label for="inputDni">DNI</label>
					<input type="number" class="form-control" id="inputDni" placeholder="" name="dni">
				</div>
			    <div class="form-group col-md-6">
			      <label for="inputCorreo">Correo</label>
			      <input type="email" class="form-control" id="inputCorreo" name="correo">
			    </div> 
		  	</div>
		  
		  
			<div class="form-row">
			    <div class="form-group col-md-12">
			    	<label for="inputTelefono">Telefono</label>
			    	<input type="number" class="form-control" id="inputTelefono" placeholder="" name="telefono">
			  	</div>
			</div>
			<input type='hidden' name='insertar' value='insertar'>
		  	<button type="submit" class="btn btn-primary">Enviar</button>
		</div>

	</form>
	
</body>
</html>