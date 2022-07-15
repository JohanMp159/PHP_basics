<?php
	foreach($_FILES["archivo_fls"] as $clave => $valor){
		echo "Propiedad: $clave --- valor: $valor <br/>";
	}

$archivo = $_FILES["archivo_fls"]["tmp_name"];
$destino = "archivos/".$_FILES["archivo_fls"]["name"];

if($_FILES["archivo_fls"]["type"] == "image/jpeg"){
	move_uploaded_file($archivo,$destino);
	echo "Archivo subido :)";
}else{
	echo "Solo ser permiten archivos de extension jpeg <br/>
		<a href='enviar-archivo.php'> Regresar </a>";
}

//permite subir ficheros al servidor

?>