<?php

$host = "localhost";
$basededatos = "Registrarse";
$usuariodb = "Luis";
$clavedb = "12345";

$tabla_db1 = "datos_de_usuario";

error_reporting(0);

$conexion = new mysqli( $host,$usuariodb, $clavedb, $basededatos );

if ($conexion->connect_errno) {
	echo "Nuestro sitio experimenta fallos...";
	exit();
}

?>
