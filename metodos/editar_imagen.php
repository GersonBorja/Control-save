<?php
if(isset($_POST["edit"])){
include("conexion.php");
$uid = $_GET["id"];
$nombre = $_POST["nombreP"];
$nombre_arch = $_FILES["img"]["name"];
$tipo_arch = $_FILES["img"]["type"];
$size_arch = $_FILES["img"]["size"];
$ruta_arch = $_FILES["img"]["tmp_name"];
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
  echo "Se agrego el producto";
}
}
?>