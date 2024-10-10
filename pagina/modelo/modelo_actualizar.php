


<?php session_start();
if(empty($_SESSION['id'])):
endif;
include('../../dist/includes/dbcon.php');

$id_modelo = $_POST['id_modelo'];
		$id_marca = $_POST['id_marca'];
	$nombre_modelo = $_POST['nombre_modelo'];


	mysqli_query($con,"update modelo set nombre_modelo='$nombre_modelo',id_marca='$id_marca' where id_modelo='$id_modelo'")or die(mysqli_error($con));


echo "<script>document.location='../modelo/modelo.php'</script>";	

?>
