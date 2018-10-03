<?php
if(isset($_POST)){
include("conexion.php");
include("clean_string.php");
$nombre = cadena($_POST["nombre"]);
$peso = strtolower(str_replace(' ', '', cadena($_POST["peso"])));
$user_id = cadena($_POST["user_id"]);
$barcode = cadena($_POST["barcode"]);
$nombre_arch = $_FILES["img"]["name"];
$tipo_arch = $_FILES["img"]["type"];
$size_arch = $_FILES["img"]["size"];
$ruta_arch = $_FILES["img"]["tmp_name"];
$noimage_arch = $_FILES["img"]["error"];
$errores = [];
$imagen_producto = "";

//Consultar a la db por existencias
$existencias = mysqli_query($con, "SELECT nombre FROM productos WHERE nombre = '$nombre' && gramaje = '$peso'");
$total_existencias = mysqli_num_rows($existencias);
//Validar inputs
if(empty($nombre) && empty($peso)){
	echo "No se puede guardar recordatorio en blanco.";
	}else if(empty($nombre) || empty($peso)){
		echo "Completa todos los campos";
		}else if($total_existencias > 0){
			echo $noimage_arch;
			echo "Este producto ya se encuentra en la base de datos";
			}else{
				if($noimage_arch){
					$imagen_producto = "sin_imagen.jpg";
					}
			if($size_arch > 1000000){
				echo "La imagen excede el tama�o 1MB";
				}
				if(strlen($nombre) <= 9){
					echo "Utiliza un nombre de producto mas espec�fico";
					}
					if(strlen($nombre) > 200){
						echo "Utiliza un nombre de producto mas corto";
						}
						if(strlen($peso) <= 1 || strlen($peso) > 10){
							echo "Ingresa una medida de peso valida";
							}else{
								//Ruta para subir imagen de portada
								$ruta_uno = "../assets/productos/" . $nombre . "/";
								$cd_uno = $ruta_uno . $nombre_arch;
								if(!file_exists($ruta_uno)){
									@mkdir($ruta_uno);
									}
									$dcmove = @move_uploaded_file($ruta_arch, $cd_uno);
									if($dcmove){
									$imagen_producto = $nombre_arch;
									}
									$envio = mysqli_query($con, "INSERT INTO productos (imagen, nombre, codigo, gramaje, usuario) VALUES ('$imagen_producto', '$nombre', '$barcode', '$peso', '$user_id')");
									if($envio){
										echo "Recordatorio guardado";
										}else{
											echo "Error al guardar";
											}
								
								}
			}
}
?>