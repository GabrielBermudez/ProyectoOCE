<?php
// incluye la clase Db
require_once('ConexionBD.php');


	class QueryLibroDiario{
		// constructor de la clase
		public function __construct(){}

		public function UltimoLibroDiario(){
			$db=Db::conectar();
			
			$select=$db->query('SELECT MAX(id) as id FROM libro_diario');
 
			$libro_diario = $select->fetch();
			if($libro_diario == null){
				return $libro_diario['id'] = 1;
			}else{
				return $libro_diario['id'] += 1;
			}
			
		}


		public function InsertarLibro($libro,$detalles){
			
			/*echo "<pre>";
    			var_dump($detalles);
    		echo "</pre>";
			die();*/

			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO libro_diario values(NULL,:fecha_asiento,:numero_control)');
			$insert->bindValue('fecha_asiento',$libro->getFecha_asiento());
			$insert->bindValue('numero_control',$libro->getNumero_control());
			
			
			$insert->execute();

			foreach ($detalles as $key => $value) {
				$db=Db::conectar();
				$insert=$db->prepare('INSERT INTO detalle values(NULL,:codigo,:detalle,:debe,:haber,:libro_diario_id)');

				$insert->bindValue('codigo',$value->getCodigo());
				$insert->bindValue('detalle',$value->getDetalle());
				$insert->bindValue('debe',$value->getDebe());
				$insert->bindValue('haber',$value->getHaber());
				$insert->bindValue('libro_diario_id',$value->getLibro_diario_id());
				$insert->execute();
			}

 
		}

		public function BuscarLibros_Diarios(){
			$db=Db::conectar();
			$lista_libro_diario=[];
			$select=$db->query('SELECT * FROM libro_diario');
 
			foreach($select->fetchAll() as $datosLibro){
				$libro_diario= new LibroDiario();
				$libro_diario_array = [];

				$libro_diario->setId($datosLibro['id']);
				$libro_diario->setFecha_asiento($datosLibro['fecha_asiento']);
				$libro_diario->setNumero_control($datosLibro['numero_control']);
				
				$libro_diario_array[] = $libro_diario;

				$lista_libro_diario[]=$libro_diario_array;
			}


			
			foreach ($lista_libro_diario as $key => $value) {
				$lista_detalles= $this->BuscarDetallesRelacionados($value[0]->getId());
				$lista_libro_diario[$key][] = $lista_detalles;
			
			}


			/*echo "<pre>";
    			print_r($lista_libro_diario);
    		echo "</pre>";
			die();*/


			return $lista_libro_diario;
		}


		public function BuscarDetallesRelacionados($id){
			$db=Db::conectar();
			$lista_detalles=[];
			$select=$db->prepare('SELECT * FROM detalle WHERE libro_diario_id=:id');
			$select->bindValue('id',$id);
			$select->execute();

			
 
			foreach($select->fetchAll() as $datosDetalle){
				$detalle= new Detalle();

				$detalle->setId($datosDetalle['id']);
				$detalle->setCodigo($datosDetalle['codigo']);
				$detalle->setDetalle($datosDetalle['detalle']);
				$detalle->setDebe($datosDetalle['debe']);
				$detalle->setHaber($datosDetalle['haber']);
				$detalle->setLibro_diario_id($datosDetalle['libro_diario_id']);
				

				$lista_detalles[]=$detalle;
			}


			return $lista_detalles;
		}


	}
?>