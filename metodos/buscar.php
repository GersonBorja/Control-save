<?php
include('conexion.php');
$consulta = mysqli_query($con, "SELECT * FROM fechas WHERE mes = '10'");
while($dt = mysqli_fetch_array($consulta)){
	echo $dt["nombre_producto"] . " vencen el dia " . $dt["dia"] . "<br><hr>";
	}
?>