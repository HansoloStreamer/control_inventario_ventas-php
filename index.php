<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	
</head>
<body>
	<div class="container">
		
						
					<!-- LOGIN -->
					<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" id="frmLogin">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="usuario" id="usuario" placeholder="Usuario">
				</div>

				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="password" id="password" placeholder="Contraseña">
				</div>
				<button class="button login__submit ">
				<span class="button__text" id="entrarSistema">Login</span>
				<button class="button login__submit">
							<?php  if(!$validar): ?>
							
							<a href="registro.php" class="button__text">Registrar</a>
			
							<?php endif; ?>
			</form>
		</div>			
		
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

					<!-- FIN LOGIN -->
			
	</div>
</body>


</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("Usuario o contraseña incorrectos");
				}
			}
		});
	});
	});
</script>