<?php 
	
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="SELECT id_usuario,
					nombre,
					apellido,
					email
			from usuarios";
	$result=mysqli_query($conexion,$sql);

 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><center><h1 style="color:black"><b>Usuarios Existentes</b></label></caption>
	<tr>
	
		<td style="color:blue"><b>Nombre</td>
		<td style="color:blue"><b>Apellido</td>
		<td style="color:blue"><b>Usuario</td>
		<td style="color:blue"><b>Editar</td>
		<td style="color:blue"><b>Eliminar</td>
	</b>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td>
			<span data-toggle="modal" data-target="#actualizaUsuarioModal" class="btn btn-warning btn-xs" onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarUsuario('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>