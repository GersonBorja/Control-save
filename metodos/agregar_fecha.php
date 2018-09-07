<?php
if(isset($_POST["btnFecha"])){
include("conexion.php");
include("clean_string.php");
$dia = cadena($_POST["dia"]);
$mes = cadena($_POST["mes"]);
$year = cadena($_POST["year"]);
$hora = cadena($_POST["hora"]);
$nombre_producto = cadena($_POST["nombre_producto"]);
$identificador = cadena($_POST["identificador"]);

// Guardar fecha

$agregar = mysqli_query($con, "INSERT INTO fechas (dia, mes, year, hora, nombre_producto, identificador) VALUES ('$dia', '$mes', '$year', '$hora', '$nombre_producto', '$identificador')");
}
?>