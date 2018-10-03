<?php
if($_POST){
include("conexion.php");
include("clean_string.php");
$dia = cadena($_POST["dia"]);
$mes = cadena($_POST["mes"]);
$year = cadena($_POST["year"]);
$hora = cadena($_POST["hora"]);
$nombre_producto = cadena($_POST["nombre_producto"]);
$identificador = cadena($_POST["identificador"]);
$errores = [];
if(empty($dia) || empty($mes) || empty($year) || empty($hora)){
	array_push($errores, "Llena todos los campos del formulario");
	}else{
		if(!is_numeric($dia) || !is_numeric($mes) || !is_numeric($year)){
			array_push($errores, "Ingresa datos correctos");
			}
		if(strlen($dia) < 2 || strlen($dia) > 2 || !is_numeric($dia)){
			array_push($errores, "Ingresa un dia correcto");
		}
		if(strlen($mes) < 2 || strlen($mes) > 2 || !is_numeric($mes)){
			array_push($errores, "Ingresa un mes correcto");
			}
			if(strlen($year) < 2 || strlen($year) > 2 || !is_numeric($year)){
				array_push($errores, "Ingresa una temporada correcta");
				}
				if(strlen($hora) > 5 || strlen($hora) < 5){
					array_push($errores, "Ingresa una hora correcta");
					}
		}
		if(count($errores) > 0){
			for($i = 0; $i < count($errores); $i ++){
			echo '<div><i class="fas fa-exclamation-circle"></i> ' .$errores[$i] . '</div>';
			}
			}else{
				$agregar = mysqli_query($con, "INSERT INTO fechas (dia, mes, year, hora, nombre_producto, identificador) VALUES ('$dia', '$mes', '$year', '$hora', '$nombre_producto', '$identificador')");
				if($agregar){
							echo '<div class="ok"><i class="fas fa-clipboard-check"></i> Fecha añadida a la lista de tareas</div>';
							}
				}

}
?>