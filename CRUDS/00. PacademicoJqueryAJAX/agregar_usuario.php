<?php
	include ('conexion.php');
	if (isset($_POST['adicionar']))
	{
		/*
		$ident es la variable que me recibira ese parametro

		Desde el PARAMETROS de data voy a enviarr estos datos ['ident']*/
		$ident = $_POST['ident'];
		$apellidos = $_POST['apellidos'];
		$nombres = $_POST['nombres'];
		$clave = $_POST['clave'];

		mysqli_query($conx, "insert into alumno (ident,apellidos,nombres,clave) values ('$ident','$apellidos','$nombres','$clave')");
	}
?>