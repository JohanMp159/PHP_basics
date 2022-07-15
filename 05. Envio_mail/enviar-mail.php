<?php

$de = $_POST["de_txt"];
$para = $_POST["para_txt"];
$asunto = $_POST["asunto_txt"];
$mensaje = $_POST["mensaje_txa"];

$cabecera = "MIME-Version: 1.0\r\n";
$cabecera.= "Content-type: text/html; charset-utf-8";
$cabecera.= "From: $de \r\n";

//Primer parametro para quien es el correo
//Segundo parametro sería el Asunto
//Tercer parametro sería Mensaje
//Cuarto Parametro son las Cabeceras
if(mail($para,$asunto,$mensaje,$cabecera)){
	$respuesta = "El mensaje ha sido enviado :)";
}else{
	$respuesta = "Ocurrio un error no se enviaron los datos";
}
header("Location: formulario-mail.php?respuesta=$respuesta");
?>