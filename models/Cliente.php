<?php

	class Cliente{

		private $id;
		private $nombre;
		private $apellido;
		private $dni;
		private $telefono;
		private $correo;
		private $fecha_de_creacion;

		function __construct(){

		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getApellido(){
			return $this->apellido;
		}

		public function setApellido($apellido){
			$this->apellido = $apellido;
		}

		public function getDni(){
			return $this->dni;
		}

		public function setDni($dni){
			$this->dni = $dni;
		}

		public function getTelefono(){
			return $this->telefono;
		}

		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}

		public function getCorreo(){
			return $this->correo;
		}

		public function setCorreo($correo){
			$this->correo = $correo;
		}

		public function getFecha_de_creacion(){
			return $this->fecha_de_creacion;
		}

		public function SetFecha_de_creacion($fecha_de_creacion){
			$this->fecha_de_creacion = $fecha_de_creacion;
		}

	}















  ?>