<?php
session_start();
?>
<html>
<head>
<title>Iniciar sesi�n</title>
</head>
<body>
<?php
$_SESSION["usuario"] = $_GET["usr"];
$url="cliente.php";
print "<script type='text/javascript'>
             parent.location.href='$url';
           </script>"; 
?>
</body>
</html>
