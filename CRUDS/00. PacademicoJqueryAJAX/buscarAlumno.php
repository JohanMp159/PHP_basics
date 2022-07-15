<?php
	include ('conexion.php');
	$encontro = false;
	if (isset($_POST['ident']))
	{
		$rapellidos="";
		$rnombres= "";
		$rclave= "";

		$ident = $_POST['ident'];
		$consulta = mysqli_query($conx, "SELECT * FROM alumno WHERE ident = '$ident'");
		if(mysqli_num_rows($consulta)>0)
		{
			$encontro=true;
			while($reg = mysqli_fetch_array($consulta, MYSQLI_ASSOC))
			{
				$rapellidos = $reg["apellidos"];
				$rnombres = $reg["nombres"];
				$rclave = $reg["clave"];
			}
		}
	}
	if($encontro)
	{
		echo $rapellidos.",".$rnombres.",". $rclave;
	} else 
	{

		echo "";
	}
?>



