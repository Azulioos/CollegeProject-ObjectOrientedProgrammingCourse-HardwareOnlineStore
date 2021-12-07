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
			
		</a>

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

		<section id="main-content">

			<article>
			<header>
				<h1><b> DATOS DE LA CUENTA.<b> </h1>
			</header>
			<div class="content">
				<img src="img/Perfil.png" alt="">
				<h3>Nombre de usuario: <?php echo $_SESSION['nombre'];?></h3>
				<h3>Direccion de coreo: <?php echo $_SESSION['email'];?></h3>
				<h3>Telefono: <?php echo $_SESSION['Telefono'];?></h3>
				<h3>Domicilio: <?php echo $_SESSION['Domicilio'];?></h3>
			</div>
			
			
		</article>




				</body>