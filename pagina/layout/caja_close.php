<?php
session_start();
//include('../dbcon.php');
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'






     $fecha_cierre = date('Y-m-d');
     $billetes2000 = $_POST['billetes2000'];
     $billetes1000 = $_POST['billetes1000'];
     $billetes500 = $_POST['billetes500'];
     $billetes200 = $_POST['billetes200'];
     $billetes100 = $_POST['billetes100'];
     $billetes50 = $_POST['billetes50'];
     $monedas25 = $_POST['monedas25'];
     $monedas10 = $_POST['monedas10'];
     $monedas5 = $_POST['monedas5'];
     $monedas1 = $_POST['monedas1'];


     mysqli_query($con,"update caja set estado='cerrado',fecha_cierre='$fecha_cierre', billetes2000= '$billetes2000', billetes1000= '$billetes1000', billetes500= '$billetes500', billetes200= '$billetes200', billetes100= '$billetes100', billetes50= '$billetes50', monedas25= '$monedas25', monedas10= '$monedas10', monedas5= '$monedas5', monedas1= '$monedas1' where estado='abierto'")or die(mysqli_error($con));



	echo "<script>document.location='caja.php'</script>";	










	

