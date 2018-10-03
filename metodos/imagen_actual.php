<?php
if($_POST){
	include('conexion.php');
	$valor = $_POST['imagen'];
	$consulta = mysqli_query($con, "SELECT imagen FROM productos WHERE id = '$valor'");
	$productos = mysqli_fetch_array($consulta);
	echo $productos["imagen"];
	}
	?>