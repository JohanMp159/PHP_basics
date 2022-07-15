<?php

$servidor='';
$basedatos='companiadiscografica';
$usuario='root';
$password='';

$conexion=mysqli_connect($servidor,$usuario,$password,$basedatos);

if(!$conexion){
	die('Error de conexion'.mysql_error());
}

?>