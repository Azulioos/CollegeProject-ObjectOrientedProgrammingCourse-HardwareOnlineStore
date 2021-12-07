<?php

$alert='';
session_start();
if(!empty($_SESSION['active'])){
	header('location: Interfaz.php');
}

if(!empty($_POST))
{

	if(empty($_POST['Nombre']) || empty($_POST['Contraseña'])){
	$alert = "Ingrese su nombre de usuario y su contraseña";
	}

	else{

	require_once "abrir_conexion.php";

	$user = $_POST['Nombre'];
	$pass = $_POST['Contraseña'];

	$query = mysqli_query($conection, "SELECT * FROM datos_de_usuario WHERE Nombre = '$user' AND Contraseña = '$pass'");

	$result = mysqli_num_rows($query); 

	if($result > 0){
		$data = mysqli_fetch_array($query);
		$_SESSION['active'] = true;
		$_SESSION['iduser'] = $data['ID_Usuario'];
		$_SESSION['nombre'] = $data['Nombre'];
		$_SESSION['email'] = $data['Correo'];
		$_SESSION['Rol'] = $data['Rol'];
		$_SESSION['Domicilio'] =$data['Domicilio'];
		$_SESSION['Telefono'] = $data['Telefono'];

		print_r($data);

		header('location: Interfaz.php');
	}

	else{
		$alert = "El usuario o la clave son incorrectos";
		session_destroy();

	}

}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  
  <link rel="stylesheet" href="estilos/ESTILOS_INICIO_SESION_USUARIO.css">
 
  <title>Iniciar sesion</title>
</head>
<body>
<header id="main-header">
		<img src="img/LOGO.png" alt="">
		<a id="logo-header" href="img/LOGO.png">
			
			<span class="site-desc">Proyecto de POO | LERMF </span>
			
		</a> <!-- / #logo-header -->

		<nav>
		
			<ul>
				<li><a href="INICIO_SESION.php">Registrate</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->

   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Iniciar sesion.</h2>
         <form action="" method="post">
           <input type="text" placeholder="Nombre" name="Nombre" class="nombre">
           <input type="password" placeholder="Contraseña"  name="Contraseña" class="pass">
           <input type="submit" class="submit" value="INGRESAR">
           <p><?php
           echo isset($alert) ? $alert : '';
           ?></p>

         </form>
       </div>
     </div>
   </div>

	<footer id="main-footer">
		<p><a href="https://www.uanl.mx/">Preguntas frecuentes. </a></p>
		<p><a href="https://www.uanl.mx/">¿Quienes somos?. </a></p>
		<p><a href="https://www.uanl.mx/">Aviso de terminos y condiciones. </a></p>

	</footer> <!-- / #main-footer -->
</body>
</html>