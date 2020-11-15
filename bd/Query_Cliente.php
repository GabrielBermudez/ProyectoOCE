<?php
// incluye la clase Db
require_once('ConexionBD.php');
 
	class QueryCliente{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertar($cliente){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO cliente values(NULL,:nombre,:apellido,:dni,:telefono,:correo,:fecha_de_creacion)');
			$insert->bindValue('nombre',$cliente->getNombre());
			$insert->bindValue('apellido',$cliente->getApellido());
			$insert->bindValue('dni',$cliente->getDni());
			$insert->bindValue('telefono',$cliente->getTelefono());
			$insert->bindValue('correo',$cliente->getCorreo());
			$insert->bindValue('fecha_de_creacion',$cliente->getFecha_de_creacion());
			
			$insert->execute();
 
		}
 
		// método para mostrar todos los libros
		public function mostrar(){
			$db=Db::conectar();
			$listaCliente=[];
			$select=$db->query('SELECT * FROM cliente');
 
			foreach($select->fetchAll() as $datosCliente){
				$cliente= new Cliente();
				$cliente->setId($datosCliente['id']);
				$cliente->setNombre($datosCliente['nombre']);
				$cliente->setApellido($datosCliente['apellido']);
				$cliente->setDni($datosCliente['dni']);
				$cliente->setTelefono($datosCliente['telefono']);
				$cliente->setCorreo($datosCliente['correo']);
				$cliente->setFecha_de_creacion($datosCliente['fecha_de_creacion']);

				$listaCliente[]=$cliente;
			}
			return $listaCliente;
		}
 
		// método para eliminar un libro, recibe como parámetro el id del libro
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM cliente WHERE id=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
 
		// método para buscar un libro, recibe como parámetro el id del libro
		public function obtenerCliente($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM cliente WHERE id=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$datosCliente=$select->fetch();
			$cliente= new Cliente();
			$cliente->setId($datosCliente['id']);
			$cliente->setNombre($datosCliente['nombre']);
			$cliente->setApellido($datosCliente['apellido']);
			$cliente->setDni($datosCliente['dni']);
			$cliente->setTelefono($datosCliente['telefono']);
			$cliente->setCorreo($datosCliente['correo']);
			return $cliente;
		}
 
		// método para actualizar un libro, recibe como parámetro el libro
		public function actualizar($cliente){
			
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE cliente SET nombre=:nombre, apellido=:apellido,dni=:dni,telefono=:telefono,correo=:correo WHERE id=:id');
			$actualizar->bindValue('nombre',$cliente->getNombre());
			$actualizar->bindValue('apellido',$cliente->getApellido());
			$actualizar->bindValue('dni',$cliente->getDni());
			$actualizar->bindValue('telefono',$cliente->getTelefono());
			$actualizar->bindValue('correo',$cliente->getCorreo());
			$actualizar->bindValue('id',$cliente->getId());
			
			$actualizar->execute();
		}
	}
?>