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


<div id="A">
		<h1>SOLICITUDES DE RENTA</h1>
	</div>


	<table>
		<tr>
			<th>Producto</th>
			<th>Direccion</th>
			<th>Tiempo_De_Renta</th>
			<th>Cantidad</th>
			<th>Fecha</th>


		</tr>
		<?php
		$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM rentas" );
		$result_register = mysqli_fetch_array($sql_registe);

		$total_registro = $result_register['total_registro'];

		if(empty($_GET['pagina'])){
			$pagina=1;
		}

		else{
			$pagina = $_GET['pagina'];
		}
		$query = mysqli_query($conection, "SELECT * FROM rentas ORDER BY ID_Factura");


		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while($data = mysqli_fetch_array($query)){
				if($data["Estado"] == 1){
					if($_SESSION['iduser'] == $data["Usuario"]){

?>
				<tr>
				<td><?php echo $data["Producto"]?></td>
				<td><?php echo $data["Direccion"]?></td>
				<td><?php echo $data["Tiempo_De_Renta"]?> Dias.</td>
				<td><?php echo $data["Cantidad"]?> Unidades.</td>
				<td><?php echo $data["Fecha"]?></td>
				</tr>

			
			


			<?php
			}
		}
		}


		}
?>
</table>

<div id="A">	
		<h1>RENTAS ACEPTADAS (El propietario se comunicara con usted por el telefono o correo que se nos proporciono, verifiquelo si es necesario).</h1>
</div>

	<table>

		<tr>
			<th>Producto</th>
			<th>Direccion</th>
			<th>Tiempo_De_Renta</th>
			<th>Cantidad</th>
			<th>Fecha</th>


		</tr>
		<?php

		include"abrir_conexion.php";
		$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM rentas" );
		$result_register = mysqli_fetch_array($sql_registe);

		$total_registro = $result_register['total_registro'];

		if(empty($_GET['pagina'])){
			$pagina=1;
		}

		else{
			$pagina = $_GET['pagina'];
		}
		$query = mysqli_query($conection, "SELECT * FROM rentas ORDER BY ID_Factura");


		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while($data = mysqli_fetch_array($query)){

				if($data["Estado"] == 2){
					if($_SESSION['iduser'] == $data["Usuario"]){

?>
				<tr>
				<td><?php echo $data["Producto"]?></td>
				<td><?php echo $data["Direccion"]?></td>
				<td><?php echo $data["Tiempo_De_Renta"]?> Dias</td>
				<td><?php echo $data["Cantidad"]?> Unidades.</td>
				<td><?php echo $data["Fecha"]?></td>
				</tr>
			
			


			<?php
			}
		}
}

		}
?>
</table>


<div id="Buttom">
	<ul>
	<li><a href="FACTURA.php"> Factura. </a></li>
	</ul>	
	</div>
	

</body>
</html>