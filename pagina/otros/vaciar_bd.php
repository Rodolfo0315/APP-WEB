<?php 
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Solicitar la contraseña al usuario
    $password = $_POST['password'];

    // Verificar la contraseña
    if ($password == 'tu_contraseña_secreta') {
        // Si la contraseña es correcta, vaciar la base de datos
        mysqli_query($con,"delete from detalles_pedido ")or die(mysqli_error($con));
        mysqli_query($con,"delete from marca ")or die(mysqli_error($con));
    mysqli_query($con,"delete from modelo ")or die(mysqli_error($con));
    mysqli_query($con,"delete from producto ")or die(mysqli_error($con));
    mysqli_query($con,"delete from producto ")or die(mysqli_error($con));
    mysqli_query($con,"delete from caja ")or die(mysqli_error($con));
    mysqli_query($con,"delete from clientes ")or die(mysqli_error($con));

        echo "<script>document.location='../layout/inicio.php'</script>";  
        exit;
    } else {
        // Si la contraseña es incorrecta, mostrar un mensaje de error
        echo "Contraseña incorrecta. No se ha vaciado la base de datos.";
    }
}
?>

<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  table {
    width: 100%;
    max-width: 500px; /* Ajusta este valor según tus necesidades */
    border-collapse: collapse;
  }
  td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    background-color: #f2f2f2;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
  input[type="submit"]:hover {
    opacity: 0.8;
  }
</style>

<table>
  <tr>
    <td>
      <form method="post">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
        <div><label for="password">Introduce la contraseña para vaciar la base de datos:</label></div>
        <div><input type="password" id="password" name="password"></div>
        <div><input type="submit" value="Vaciar la base de datos"></div>
      </form>
    </td>
  </tr>
</table>
