<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<link rel="stylesheet" type="text/css" href="../css/interfaz.css">


	<?php require_once "menu.php"; ?>
</head>
<body>

<?php require_once "animacion.php"; ?>

</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>