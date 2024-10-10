<?php
session_start();
include('../../dist/includes/dbcon.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id_usuario = $_SESSION['id'];

// Verificar si el usuario tiene permisos para eliminar reparaciones
$permiso_query = mysqli_query($con, "SELECT tipo FROM usuario WHERE id = '$id_usuario'");
$permiso_row = mysqli_fetch_array($permiso_query);



// Obtener el ID de la reparación de la URL
$id_reparacion = intval($_GET['id_reparacion']);

// Proteger contra inyecciones SQL
$id_reparacion = mysqli_real_escape_string($con, $id_reparacion);

// Eliminar la reparación de la base de datos
mysqli_query($con, "DELETE FROM reparacion WHERE id_reparacion = '$id_reparacion'") or die(mysqli_error($con));

echo "<script>document.location='../reparacion/reparacion.php'</script>";
?>
