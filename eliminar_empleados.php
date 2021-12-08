<?php
	//////////////// CONEXION A LA BD ////////////////////
require "conexion.php";
	/////////////// CONSULTA A LA BD ///////////////////
$empleados="SELECT * FROM empleados";
$resEmpleados=$conexion->query($empleados);
?>

<html lang="es">
	<head>
		<title>
			Eliminar registros
		</title>
</head>
	</head>
	<body>
		<header>
			<h2 align=center> <!--alineación centrada OJO -->
				Eliminar registros de la BD 
			</h2>
		</header>
		<form method="post"> <!--Agrupamos en un formulario -->	
		<table align=center> <!--alineación centrada OJO -->
			<tr>
				<th>ID_Empleados</th>
				<th>Nombre</th>
				<th>Puesto</th>
				<th>Area</th>
				<th>Seleccionar</th>
			</tr>
			<?php 
			///////////// MOSTRAR RESULTADOS DE LA CONSULTA /////////////
			while($registroEmpleados = $resEmpleados->fetch_array(MYSQLI_BOTH))
			{
				echo'<tr>
				<td>'.$registroEmpleados['ID_Empleados'].'</td>
				<td>'.$registroEmpleados['Nombre'].'</td>
				<td>'.$registroEmpleados['Puesto'].'</td>
				<td>'.$registroEmpleados['Area'].'</td>
				<td><input type="checkbox" name="eliminar[]" value="'.$registroEmpleados['ID_Empleados'].'"/></td>
				</tr>';
			}
			?>
		</table>
		<div align = "center">
			<input type="submit" name="borrar" value="Eliminar registros" onclick="reload()"/>
			<button> Actualizar </button>
		</div>
		<?php 
			//// aquí vamos a programar el botón de eliminar /// 
			if(isset($_POST['borrar']))		
			{
				if(empty($_POST['eliminar']))
				{
					echo '<h2 align="center"> No se ha seleccionado ningún registro </h2>';
				}
				else
				{
					foreach ($_POST['eliminar'] as $id_borrar) 
					{
						$borrarAlumnos = $conexion->query("DELETE FROM empleados WHERE ID_Empleados='$id_borrar'");
					}
				}
			}
		?>
	</form>
	<div align="center">
			<a href="index.html" target="_parent"><button>Volver al Inicio</button></a>
		</div>
	</body>
</html> 
