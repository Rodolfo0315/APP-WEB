 <?php
session_start();
include('../layout/dbcon.php');
	//$branch=$_SESSION['branch'];

	$id_pro = $_POST['id_pro'];
	$cantidad = $_POST['cantidad'];

		$id_reparacion = $_POST['id_reparacion'];





		///finzalizo encriptacion


	/*mysqli_query($con,"update ingreso set monto_pagado='$monto_pagado'  where idingreso='$idingreso'")or die(mysqli_error($con));
*/
			



					mysqli_query($con,"INSERT INTO detalles_pedido(id_reparacion,id_producto,cantidad)
				VALUES('$id_reparacion','$id_pro','$cantidad')")or die(mysqli_error($con));

					  $update=mysqli_query($con,"update producto set stock=stock-'$cantidad' where id_pro='$id_pro' ");



  echo "<script>document.location='../reparacion/reparacion.php'</script>";



	




   







?>
