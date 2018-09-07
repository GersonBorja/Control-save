<?php
include("conexion.php");
$data = mysqli_query($con, "UPDATE productos SET usuario = '1'");
?>