<?php


$alert='';
session_start();
if(!empty($_SESSION['active'])){
	header('location: Interfaz.php');
}


if(empty($_POST['Nombre']) || empty($_POST['Correo']) || empty($_POST['Telefono']) || empty($_POST['Contraseña']) || empty($_POST['Domicilio']) || empty($_POST['Rol'])){
	$alert="<p>Todos los campos son obligatorios.</p>";
}

else{

	include "abrir_conexion.php";
	    $Nombre=$_POST['Nombre'];
		$Correo=$_POST['Correo'];
		$Contraseña=$_POST['Contraseña'];
		$Telefono=$_POST['Telefono'];
	    $Domicilio=$_POST['Domicilio'];
	    $Rol= $_POST['Rol'];

	    $query = mysqli_query($conection,"SELECT * FROM datos_de_usuario WHERE Nombre = '$Nombre' OR  Correo = '$Correo'");
	    $result  = mysqli_fetch_array($query);

	    if($result > 0){
	    	$alert='<p> El correo o el usuario ya existe. </p>';
	    }

	    else{

	    	$query_insert = mysqli_query($conection, "INSERT INTO datos_de_usuario (Nombre, Correo, Contraseña, Telefono, Domicilio, Rol) VALUES ('$Nombre', '$Correo', '$Contraseña', '$Telefono', '$Domicilio','$Rol')");

	    if($query_insert){
	    	$alert='<p>Usuario creado correctamente</p>';

	    }
	    else{
	    	$alert='<p>Error al crear un usuario.</p>';
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
 
 
  <link rel="stylesheet" href="estilos/ESTILOS_INICIO_SESION.css">
 
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
				<li><a href="INICIO_SESION_USUARIO.php">Iniciar sesion.</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->


   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Registrate!.</h2>
		<form action="" method="POST">
	   <label for="Nombre"> Su nombre</label>
           <input type="text" name="Nombre" placeholder="Nombre" class="nombre" required>

	   <label for="Correo">Su correo</label>
           <input type="text" name="Correo" placeholder="Correo" class="correo" required>

	   <label for="Contraseña">Su contraseña </label>
           <input type="password"  name="Contraseña" placeholder="Contraseña" class="pass" required>


	   <label for="Telefono"> Su telefono. </label>
	   <input type="text" name="Telefono" placeholder="Telefono" class="telefono" required>


	   <label for="Domicilio"> Su domicilio</label>
	   <input type="text"  name="Domicilio" placeholder="Domicilio" class="Domicilio" required>

	   	<label for="Rol"> Su rol</label>
	   	<select name="Rol" id="Rol" required>
	   		<option value="1">Administrador</option>
	   		<option value="2">Supervisor</option>
	   	</select>



           <input type="submit" name="btn1" class="submit" value="Enviar">
         </form>
       </div>
       <div class="login">
         <h2>Iniciar Sesión</h2>
         <div class="login-items">
           <button class="ca"><a href="INICIO_SESION_USUARIO.php">Iniciar sesion. </a></button>
	 <h2>Si existe algun problema con su cuenta comuniquelo a este correo: xxxxx@outlook.com</h2>
           
         </div>
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