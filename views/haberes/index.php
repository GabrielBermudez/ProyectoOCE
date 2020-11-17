<?php 
require_once("../../bd/QueryLibroDiario.php");
require_once('../../models/LibroDiario.php');
require_once('../../models/Detalle.php');


$query = new QueryLibroDiario();
$lista_libro_mayor = $query->BuscarLibros_Diarios();

/*echo "<pre>";
    print_r($lista_libro_mayor);
echo "</pre>";
die();*/

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
	<?php foreach ($lista_libro_mayor as $key => $value): ?>
		<label for="">Numero de Control: <?=$value[0]->getNumero_control()?></label><br>
		<label for="">Fecha de asiento: <?=$value[0]->getFecha_asiento()?></label> <br> 
		<table border="1">
			<tr>
				<th>Codigo</th>
				<th>Detalle</th>
				<th>Debe</th>
				<th>Haber</th>
				<th>Saldo</th>
			</tr>
			<?php 
			$saldo = 0;
			$sumaDebe = 0;
			$sumaHaber = 0;
			$saldoFinal = 0;
			?>
			<?php foreach ($value[1] as $clave => $valor): ?>
				<?php 
					$saldo += $valor->getDebe()-$valor->getHaber()
				?>
				<tr>
					<td><?=$valor->getCodigo()?></td>
					<td><?=$valor->getDetalle()?></td>
					<td><?=$valor->getDebe()?></td>
					<td><?=$valor->getHaber()?></td>
					<td><?=$saldo?></td>
				</tr>

				<?php
					$sumaDebe += $valor->getDebe();
					$sumaHaber += $valor->getHaber();
					$saldoFinal = $saldo;
				?>
			<?php endforeach ?>
			<tr>
				<td></td>
				<td>SubTotal:</td>
				<td>$<?=$sumaDebe?></td>
				<td>$<?=$sumaHaber?></td>
				<td>$<?=$saldoFinal?></td>
			</tr>
		</table> <br><br> 

		
	<?php endforeach ?>
	
	
</body>
</html>