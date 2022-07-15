<!DOCTYPE html>
<html>
<head>
	<title>Label CRUD PHP (IN_CASA)</title>
	<meta charset="utf-8">
</head>
<body>

<?php

include("conexion.php");

$numAlb ="";
$nombLanz="";
$art ="";
$compDisc="";
$fecRel ="";
$valAlb="";

if(isset($_POST['boton']))
{
	$boton = $_POST['boton'];
	$busnroAlbum = $_POST['txtbusnumAlb'];

	if($boton=="Buscar")
	{	
		$consulta=$conexion->query("SELECT * FROM tblcompdisc WHERE NumAlbum='$busnroAlbum'");
		$filas=mysqli_num_rows($consulta);
		if($filas==0)
		{
			echo "No existe el número de albúm!..";
		}
		else
		{
			while($result=$consulta->fetch_array())
			{
				$numAlb =$result[0];
				$nombLanz=$result[1];
				$art =$result[2];
				$compDisc=$result[3];
				$fecRel =$result[4];
				$valAlb=$result[5];
			}
		}
	}

	if($boton=="Agregar")
	{
		$numAlb=$_POST["txtnumAlb"];
		$nombLanz=$_POST["txtnombLanz"];
		$art=$_POST["txtart"];
		$compDisc=$_POST["txtcompDisc"];
		$fecRel=$_POST["txtfecRel"];
		$valAlb=$_POST["txtvalAlb"];

		if($numAlb==""||$nombLanz==''||$art==""||$compDisc==""||$fecRel=="00/00/0000"||$valAlb=="")
		{
			echo "<script> alert('Debe completar todos los campos!..')</script>";
		}
		else
		{	
			$validacion = "SELECT NumAlbum FROM tblcompdisc WHERE NumAlbum='$numAlb' ORDER BY NumAlbum";
			if($result=mysqli_query($conexion,$validacion))
			{
				$nroregistros=mysqli_num_rows($result);
				if($nroregistros>0)
				{
					echo "<script> alert('El número de albúm ya existe!..') </script>";
				}
				else
				{
					$insertar = $conexion->query("insert into tblcompdisc(NumAlbum, NombLanzamiento, Artista, CompDiscografica, FechaIngreso, ValorAlbum)values('$numAlb','$nombLanz','$art','$compDisc','$fecRel','$valAlb')");
					if(!$insertar)
					{
						echo $conexion->error;
					}
					else
					{
						echo "<script>alert('Datos insertados correctamente!..') </script>";
					}
				}
			}
		}
	}


	if($boton=="Actualizar")
	{
		$numAlb=$_POST["txtnumAlb"];
		$nombLanz=$_POST["txtnombLanz"];
		$art=$_POST["txtart"];
		$compDisc=$_POST["txtcompDisc"];
		$fecRel=$_POST["txtfecRel"];
		$valAlb=$_POST["txtvalAlb"];
		if($numAlb=="")
		{
			echo "Ingrese un número de albúm y busque!..";
		}
		else
		{	

			$actualizar = $conexion->query("update tblcompdisc set NumAlbum='$numAlb',NombLanzamiento='$nombLanz',Artista='$art',CompDiscografica='$compDisc',FechaIngreso='$fecRel',ValorAlbum='$valAlb'");
			if(!$actualizar)
			{
				echo $conexion->error;
			}
			else
			{
				echo "<script>alert('Datos actualizados correctamente!..') </script>";
			}
		}
	}


	if($boton=="Eliminar")
	{
		$numAlb = $_POST['txtnumAlb'];
		if($numAlb=="")
		{
			echo "Ingrese un numero de albúm y busque!..";
		}
		else
		{
			$eliminar = $conexion->query("delete from tblcompdisc where NumAlbum='$numAlb'");		
			if(!$eliminar)
			{
				echo $conexion->error;
			}
			else
			{
				echo "<script>alert('Datos eliminados correctamente!..') </script>";
			}	
		}
			
	}

}


?>	

	<form method="POST" action="">
		<table id="Search">
			<tr>
				<td>Buscar</td>
				<td>
					<input type="text" name="txtbusnumAlb"/>
					<input type="submit" name="boton" value="Buscar">
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>Número de albúm</td>
				<td><input type="text" name="txtnumAlb" value="<?php echo $numAlb?>"></td>
			</tr>
			<tr>
				<td>Nombre lanzamiento</td>
				<td><input type="text" name="txtnombLanz" value="<?php echo $nombLanz?>"></td>
			</tr>
			<tr>
				<td>Artista</td>
				<td><input type="text" name="txtart" value="<?php echo $art?>"></td>
			</tr>
			<tr>
				<td>Compañia discográfica</td>
				<td><input type="text" name="txtcompDisc" value="<?php echo $compDisc?>"></td>
			</tr>
			<tr>
				<td>Fecha release</td>
				<td><input type="date" name="txtfecRel" value="<?php echo $fecRel?>"></td>
			</tr>
			<tr>
				<td>Valor albúm</td>
				<td><input type="text" name="txtvalAlb" value="<?php echo $valAlb?>"></td>
			</tr>
			<tr >
				<td colspan="2">
					<input type="submit" name="boton" value="Agregar">
					<input type="submit" name="boton" value="Actualizar">
					<input type="submit" name="boton" value="Listar" >
					<input type="submit" name="boton" value="Eliminar">
				</td>
			</tr>
		</table>
	</form>

	
	

<?php

if(isset($_POST['boton']))
{
	$boton = $_POST['boton'];
	if($boton=="Listar")
	{
		echo "<table border='3'>
		<tr>
			<td>Num. Album</td>
			<td>Nombre Lanzamiento</td>
			<td>Artista</td>
			<td>Compañia Discografica</td>
			<td>Fecha Release</td>
			<td>Valor albúm</td>
		</tr>";
		$listado = $conexion->query("SELECT * FROM tblcompdisc");
		while($result=$listado->fetch_array())
		{
			$numAlb=$result[0];
			$nombLanz=$result[1];
			$art=$result[2];
			$compDisc=$result[3];
			$fecRel=$result[4];
			$valAlb=$result[5];
			echo "<tr>
			<td>$numAlb</td>
			<td>$nombLanz</td>
			<td>$art</td>
			<td>$compDisc</td>
			<td>$fecRel</td>
			<td>$valAlb</td>";
		}
		echo "</table>";
	}
}

?>



</body>
</html>