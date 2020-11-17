<?php 
	class LibroDiario{

		private $id;
		private $fecha_asiento;
		private $numero_control;


		function __construct(){

		}


		public function getId(){
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getFecha_asiento(){
			return $this->fecha_asiento;
		}

		public function setFecha_asiento($fecha_asiento){
			$this->fecha_asiento = $fecha_asiento;
		}

		public function getNumero_control(){
			return $this->numero_control;
		}

		public function setNumero_control($numero_control){
			$this->numero_control = $numero_control;
		}

	}




 ?>