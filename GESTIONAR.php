<?php 
include "abrir_conexion.php";

$alert='';
session_start();
if(empty($_SESSION['active'])){
	header('location: INICIO_SESION.php');
}

$Estado = 2;
$Facturacion = $_GET['id'];

$query_insert = mysqli_query($conection,"UPDATE rentas SET Estado = $Estado WHERE ID_Factura = $Facturacion");

if($query_insert){
	    	
$alert='<p>Renta realizada correctamente.</p>';

		header('location: ACEPTAR_RENTAS.php');

	    }
	    else{
	    	$alert='<p>Saturacion del sistema.</p>';
	    }

?>