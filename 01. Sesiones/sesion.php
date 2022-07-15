<?php
//Evaluamos que la sesion continue verificando una e las variables creadas en control.php, cuando esta ya no coincida con su valor inicial se redirije al archivo de salir.php
session_start();

if(!$_SESSION["autentificado"]){
	header("Location: salir.php");
}

?>