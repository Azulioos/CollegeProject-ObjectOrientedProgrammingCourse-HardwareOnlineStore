<?php 
include "abrir_conexion.php";

$alert='';
session_start();
if(empty($_SESSION['active'])){
	header('location: INICIO_SESION.php');
}

if(!empty($_POST)){

if(empty($_POST['Usuario']) || empty($_POST['Producto']) || empty($_POST['Estado']) || empty($_POST['Tiempo_De_Renta']) || empty($_POST['Cantidad']) || empty($_POST['Fecha']) || empty($_POST['Direccion'])){
	$alert="<p>Todos los campos son obligatorios.</p>";
}
        $Productoss = $_POST['Producto'];
        $Cantidad = $_POST['Cantidad'];
        $query_Producto = mysqli_query($conection, "SELECT * FROM producto WHERE Codigo_Producto = $Productoss ");
        $Producto = mysqli_fetch_array($query_Producto);
        $Existencias = $Producto["Existencia"];
        $Existenciass = $Producto["Existencia"];
        $Precio = $Producto["Precio"];

        $Existencias = $Existencias - $Cantidad;
        if($Existencias > 0 && $Existenciass > $Cantidad && $Cantidad > 0){
        $query_insert = mysqli_query($conection,"UPDATE producto SET Existencia = $Existencias WHERE Codigo_Producto = $Productoss");

        $Tiempo = $_POST['Tiempo_De_Renta'];
		$Usuario = $_SESSION['iduser'];
		$Producto =$_POST['Producto'];
        $Precio_Total = $Precio * $Cantidad * $Tiempo;
        $Estado = 1;
		$Tiempo_De_Renta =$_POST['Tiempo_De_Renta'];
		$Cantidad =$_POST['Cantidad'];
		$Fecha =$_POST['Fecha'];
		$Direccion =$_POST['Direccion'];


		$query_insert = mysqli_query($conection,"INSERT INTO rentas (Usuario, Producto, Precio_Total, Estado, Tiempo_De_Renta, Cantidad, Fecha, Direccion) VALUES ('$Usuario', '$Producto', '$Precio_Total', '$Estado', '$Tiempo_De_Renta', '$Cantidad', '$Fecha', '$Direccion')");

	    if($query_insert){
	    	$alert='<p>Renta realizada correctamente.</p>';

		header('location: MI_PEDIDO.php');

	    }
        else{
            $alert='<p>Error en los valores, no introduzcas valores negativos o mayores al stock.</p>';
        }
    }

    else{
        $alert='<p>Error en los valores, no introduzcas valores negativos o mayores al stock.</p>';
    }
	    
    
	    }
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, 
        user-scalable=no, initial-scale=1, maximum-scale=1,minimum-scale=1">
	<title>LERMF</title>

	<link rel="stylesheet" href="estilos/ESTILOS_INICIO_SESION.css">


</head>

<body>
	   <header id="main-header">
        <img src="img/LOGO.png" alt="">
        <a id="logo-header" href="img/LOGO.png">
            
            <span class="site-desc">Proyecto de POO | LERMF </span>
            
        </a> <!-- / #logo-header -->

        <nav>
        
            <ul>
                <?php 
                if($_SESSION['Rol'] == 1){
                ?>
                <li><a href="PRODUCTOS.php">Productos.</a></li>
                <?php

            }
                ?>
                <li><a href="Interfaz.php">Inicio</a></li>
                <li><a href="MI_CUENTA.php">Cuenta</a></li>
                <li><a href="MI_PEDIDO.php">Mi pedido</a></li>
                <li><a href="salir.php">Salir</a></li>
            </ul>
        </nav><!-- / nav -->

    </header>


   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Realizar una renta.</h2>
         <form action="" method="POST">
         	<label for="Cantidad">Cantidad de dicho producto.</label>
         	<input type="number" name="Cantidad" placeholder="Cantidad" class="Cantidad" required>
         	<label for="Fecha">La fecha del evento.</label>
         	<input type="date" name="Fecha" placeholder="Fecha" class="Fecha" required>
         	<label for="Fecha">La direccion del evento.</label>
         	<input type="text" name="Direccion" placeholder="Direccion" class="Direccion" required>
         	<label for="Tiempo_De_Renta">El numero de dias que desea rentar.</label>
         	<input type="number" name="Tiempo_De_Renta" placeholder="Dias de renta" class="Tiempo_De_Renta" required>
         	

         	<?php
         	$query_Producto = mysqli_query($conection, "SELECT * FROM producto");
         	$result_Producto = mysqli_num_rows($query_Producto);



         	?>
         	<label for="Producto">Producto</label>
         	<select name="Producto" id="Producto">
         		<?php
         			if($result_Producto > 0){
         			while($Producto = mysqli_fetch_array($query_Producto)){
         				?>
         				<option value="<?php echo $Producto["Codigo_Producto"]; ?>"><?php echo $Producto["Nombre_Producto"];?>

         					
         				</option>

					<?php
                    
         			}

         		}

         		?>
         </select>

         	<input type="submit" class="submit" value="INGRESAR">

         </form>
       </div>
     </div>
   </div>

    <div class="alert"><p><?php echo isset($alert) ? $alert : ''; ?></p></div>


	<footer id="main-footer">
		<p><a href="https://www.uanl.mx/">Preguntas frecuentes. </a></p>
		<p><a href="https://www.uanl.mx/">¿Quienes somos?. </a></p>
		<p><a href="https://www.uanl.mx/">Aviso de terminos y condiciones. </a></p>

	</footer> <!-- / #main-footer -->
</body>
</html>