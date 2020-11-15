<?php
//incluye la clase Libro y CrudLibro

require_once('../bd/Query_Cliente.php');
require_once('../models/Cliente.php');
 
$query= new QueryCliente();
$cliente= new Cliente();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {

		$cliente->setNombre($_POST['nombre']);
		$cliente->setApellido($_POST['apellido']);
		$cliente->setDni($_POST['dni']);
		$cliente->setTelefono($_POST['telefono']);
		$cliente->setCorreo($_POST['correo']);
		$cliente->setFecha_de_creacion(date('Y-m-d H:m:s'));
		//llama a la función insertar definida en el crud
		
		$query->insertar($cliente);
		;
		header('Location: ../views/cliente/index.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}elseif(isset($_POST['actualizar'])){
		
		$cliente->setId($_POST['id']);
		$cliente->setNombre($_POST['nombre']);
		$cliente->setApellido($_POST['apellido']);
		$cliente->setDni($_POST['dni']);
		$cliente->setTelefono($_POST['telefono']);
		$cliente->setCorreo($_POST['correo']);
		$query->actualizar($cliente);
		header('Location: ../views/cliente/index.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='delete') {
		$query->eliminar($_GET['id']);
		header('Location: ../views/cliente/index.php');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='update'){
		header('Location: ../views/cliente/update.php');
	}
?>