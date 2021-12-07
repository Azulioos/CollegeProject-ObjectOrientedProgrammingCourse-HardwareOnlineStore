<?php 


$alert='';
session_start();
if(empty($_SESSION['active'])){
	header('location: INICIO_SESION.php');
}


include"abrir_conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, 
        user-scalable=no, initial-scale=1, maximum-scale=1,minimum-scale=1">
	<title>LERMF</title>

        <?php
        include "scripts.php";
        ?>
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

	</header><!-- / #main-header -->
	
	<div id="Buttom">
	<p><b>Si tienes algun problema no<br>dudes en contactarnos.</b> <br>Numero: XXXXXXX <br>Correo: XXXXXXX</p>
	<ul>
	<li><a href="CATALOGO.php"> Ver catalogo </a></li>
	</ul>	
	</div>
	
	
	

	<section id="main-content">
	
		<article>
			<header>
				<h1>¿Buscas sillas o mesas para tu evento o trabajo? Aparta ahora a precios muy bajos! </h1>
			</header>
			
			<img src="https://blogdelregio.com/wp-content/uploads/2020/05/Untitled-13.jpg" alt="Imagen" />
			
			<div class="content">
				<p></p>
				
			</div>
			
			
		</article> <!-- /article -->
	
	</section> <!-- / #main-content -->
	
	
	<footer id="main-footer">
		<p><a href="https://www.uanl.mx/">Preguntas frecuentes. </a></p>
		<p><a href="https://www.uanl.mx/">¿Quienes somos?. </a></p>
		<p><a href="https://www.uanl.mx/">Aviso de terminos y condiciones. </a></p>

	</footer> <!-- / #main-footer -->

	
</body>
</html>