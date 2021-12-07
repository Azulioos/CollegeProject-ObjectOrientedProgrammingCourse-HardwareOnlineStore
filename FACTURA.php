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
				<li><a href="Interfaz.php">Inicio</a></li>
				<li><a href="MI_CUENTA.php">Cuenta</a></li>
				<li><a href="MI_PEDIDO.php">Mi pedido</a></li>
				<li><a href="salir.php">Salir</a></li>
			</ul>
		</nav><!-- / nav -->

	</header>
	<table>
		<tr>
			<th></th>
			<th>Factura</th>
			<th></th>


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
		$query = mysqli_query($conection, 
			"SELECT r.ID_Factura, r.Usuario, r.Estado, r.Tiempo_De_Renta, r.Cantidad, r.Direccion, r.Precio_Total, (r.Producto) as Codigo_Producto , (p.Nombre_Producto)  as Nombre_Producto
			FROM rentas r  
			INNER JOIN producto p
			on r.Producto = p.Codigo_Producto
			ORDER BY ID_Factura");
		$Precios = 0;

		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while($data = mysqli_fetch_array($query)){
				if($data["Estado"] == 2){
				if($_SESSION['iduser'] == $data["Usuario"]){
				$Precio = $data["Precio_Total"] / ($data["Cantidad"] * $data["Tiempo_De_Renta"]);
?>
				<tr>
				<td><?php echo $data["Nombre_Producto"]?>(<?php echo $data["Cantidad"]?>)</td>
				<td>$<?php echo $data["Precio_Total"]?>.00 Mxn.</td>
				<td>Precio por unidad: <?php echo $Precio ?>.00 Mnx.</td>


				</tr>
			


			<?php
			$Precios = $Precios + $data["Precio_Total"];
			}
		}
	}


		}
?>
</table>

<div id="A">	
		<h3>Precio total : $<?php echo $Precios?> Mnx.</h3>
</div>

<div id="Buttom">
	<ul>
	<li><a href="MI_PEDIDO.php"> Regresar. </a></li>
	</ul>	
	</div>

	</body>
	</html>