<?php
	include ('conexion.php');
	$listado = mysqli_query($conx, "SELECT * FROM alumno");
	if (mysqli_num_rows($listado)>0)
	{
		echo "<table border='1'> <th>Identificación</th> <th>Apellidos</th> <th>Nombres</th> <th>Clave</th>";
		/*CUANdO REALIZAMOS UNA CONSULTA POR SELECT * FROM ESTÉ CONSULTA LOS DATOS PERO NO ESTAN SIENDO GUARDADOS EN UNA "VARIABLE".
	la guardamos en una variable llamada listado de campo array mysqli_fetch_array($listado)
		*/
		while($registro=mysqli_fetch_array($listado, MYSQLI_ASSOC))
		{
			echo "<tr>";
				echo "<td>".$registro['ident']."</td>";
				echo "<td>".$registro['apellidos']."</td>";
				echo "<td>".$registro['nombres']."</td>";
				echo "<td>".$registro['clave']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else {
			echo "<p><b>No hay alumnos registrados..</b></p>";
		}
		
	
?>