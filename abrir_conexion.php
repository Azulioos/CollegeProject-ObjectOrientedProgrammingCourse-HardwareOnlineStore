<?php

$host = 'localhost';
$user ='root';
$password = '';
$db = 'registrar';


$conection = @mysqli_connect($host, $user, $password, $db );

if (!$conection) {
	echo "Nuestro sitio experimenta fallos...";
}

?>
