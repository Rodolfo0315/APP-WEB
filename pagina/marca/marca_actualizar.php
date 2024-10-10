


<?php session_start();
if(empty($_SESSION['id'])):
endif;
include('../../dist/includes/dbcon.php');

		$id_marca = $_POST['id_marca'];
	$nombre_marca = $_POST['nombre_marca'];


	mysqli_query($con,"update marca set nombre_marca='$nombre_marca' where id_marca='$id_marca'")or die(mysqli_error($con));


echo "<script>document.location='../marca/marca.php'</script>";	

?>
