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
			Mostrar registros
		</title>
</head>
	</head>
	<body>
		<header>
			<h2 align=center> <!--alineaci贸n centrada OJO -->
				Mostrar registros de la BD 
			</h2>
		</header>
		<table align=center> <!--alineaci贸n centrada OJO -->
			<tr>
				<th>id_empleados</th>
				<th>nombre</th>
				<th>puesto</th>
				<th>area</th>
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
				</tr>';
			}
			 ?>
		</table>
		<div align="center">
			<a href="index.html" target="_parent"><button>Volver al Inicio</button></a>
		</div>
	</body>
</html> 
