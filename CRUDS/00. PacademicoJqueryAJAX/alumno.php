<?php
	include('conexion.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Actualización de Alumnos</title>
	<link rel="stylesheet" type="text/css" href="Css/Css.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<form>
		<table>
			<tr>
				<td>Identificacion</td>
				<td>
					<input type="text" name="txtident" id="txtident">
				</td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td>
					<input type="text" name="txtapellidos" id="txtapellidos">
				</td>
			</tr>
			<tr>
				<td>Nombres</td>
				<td>
					<input type="text" name="txtnombres" id="txtnombres">
				</td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td>
					<input type="password" name="txtclave" id="txtclave">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="button" name="btnagregar" id="btnagregar" value="Agregar">
					<input type="button" name="btnlistar" id="btnlistar" value="Listar">
					<input type="button" name="btnbuscar" id="btnbuscar" value="Buscar">
					<input type="button" name="btnactualizar" id="btnactualizar" value="Actualizar">
					<input type="button" name="btneliminar" id="btneliminar" value="Eliminar">
				</td>
			</tr>
		</table>
	</form>
	<div id="mensaje" style="background: yellow; color: gray">
	</div>
	<div id="mostraralumnos">
		
	</div>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#btnagregar").click(function()
				{
						//validar que los datos esten llenos
						// si $(txtident) esta vacio .val()=="" O || $(txtapellidos)
						if ($("#txtident").val()=="" || $("#txtapellidos").val()=="" || $("#txtnombres").val()=="" || $("#txtclave").val()=="")
					{
						alert('Debe de llenar todos los datos...');
					}
					else
					{	
						//estamos definicendo una variable que le voy a llevar lo que vamos a recibir como parametros
						$ident=$("#txtident").val();
						$apellidos=$("#txtapellidos").val();
						$nombres=$("#txtnombres").val();
						$clave=$("#txtclave").val();
						$.ajax({
							type:"POST",
							//Archivo php que vamos a llamar
							url:"agregar_usuario.php",
							//son los parametros que enviar por metodo data
							data:{
								ident:$ident,
								apellidos:$apellidos,
								nombres:$nombres,
								clave:$clave,
								adicionar:1
							},
							success:function(){
								/*alert('El alumno se guardo correctamente.');*/
								$('#mensaje').text('El alumno se guardo correctamente..')
							}

						});
					}
				});
			//LIstar
			$('#btnlistar').click(function(){
				$.ajax({
					type:"POST",
					url:"mostraralumnos.php",
					success:function(resp){
						$('#mensaje').text('');
						$('#mostraralumnos').html(resp);
					}
				});
			});
			//Buscar
			$('#btnbuscar').click(function(){
				$ident=$('#txtident').val();
				$.ajax({
					type:"POST",
					url:'buscarAlumno.php',
					data:{
							ident:$ident
						 },
						 success:function(datos){
						 	//Tomar los datos devuetlos por buscaralumno.php
						 	if(datos!='')
						 	{
						 		var arrayDatos = datos.split(",")
						 		$('#txtapellidos').val(arrayDatos[0]);
						 		$('#txtnombres').val(arrayDatos[1]);
						 		$('#txtclave').val(arrayDatos[2]);
						 	}
						 	else
						 	{
						 		$('#mensaje').text("El Usuario no existe...");
						 		$('#mensaje').val("");
						 		$('#mensaje').val("");
						 		$('#mensaje').val("");
						 	}
						 }
				})
			});
		//Eliminar
		$('#btneliminar').click(function(){
			if(confirm("esta seguro de Eliminar el alumno"))
			{
				$ident=$('#txtident').val();
				$.ajax({
					type:"POST",
					url:"eliminarAlumno.php",
					data:{
						ident:$ident
					},
					success:function(resp){
						$('#mostraralumnos').text("");
						if(resp!=null)
						{
							$('#mensaje').text("El alumno se elimino correctamente...")
						} else 
						{
							$('#mensaje').text("El alumno no existe")
						}
					}
				});
			}
		});
			//Actualizar
			$('#btnactualizar').click(function(){
				$ident=$("#txtident").val();
				$apellidos=$("#txtapellidos").val();
				$nombres=$("#txtnombres").val();
				$clave=$("#txtclave").val();
				$.ajax({
					type:"POST",
					url:"actualizarAlumno.php",
					data:{
						ident:$ident,
						apellidos:$apellidos,
						nombres:$nombres,
						clave:$clave
					},
						success:function(resp){
							if(resp!="")
							{
								$("#mostraralumnos").text("");
								$("#mensaje").text("Los datos se han actualizado!..");
							}
						
					}
				});
			});
		});
	</script>
</body>
</html>