<?php
session_start();
//include('../dbcon.php');
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
	$nombre = $_POST['nombre'];
	$documento = $_POST['documento'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];


	
			mysqli_query($con,"INSERT INTO clientes(nombre,documento,telefono,correo,estado)
				VALUES('$nombre','$documento','$telefono','$correo','a')")or die(mysqli_error($con));

			
		echo "<script>document.location='../cliente/cliente.php'</script>";	


















?>
