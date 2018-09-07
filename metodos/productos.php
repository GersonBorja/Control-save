<?php
$valor = $_GET["id"];
include("conexion.php");
$consulta = mysqli_query($con, "SELECT id, imagen, nombre, gramaje FROM productos WHERE id = '$valor'");
$producto = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Control de fechas Selectos</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="theme-color"content="#212121">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../producto.css">
</head>
<body>

<div class="container">
<header>
<h1 class="logotipo">Control de fechas</h1>
</header>
<img src="../assets/productos/<?php echo $producto["nombre"]; ?>/<?php echo $producto["imagen"]; ?>">
<?php

// Mostrar fechas
$consulta_fechas = mysqli_query($con, "SELECT * FROM fechas WHERE identificador = '$valor'");
mysqli_free_result($consulta);

while($fechas = mysqli_fetch_array($consulta_fechas)){
echo $fechas["nombre_producto"] . $fechas["year"];
?>
<?php
}
?>
<form  action="editar_imagen.php?id=<?php echo $valor; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="img" class="box">
<input type="hidden" name="nombreP" value="<?php echo $producto["nombre"]; ?>" class="box">
<input type="submit" name="edit" class="btn" value="Guardar cambios">
</form>
<form action="agregar_fecha.php" method="post">
<input type="text" name="dia" placeholder="Dia" class="box">
<input type="text" name="mes" placeholder="Mes" class="box">
<input type="text" name="year" placeholder="Año" class="box">
<input type="text" name="hora" placeholder="hora" class="box">
<input type="hidden" name="nombre_producto" value="<?php echo $producto["nombre"] . " " . $producto["gramaje"]; ?>">
<input type="hidden" name="identificador" value="<?php echo $producto["id"]; ?>">
<input type="submit" name="btnFecha" class="btn" value="Añadir fecha">
</form>
</div>
</body>
</html>