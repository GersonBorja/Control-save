<?php
include("conexion.php");

$dia = date("d");
$mes = date("m");
$year = date("y");
$hour = date("h:i");
echo $hour . "<br>";
$fecha = $dia . $mes . $year;
echo $fecha . "<br><br><br>";
$fechados = $dia . "/" . $mes . "/" . $year;
$consulta = mysqli_query($con, "SELECT * FROM fechas");
//Recorrer fechas
while($row = mysqli_fetch_array($consulta)){
	if(strlen($row["mes"]) > 2){
$date = $row["dia"] . "0" . ($row["mes"] - 01) . $row["year"];
}else{
      $date = $row["dia"] . ($row["mes"] - 1) . $row["year"];
	}
echo $date . "<br>";
if($fecha == $date && $hour == $row["hora"]){
include("enviar_email.php");
emailNotification($row["nombre_producto"], $date);
}
}
?>