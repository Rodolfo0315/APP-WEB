<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
	$id_usuario = $_POST['id_usuario'];
	$fecha = $_POST['fecha'];

	$debe_haber = $_POST['debe_haber'];
	$descripcion = $_POST['descripcion'];
$monto = $_POST['monto'];



		$update=mysqli_query($con,"update usuario set caja=caja-'$monto' where id='$id_usuario' ");

		mysqli_query($con,"INSERT INTO libro(fecha,descripcion,monto,debe_haber,id_usuario)
				VALUES('$fecha','$descripcion','$monto','$debe_haber','$id_usuario')")or die(mysqli_error($con));

			

	echo "<script>document.location='../libro/libro.php'</script>";	

?>
