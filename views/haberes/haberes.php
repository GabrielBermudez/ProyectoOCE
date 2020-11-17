<?php
require_once("../../bd/QueryLibroDiario.php");
require_once('../../models/LibroDiario.php');
require_once('../../models/Detalle.php');
session_start();


$flag=false;

if(isset($_POST['agregar'])){

	$codigo = $_POST['detalle'];
	$detalle = $_POST['detalle_oculto'];
	$debe = $_POST['debe'];
	$haber = $_POST['haber'];

	$array = [$codigo,$detalle,$debe,$haber];

	if($_SESSION['libro_diario'] != null){
		$libro_diario = $_SESSION['libro_diario'];
		
	}

	$libro_diario[] = $array;

	$_SESSION['libro_diario'] = $libro_diario;
	$_SESSION['total_debe'] += $debe;
	$_SESSION['total_haber'] += $haber;

	$flag = true;
}

if(isset($_POST['finalizar'])){
	$libroDiario = new LibroDiario();
	$detalle = new Detalle();
	$query = new QueryLibroDiario();

	$libroDiario->setFecha_asiento($_SESSION['fecha_asiento']);
	$libroDiario->setNumero_control($_SESSION['numero_control']);

	$listaDetalles=[];
	foreach ($_SESSION['libro_diario'] as $key => $value) {
		$detalle = new Detalle();

		$detalle->setCodigo($value[0]);
		$detalle->setDetalle($value[1]);
		$detalle->setDebe($value[2]);
		$detalle->setHaber($value[3]);
		$detalle->setLibro_diario_id($_SESSION['numero_control']);

		$listaDetalles[] = $detalle;
	}

	$query->InsertarLibro($libroDiario,$listaDetalles);

}


	if(!$flag){
		$query = new QueryLibroDiario();
		$maximo = $query->UltimoLibroDiario();

		$_SESSION['numero_control'] = $maximo;
		$_SESSION['libro_diario'] = null;
		$_SESSION['fecha_asiento'] = date('Y-m-d H:m:s');
		$_SESSION['total_debe'] = 0;
		$_SESSION['total_haber'] = 0;

		
	}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script src="https://use.fontawesome.com/05582c731b.js"></script>
</head>
<body>
	<table border="1">
		<tr>
			<th>Nro. de Control</th>
			<th>Fecha del Asiento</th>
			<th>Total Debe</th>
			<th>Total Haber</th>
			<th>Deudor</th>
		</tr>

		<tr>
			<td><input type="number" name="num_control" id="num_control" value="<?=$_SESSION['numero_control']?>" disabled="true"></td>
			<td><input type="text" name="fecha_asiento" id="fecha_asiento" value="<?=$_SESSION['fecha_asiento']?>" disabled="true"></td>
			<td><input type="number" name="total_debe" id="total_debe" value="<?=$_SESSION['total_debe'];?>" disabled="true"></td>
			<td><input type="number" name="total_haber" id="total_haber" value="<?=$_SESSION['total_haber'];?>" disabled="true"></td>
			<td><input type="number" name="total_deudor" id="total_deudor" value="0" disabled="true"></td>
		</tr>

	</table> <br> <br>
	
	<form action="haberes.php" method="POST">
		<table border="1">
			<tr>	
				<th>Codigo</th>
				<th>Detalle</th>
				<th>Debe</th>
				<th>Haber</th>
			</tr>
			<?php if (!empty($_SESSION['libro_diario'])): ?>
				<?php foreach ($_SESSION['libro_diario'] as $key => $value): ?>
						<tr>
							<td><?=$value[0]?></td>
							<td><?=$value[1]?></td>
							<td><?=$value[2]?></td>
							<td><?=$value[3]?></td>
						</tr>
				<?php endforeach ?>	
			<?php endif ?>

			<tr>
				<td><input type="number" name="codigo" id="codigo" disabled="true" value=""></td>
				<td><select name="detalle" id="detalle">
					<option value="default" selected="true"></option>
					<option value="441">Mercaderias Gravadas por el IVA al 10%</option>
					<option value="663">IVA - CREDITO FISCAL </option>
					<option value="241">Caja Gs</option>
				</select></td>
				<td><input type="number" name="debe" id="debe" value="0"></td>
				<td><input type="number" name="haber" id="haber" value="0"></td>
			</tr>
			<input type="hidden" name="detalle_oculto" id="detalle_oculto" value=""> 


		</table>
		<input type="submit" value="agregar" name="agregar">
		<input type="submit" value="Finalizar" name="finalizar">
	</form>
	<script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>