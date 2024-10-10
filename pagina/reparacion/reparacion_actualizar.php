


<?php session_start();
if(empty($_SESSION['id'])):
endif;
include('../../dist/includes/dbcon.php');

		$id_reparacion = $_POST['id_reparacion'];
	$placa = $_POST['placa'];
	$revision_componentes = $_POST['revision_componentes'];
	$fecha_estimada = $_POST['fecha_estimada'];
	$hora_reparacion = $_POST['hora_reparacion'];
		$costo_de_chequeo = $_POST['costo_de_chequeo'];

	mysqli_query($con,"update reparacion set costo_de_chequeo='$costo_de_chequeo',hora_reparacion='$hora_reparacion',fecha_estimada='$fecha_estimada',revision_componentes='$revision_componentes',placa='$placa' where id_reparacion='$id_reparacion'")or die(mysqli_error($con));


echo "<script>document.location='../reparacion/reparacion.php'</script>";	

?>
