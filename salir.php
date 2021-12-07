<?php

	session_start();
	session_destroy();

	header('location: INICIO_SESION_USUARIO.php');
?>