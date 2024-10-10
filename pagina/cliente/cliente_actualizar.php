


<?php session_start();
if(empty($_SESSION['id'])):
endif;
include('../../dist/includes/dbcon.php');

		$id_cliente = $_POST['id_cliente'];
	$nombre = $_POST['nombre'];
	$documento = $_POST['documento'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];

	mysqli_query($con,"update clientes set nombre='$nombre',documento='$documento',telefono='$telefono',correo='$correo' where id_cliente='$id_cliente'")or die(mysqli_error($con));


echo "<script>document.location='../cliente/cliente.php'</script>";	

?>
