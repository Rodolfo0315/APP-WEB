<?php 
include('dbcon.php');
@session_start();

// Verificar si la variable de sesión SESS_MEMBER_ID está presente o no
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
  <script>
    window.location = "index.php";
  </script>
<?php 
}
$session_id = $_SESSION['id'];

$user_query = mysqli_query($con, "SELECT * FROM usuario WHERE id = $session_id") or die(mysqli_error($con));
$user_row = mysqli_fetch_array($user_query);
$user_username = $user_row['usuario'];
$nombre = $user_row['usuario'];
$imagen = $user_row['imagen'];
$tipo = $user_row['tipo'];

// Aquí asignamos el rol del usuario a la variable de sesión $_SESSION['rol']
$_SESSION['rol'] = $tipo;

$empresa_query = mysqli_query($con, "SELECT * FROM empresa WHERE id_empresa = 1") or die(mysqli_error($con));
$empresa_row = mysqli_fetch_array($empresa_query);
$imagen_empresa = $empresa_row['imagen'];
$empresa = $empresa_row['empresa'];

$id = $_SESSION['id'];
?>
