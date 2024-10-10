
<?php 
include '../layout/header.php'; 


// Verificar si el usuario ha iniciado sesión y si es administrador
if(empty($_SESSION['id']) || $_SESSION['rol'] != 'administrador') {
  // Si el usuario no ha iniciado sesión o no es administrador, mostrar mensaje y redirigir
  echo "<script type='text/javascript'>alert('Usuario no tiene permiso.'); window.location = 'marca.php';</script>";
  exit();
}

include('../../dist/includes/dbcon.php');

// Obtener el ID de la marca desde GET o POST
if(isset($_REQUEST['id_marca'])) {
  $id_marca = $_REQUEST['id_marca'];
} else {
  $id_marca = $_POST['id_marca'];
}

// Consulta para obtener los detalles de la marca
$query = mysqli_query($con, "SELECT * FROM marca WHERE id_marca = '$id_marca'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
?>
<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<!-- Aquí comienza el HTML para la página de edición de marca -->
<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <?php include '../layout/main_sidebar.php'; ?>
    <?php include '../layout/top_nav.php'; ?> 

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="box-header" style="text-align: center;">
        <h3 class="box-title" style="font-weight: bold;">MODIFICAR MARCA</h3>
      </div><!-- /.box-header -->
      <a class="btn btn-warning btn-print" href="marca.php" style="height:25%; width:15%; font-size: 12px " role="button">REGRESAR</a>

      <div class="box-body">
        <form class="form-horizontal" method="post" action="marca_actualizar.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" id="id_marca" name="id_marca" value="<?php echo $id_marca;?>" required>
          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date">NOMBRE DE LA MARCA</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" value="<?php echo $row['nombre_marca'];?>" required>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">MODIFICAR</button>
        </form>
      </div><!-- /.box-body -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.box-body -->
</div><!-- /.container body -->
<footer>
  <div class="pull-right">
    TODOCARS AUTOPARTS
  </div>
  <div class="clearfix"></div>
</footer>
<?php include '../layout/datatable_script.php'; ?>

<script>
  $(document).ready( function() {
    $('#example2').dataTable( {
      "language": {
        "paginate": {
          "previous": "anterior",
          "next": "posterior"
        },
        "search": "Buscar:",
      },
      "info": false,
      "lengthChange": false,
      "searching": false,
      "searching": true,
    });
  });
</script>

</body>
</html>

