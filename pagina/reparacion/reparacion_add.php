<?php 
session_start();
include('../../dist/includes/dbcon.php');
$id_usuario = $_SESSION['id'];

// Verificar si el usuario es administrador antes de permitir cambios
$permiso_query = mysqli_query($con, "SELECT tipo FROM usuario WHERE id = '$id_usuario'");
$permiso_row = mysqli_fetch_array($permiso_query);


$id_marca = $_POST['id_marca'];
$id_modelo = $_POST['id_modelo'];
$placa = $_POST['placa'];
$diagnóstico_automotriz = $_POST['diagnóstico_automotriz'];
$revision_componentes = $_POST['revision_componentes'];
$fecha_estimada = $_POST['fecha_estimada'];
$hora_reparacion = $_POST['hora_reparacion'];
$cliente = $_POST['cliente'];
$costo_de_chequeo = $_POST['costo_de_chequeo'];
$tipo_comprobante = $_POST['tipo_comprobante'];
$fecha_registro = date('Y-m-d');
$estado_reparacion = "transito";

// Insertar la reparación en la base de datos
mysqli_query($con, "INSERT INTO reparacion(id_marca, id_modelo, id_usuario, placa, diagnóstico_automotriz, revision_componentes, fecha_estimada, hora_reparacion, cliente, fecha_registro, costo_de_chequeo, tipo_comprobante, estado_reparacion)
VALUES('$id_marca', '$id_modelo', '$id_usuario', '$placa', '$diagnóstico_automotriz', '$revision_componentes', '$fecha_estimada', '$hora_reparacion', '$cliente', '$fecha_registro', '$costo_de_chequeo', '$tipo_comprobante', '$estado_reparacion')") or die(mysqli_error($con));

echo "<script>document.location='../reparacion/reparacion.php'</script>";
?>



