<?php
session_start();
//include('../dbcon.php');
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];


	$id_marca = $_POST['id_marca'];
	$nombre_modelo = $_POST['nombre_modelo'];



	
			mysqli_query($con,"INSERT INTO modelo(nombre_modelo,id_marca,estado)
				VALUES('$nombre_modelo','$id_marca','a')")or die(mysqli_error($con));

			
		echo "<script>document.location='../modelo/modelo.php'</script>";	


















?>
