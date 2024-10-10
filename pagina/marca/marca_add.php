<?php
session_start();
//include('../dbcon.php');
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
	$nombre_marca = $_POST['nombre_marca'];



	
			mysqli_query($con,"INSERT INTO marca(nombre_marca,estado)
				VALUES('$nombre_marca','a')")or die(mysqli_error($con));

			
		echo "<script>document.location='../marca/marca.php'</script>";	


















?>
