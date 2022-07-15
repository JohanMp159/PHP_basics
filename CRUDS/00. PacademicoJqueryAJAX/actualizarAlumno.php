<?php 
require('conexion.php');
$sw=false;
if(isset($_POST['ident']))
{
	$ident=$_POST['ident'];
	$apellidos=$_POST['apellidos'];
	$nombres=$_POST['nombres'];
	$clave=$_POST['clave'];
	$consulta = mysqli_query($conx, "UPDATE alumno SET APELLIDOS='$apellidos',NOMBRES='$nombres',CLAVE='$clave' WHERE IDENT='$ident'");
	$sw=true;
}
if($sw)
{
	echo "ok";
}
else
{
	echo "";
}

?>