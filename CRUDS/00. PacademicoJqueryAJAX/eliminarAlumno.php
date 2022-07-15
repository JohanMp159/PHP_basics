<?php
include ("conexion.php");
$encontro = false;
if (isset($_POST['ident']))
	{
		
		$ident = $_POST['ident'];
		$consulta = mysqli_query($conx, "DELETE FROM alumno WHERE ident = '$ident'");
		$encontro = true;
	}
if ($encontro)
	{
		echo "ok";
	}
	else
	{
		echo "";
	}

?>