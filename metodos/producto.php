<?php
   $valor = $_GET["id"];
   include("conexion.php");
   $consulta = mysqli_query($con, "SELECT id, imagen, nombre, gramaje FROM productos WHERE id = '$valor'");
   $producto = mysqli_fetch_array($consulta);
   ?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Producto</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="../producto.css">
      <script src="../producto.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   </head>
   <body>
      <div class="container">
         <header>
            LOGOTIPO
            <div class="nav">
               <a href="#" class="view modal-open-img"><i class="fas fa-eye"></i> Ver</a>
               <a href="#" class="modal-open-edit"><i class="fas fa-file-image"></i> Editar imagen</a>
            </div>
         </header>
         <div class="modal-fade">
            <div class="modal">
               <form action="agregar_fecha.php" method="post">
                  <div class="modal-title">
                     <h2> Agregar fecha próxima</h2>
                     <span class="modal-close"><i class="fas fa-times-circle"></i></span>
                  </div>
                  <br>
                  <input type="text" name="dia" placeholder="Dia" class="box" autocomplete="off">
                  <input type="text" name="mes" placeholder="Mes" class="box" autocomplete="off">
                  <input type="text" name="year" placeholder="Año" class="box" autocomplete="off">
                  <input type="text" name="hora" placeholder="hora" class="box" autocomplete="off">
                  <input type="hidden" name="nombre_producto" value="<?php echo $producto["nombre"] . " " . $producto["gramaje"]; ?>">
                  <input type="hidden" name="identificador" value="<?php echo $producto["id"]; ?>">
                  <input type="submit" name="btnFecha" class="btn" value="Agregar fecha">
               </form>
            </div>
         </div>
         <div class="modal-fade-edit">
            <div class="modal">
               <div class="modal-title">
                  <h2> Editar imagen del producto</h2>
                  <span class="modal-close-edit"><i class="fas fa-times-circle"></i></span>
               </div>
               <br>
               <form action="editar_imagen.php?id=<?php echo $valor; ?>" method="post" enctype="multipart/form-data">
                  <input type="file" name="img" class="hidden" id="file">
                  <div class="box" id="boxFile">Selecciona una imagen...</div>
                  <input type="hidden" name="nombreP" value="<?php echo $producto["nombre"]; ?>" class="box">
                  <input type="submit" name="edit" class="btn" value="Guardar cambios">
               </form>
            </div>
         </div>
         <div class="modal-image">
            <div class="imagen modal">
               <h2>
                  <span class="imgTitle"><?php echo $producto["nombre"] . " " . $producto["gramaje"]; ?></span>
                  <a href="#" class="modal-close-img closeMin"><i class="fas fa-times-circle"></i></a>
               </h2>
               <?php
if($producto["imagen"] == "sin_imagen.jpg"){
	echo "<img src='../assets/items/sin_imagen.jpg'>";
	}else{
		?>
               <img src="../assets/productos/<?php echo $producto["nombre"]; ?>/<?php echo $producto["imagen"]; ?>">
               	<? 
               }
               ?>
            </div>
         </div>
         <h2 class="nombre_producto">
         	<i class="fas fa-cart-arrow-down"></i>
<?php echo $producto["nombre"] . " " . $producto["gramaje"]; ?></h2>
         <div class="listafechas">
         <?php
            // Mostrar fechas
            $consulta_fechas = mysqli_query($con, "SELECT * FROM fechas WHERE identificador = '$valor'");
            mysqli_free_result($consulta);
            
            while($fechas = mysqli_fetch_array($consulta_fechas)){
            ?>
            	<div class="fechasall">
            	<div class="fechas">
            	<span class="nombre">
            	<i class="far fa-calendar-alt"></i>
            	<?php echo "Proximo el " . $fechas["dia"] . "/" . $fechas["mes"] . "/" . $fechas["year"]; ?>
            	</span>
            <span class="opciones">X</span>
            </div>
            <span class="programado">
            	<i class="fas fa-unlock"></i> Programado a las <?php echo $fechas["hora"]; ?> am/pm
            	</span>
</div>
         <?php
            }
            ?>
            	</div>
         <a href="#" class="modal-open"><i class="fas fa-calendar-plus"></i></a>
      </div>
   </body>
</html>