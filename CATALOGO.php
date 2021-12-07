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


	</header>
	<section id="main-content">
	
		<article>
			<header>
			</header>
			
			<div class="content">
				<p>El precio mostrado en pantalla corresponde a solo para un dia.</p>
				
			</div>
			
			
		</article> <!-- /article -->
	
	</section>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Existencias</th>
			<th>Foto</th>


		</tr>
		<?php
		$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM producto" );
		$result_register = mysqli_fetch_array($sql_registe);

		$total_registro = $result_register['total_registro'];

		if(empty($_GET['pagina'])){
			$pagina=1;
		}

		else{
			$pagina = $_GET['pagina'];
		}
		$query = mysqli_query($conection, "SELECT * FROM producto ORDER BY Codigo_Producto");


		mysqli_close($conection);
		$result = mysqli_num_rows($query);
		echo $result;

		if($result > 0){
			while($data = mysqli_fetch_array($query)){

				if($data['Foto'] = 'img_producto.png'){
				$Foto = 'img/'.$data['Foto'];
				}
				else{
					$Foto ='img/' .$data['Foto'];
				}
?>
				<tr>
				<td><?php echo $data["Nombre_Producto"]?></td>
				<td><?php echo $data["Descripcion"]?></td>
				<td>$<?php echo $data["Precio"]?>.00 Mnx.</td>
				<td><?php echo $data["Existencia"]?> Unidades</td>
				<td><img src="<?php echo $Foto?>" alt="<?php echo $data["Descripcion"]; ?>"></td>

				</tr>
			


			<?php
			}


		}
?>
</table>

<div id="Buttom">
	<ul>
	<li><a href="RENTAS.php"> Realizar una renta. </a></li>
	</ul>	
	</div>
</body>

