<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<!-- REGISTER -->
		<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" id="frmRegistro">
				<div class="login__field">
					
					<input type="text" class="login__input" name="nombre" id="nombre" placeholder="Nombre">
				</div>
				<div class="login__field">
					
					<input type="text" class="login__input" name="apellido" id="apellido" placeholder="Apellido">
				</div>

				<div class="login__field">
					
					<input type="text" class="login__input" name="usuario" id="usuario" placeholder="Usuario">
				</div>

				<div class="login__field">
					<input type="password" class="login__input" name="password" id="password" placeholder="Contraseña">
				</div>

				<button class="button login__submit">
				<span   class="button__text" id="registro">Registrar</span>
				<i class="button__icon fas fa-chevron-right"></i>
				
				<a href="index.php" class="btn btn-dark">Regresar login</a>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
		<!-- FIN REGISTER -->
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>

