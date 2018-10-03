<?php
if(isset($_POST)){
include("conexion.php");
$uid = $_GET["id"];
$nombre = $_POST["nombreP"];
$nombre_arch = $_FILES["img"]["name"];
$tipo_arch = $_FILES["img"]["type"];
$size_arch = $_FILES["img"]["size"];
$ruta_arch = $_FILES["img"]["tmp_name"];
$error = $_FILES["img"]["error"];
if($nombre_arch == ""){
	echo '<i class="fas fa-exclamation-circle"></i> Por favor seleccione una imagen';
	}else{
// Ruta para subir imagen de portada
$ruta_uno = "../assets/productos/" . $nombre . "/";
$cd_uno = $ruta_uno . $nombre_arch;
if(!file_exists($ruta_uno)){
@mkdir($ruta_uno);
}
@move_uploaded_file($ruta_arch, $cd_uno);
$imagen_producto = $nombre_arch;
$envio = mysqli_query($con, "UPDATE productos SET imagen = '$imagen_producto' WHERE id = '$uid'");
if($envio){
  echo '<div class="ok"><i class="fas fa-clipboard-check"></i> Imagen actualizada correctamente</div>';
}
}
}
?>