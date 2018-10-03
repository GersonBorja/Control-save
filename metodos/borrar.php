<?php
if(isset($_POST)){
	include("conexion.php");
	$id = $_POST["id"];
	$consulta = mysqli_query($con, "DELETE FROM fechas WHERE id = '$id'");
		if($consulta){
echo "Se elimino correctamente";
}
}
?>