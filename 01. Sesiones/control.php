<?php
if($_POST["usuario_txt"] == "bextlan" && $_POST["password_txt"]=="123456"){
	//inicio la sesion
	session_start();
	
	//Declarar variables de sesión
	$_SESSION["autentificado"] = true;
	$_SESSION["usuario"] = $_POST["usuario_txt"];
	
	header("Location: archivo-protegido.php");
}else{
	header("Location: index.php?error=si");
}
?>