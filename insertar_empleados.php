<?php
	//////////////// CONEXION A LA BD ////////////////////
require "conexion.php";
	/////////////// CONSULTA A LA BD ///////////////////
$empleados="SELECT * FROM empleados order by ID_Empleados";
$resEmpleados=$conexion->query($empleados);
?>
<html lang="es">
	<head>
		<title>
			Insertar registros 
		</title>
		<meta charset="utf-8"/><!-- OJO acentos-->	
	</head>
	<body>
		<header>
			<h2 align=center> <!--alineación centrada OJO -->
				Insertar registros de la BD 
			</h2>
		</header>
		<table align=center> <!--alineación centrada OJO -->
			<tr>
				<th>Id_empleados</th>
				<th>Nombre</th>
				<th>Puesto</th>
				<th>Area</th>
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
		<!-- OJO aquí empieza el formulario para la inserción -->
		<form method="post">
			<h3 align = center> Agregar Nuevo Empleado </h3>
			<table align = center>
				<tr>
					<td><input required name="idempleado" placeholder="ID Empleado"/input></td>
					<td><input required name="nombre" placeholder="Nombre"/input></td>
					<td><input required name="puesto" placeholder="Puesto"/input></td>
					<td><input required name="area" placeholder="Area"/input></td>
				</tr>
			</table>
			<div align = center>
					<input type="submit" name="insertar" value="Insertar Empleado"/>
			</div>
		</form>
		<!-- Acciones del botón INSERTAR -->
		<?php 
			////////////// PRESIONAR EL BOTÓN /////////////////
			if(isset($_POST['insertar']))
			{
				$id = $_POST['idempleado'];
				$nom = $_POST['nombre'];
				$pues = $_POST['puesto'];
				$ar = $_POST['area'];
				mysqli_query($conexion,"insert into empleados (ID_Empleados, Nombre, Puesto, Area) 
					values ('$id', '$nom', '$pues', '$ar')") or die (mysqli_error($conexion)); ///OJO////
				header ("location:insertar_empleados.php");// para que actualice la página
			}
		?>
		<div align="center">
			<a href="index.html" target="_parent"><button>Volver al Inicio</button></a>
		</div>
	</body>
</html>
