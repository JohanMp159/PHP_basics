<?php

	$conx = mysqli_connect('localhost','root','','sistacademico');
	if(!$conx){
		die('Error de conexion' .mysqli_connect_error());
	}

?>