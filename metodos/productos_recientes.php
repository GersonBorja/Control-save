<?php

include("conexion.php");
$consulta = mysqli_query($con, "SELECT id, nombre FROM productos ORDER BY id DESC");

while($producto = mysqli_fetch_array($consulta)){
echo '
<a href="metodos/producto.php?id=' . $producto["id"] . '" class="items"><span class="left"><i class="fas fa-shopping-basket"></i> ' . $producto["nombre"] . '</span><span class="right"><i class="fas fa-sliders-h"></i></span></a>
';
}
?>