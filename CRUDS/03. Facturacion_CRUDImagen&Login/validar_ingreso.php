<html>
<head>
<title>Validar ingreso</title>
</head>
<body>
<?php
 include("conexion.php");
 
 $usr=$_POST['txtusr'];
 $clave=$_POST['txtclave'];
 $sql=mysqli_query($MySQLiconexion,"select * from usuario where usr='$usr' and clave='$clave'");
 $nreg=mysqli_num_rows($sql);
   if ($nreg>0)
     {
       $mensaje="$usr ha iniciado sesión"; 
       $url="inicio_sesion.php?usr=$usr";
     }
   else
     {
       $mensaje="Usuario o contraseña incorrectos. Sesión no iniciada"; 
       $url="ingreso_usuario.html";
     }
      echo "<script type='text/javascript'>
              alert('$mensaje');
              window.location='$url';
           </script>";

mysqli_free_result($sql);
mysqli_close($link);
?> 

</body>
</html>
