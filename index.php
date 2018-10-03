<!DOCTYPE html>
<html>
<head>
<title>Control de fechas Selectos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="theme-color"content="#23a86b">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<script src="main.js"></script>
</head>
<body>
<header>
<h1 class="logotipo">Control de fechas</h1>
</header>
<div class="shower"></div>
<form action="metodos/add_date.php" method="post" enctype="multipart/form-data" class="ban" id="ajaxform">
<h4><i class="fas fa-cart-plus"></i> Añadir producto</h4>
<input type="file" name="img" class="hide" id="original">
<div class="box" id="secundario">Selecciona una imagen</div>
<input type="text" name="nombre" placeholder="Nombre del producto" autocomplete="off" class="box">
<input type="text" name="peso" placeholder="Unidad de medida" autocomplete="off" class="box">
<input type="text" name="barcode" placeholder="Código de barras (opcional)" class="box">
<input type="hidden" name="user_id" value="1">
<input type="submit" name="btn" class="btn" value="Agregar producto">
</form>
<div class="fechas">
<h4>Productos agregados recientemente</h4>
<?php
  include("metodos/productos_recientes.php");
?>
	</div>
</body>
</html>