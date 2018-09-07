<?php
function cadena($injection){
GLOBAL $con;
$limpiar = mysqli_real_escape_string($con, trim(strip_tags($injection)));
return $limpiar;
}
?>