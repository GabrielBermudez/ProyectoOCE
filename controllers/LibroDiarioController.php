<?php 
	require_once("../bd/QueryLibroDiario.php");
	//require_once("../models/LibroDiario.php");
	
 	
 	class LibroDiarioController
 	{
 	
 		public function __construct (){

 		}

 		
		//$cliente= new Cliente();

		public function MaximoID(){
			

			$query= new QueryCliente();
			$maximo = $query->UltimoLibroDiario();

			if($maximo == null){
				return 1;
			}else{
				return $maximo + 1;
			}
		}
 	}
	


 ?>