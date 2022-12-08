<?php 

	session_start();
	//print_r($_SESSION['tablaComprasTemp']);
 ?>

 <h4 style="color:black"><b>Hacer venta</b></h4>
 <h4 style="color:black" ><strong><div id="nombreclienteVenta"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center" border="0px" ;>
 	<caption>
 		<span class="btn btn-success" onclick="crearVenta()"> Generar venta
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
 		<td style="color:blue"><b>Nombre</td>
 		<td style="color:blue"><b>Descripcion</td>
 		<td style="color:blue"><b>Precio</td>
 		<td style="color:blue"><b>Cantidad</td>
 		<td style="color:blue"><b>Quitar</td>
 	</tr>
 	<?php 
 	$total=0;//Total de la compra
 	$cliente=""; //Nombre del cliente
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo $d[3] ?></td>
 		<td><?php echo 1; ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[3];
 		$i++;
 		$cliente=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td>Total de venta: <?php echo "$".$total; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>