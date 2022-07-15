<?php

//Primer valor es el nombre de la Cookie
//Segundo parametro es su Valor
//Tercer parametro es el tiempo
//Cuarto parametro es hasta donde va convivir
//Para que la cookie funcione se tiene que especificar la ruta del directorio en el cuarto paramtro con "/", se entiende que la cookie existirá en todo el directorito del sitio
//Quinto parametro seria el dominio en el que queramos que exista
setcookie("idioma_solicitado",$_GET["idioma"],time()+86400,"/");
header("Location: usar-cookie.php");

?>