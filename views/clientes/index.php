
<?php
//incluye la clase Libro y CrudLibro
require_once('../../bd/Query_Cliente.php');
require_once('../../models/Cliente.php');
$query=new QueryCliente();

//obtiene todos los libros con el método mostrar de la clase crud
$listaClientes=$query->mostrar();

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clientes</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script src="https://use.fontawesome.com/05582c731b.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Index</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	       <a class="nav-link active" href="index.php">Cliente <span class="sr-only">(current)</span></a>
	      <a class="nav-link" href="../haberes/index.php">Haberes</a>
	      
	    </div>
	  </div>
	</nav>

	<table class="table table-dark mt-5">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Apellido</th>
	      <th scope="col">DNI</th>
	      <th scope="col">Telefono</th>
	      <th scope="col">Correo</th>
	      <th scope="col">Fecha de Alta</th>
	      <th scope="col">Acciones</th>
	    </tr>
	  </thead>

	  <tbody>
	  	<?php foreach ($listaClientes as $key => $cliente): ?>
	  		<tr>
		      <th scope="row"><?=$key+1?></th>
		      <td><?=$cliente->getNombre()?></td>
		      <td><?=$cliente->getApellido()?></td>
		      <td><?=$cliente->getDni()?></td>
		      <td><?=$cliente->getTelefono()?></td>
		      <td><?=$cliente->getCorreo()?></td>
		      <td><?=$cliente->getFecha_de_creacion()?></td>
		      <td>
		      	<a href="update.php?id=<?=$cliente->getId()?>&accion=update"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

		      	<a href="../../controllers/Cliente_Controller.php?id=<?=$cliente->getId()?>&accion=delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
		      </td>
	    	</tr>
	  	<?php endforeach ?>
	    
	   
	  </tbody>
</table>
	
</body>
</html>