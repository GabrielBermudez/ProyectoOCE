<?php 
	class Detalle{

		private $id;
		private $codigo;
		private $detalle;
		private $debe;
		private $haber;
		private $libro_diario_id;
		

		function __construct(){

		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getCodigo(){
			return $this->codigo;
		}

		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		public function getDetalle(){
			return $this->detalle;
		}

		public function setDetalle($detalle){
			$this->detalle = $detalle;
		}

		public function getDebe(){
			return $this->debe;
		}

		public function setDebe($debe){
			$this->debe = $debe;
		}

		public function getHaber(){
			return $this->haber;
		}

		public function setHaber($haber){
			$this->haber = $haber ;
		}

		public function getLibro_diario_id(){
			return $this->libro_diario_id;
		}

		public function setLibro_diario_id($libro_diario_id){
			$this->libro_diario_id = $libro_diario_id;
		}


	}
 ?>