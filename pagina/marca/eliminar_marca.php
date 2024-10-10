<?php session_start();
if(empty($_SESSION['id'])):
  header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');

// Verificar si el usuario es administrador
if ($_SESSION['rol'] == 'administrador') {
  // Obtener el ID de la marca de la solicitud
  if(isset($_REQUEST['id_marca'])) {
    $id_marca = $_REQUEST['id_marca'];
  } else {
    $id_marca = $_POST['id_marca'];
  }

  // Eliminar la marca de la base de datos
  $query = mysqli_query($con, "DELETE FROM marca WHERE id_marca = '$id_marca'") or die(mysqli_error($con));
  echo "<script>alert('Marca eliminada exitosamente.'); document.location='../marca/marca.php'</script>"; 
} else {
  // Si el usuario no es administrador, redirigir y mostrar un mensaje
  echo "<script>alert('No tienes permiso para realizar esta acción.'); document.location='../marca/marca.php'</script>"; 
}