<?php
session_start();
?>
<html>
<head>
<title>Cerrar sesi�n</title>
</head>
<body>
<?php
session_destroy();
$url="ingreso_usuario.html";
echo "<script type='text/javascript'>
              alert('La sesi�n ha finalizado');
              window.location='$url';
          </script>";
?>
</body>
</html>
