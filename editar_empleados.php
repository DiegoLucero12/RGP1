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
			Editar registros
		</title>
</head>
	</head>
	<body>
		<header>
			<h2 align=center> <!--alineacion centrada OJO -->
				Editar registros de la BD 
			</h2>
		</header>
		<!-- Agrupamos en un formulario --> 
		<form method="post">
			<table align=center> <!--alineacion centrada OJO -->
				<tr>
					<th>ID_empleado</th>
					<th>Nombre</th>
					<th>Puesto</th>
					<th>Area</th>
				</tr>
				<?php 
				///////////// MOSTRAR RESULTADOS DE LA CONSULTA /////////////
				while($registroEmpleados = $resEmpleados->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
					<td><input name="idemp['.$registroEmpleados['id_empleado'].']" value="'.$registroEmpleados['ID_Empleados'].'"/></td>
					<td><input name="nom['.$registroEmpleados['id_empleado'].']" value="'.$registroEmpleados['Nombre'].'"/></td>
					<td><input name="pues['.$registroEmpleados['id_empleado'].']" value="'.$registroEmpleados['Puesto'].'"/></td>
					<td><input name="are['.$registroEmpleados['id_empleado'].']" value="'.$registroEmpleados['Area'].'"/></td>
					</tr>';
				}
				 ?>
			</table>
			<div align="center">
				<input type="submit" name="actualizar" value="Actualizar los registros"/>
			</div>
		</form>
		<?php
			if(isset($_POST['actualizar']))
			{
				foreach ($_POST['idemp'] as $ids)
				 {
					$editID=mysqli_real_escape_string($conexion,$_POST['idemp'][$ids]);
					$editNom=mysqli_real_escape_string($conexion,$_POST['nom'][$ids]);
					$editCarr=mysqli_real_escape_string($conexion,$_POST['pues'][$ids]);
					$editGru=mysqli_real_escape_string($conexion,$_POST['are'][$ids]);
					$actualizar=$conexion->query("UPDATE empleados SET id_empleados='$editID', nombre='$editNom', puest='$editPues', grupo='$editAre' WHERE id_empleados='$ids'");
				}
				header ("location:editar_empleados.php");// para que actualice la página
			}
		?>
		<div align="center">
			<a href="index.html" target="_parent"><button>Volver al Inicio</button></a>
		</div>
	</body>
</html> 
