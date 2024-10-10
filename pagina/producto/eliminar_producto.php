<?php 
session_start();
if(empty($_SESSION['id'])):
  header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');

// Verificar si el usuario es administrador
if ($_SESSION['rol'] == 'administrador') {
  // Obtener el ID del producto de la solicitud
  if(isset($_REQUEST['id_pro'])) {
    $id_pro = $_REQUEST['id_pro'];
  } else {
    $id_pro = $_POST['id_pro'];
  }

  // Eliminar el producto de la base de datos
  $query = mysqli_query($con, "DELETE FROM producto WHERE id_pro = '$id_pro'") or die(mysqli_error($con));
  echo "<script>alert('Producto eliminado exitosamente.'); document.location='../producto/producto.php'</script>"; 
} else {
  // Si el usuario no es administrador, redirigir y mostrar un mensaje
  echo "<script>alert('No tienes permiso para realizar esta acción.'); document.location='../producto/producto.php'</script>"; 
}
