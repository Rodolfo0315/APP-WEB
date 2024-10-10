<?php 
include('../layout/header.php');
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

// Resto del código HTML y PHP para la estructura de la página
?>
<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
<?php
include('../../dist/includes/dbcon.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id_usuario = $_SESSION['id'];

// Verificar si el usuario tiene permisos para registrar
$permiso_query = mysqli_query($con, "SELECT tipo FROM usuario WHERE id = '$id_usuario'");
$permiso_row = mysqli_fetch_array($permiso_query);

$href = $permiso_row['tipo'] == 'administrador' ? "producto_agregar.php" : "#";
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php include '../layout/main_sidebar.php'; ?>

      <!-- top navigation -->
      <?php include '../layout/top_nav.php'; ?>
      <!-- /top navigation -->
      <style>
        label {
          color: black;
        }

        li {
          color: white;
        }

        ul {
          color: white;
        }

        #buscar {
          text-align: right;
        }
      </style>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x-panel">
            </div>
          </div><!--end of modal-dialog-->
        </div>

        <div class="panel-heading">
        </div>

        <div class="box-header">
          <h3 class="box-title"> </h3>
        </div><!-- /.box-header -->
        <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> IMPRECION</a>
        <a class='btn btn-warning btn-print' href="<?php echo $href; ?>" onclick="<?php echo $onclick; ?>" style='height:25%; width:15%; font-size: 12px ' role='button'>REGISTRAR</a>

        <div class="box-body">
        </div>

        <div class="box-header" style="text-align: center;">
          <h3 class="box-title" style="font-weight: bold;">LISTA PRODUCTOS</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr class=" btn-success">
                <th>#</th>
                <th>IMAGEN</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>UNIDAD</th>
                <th>PRECIO VENTA</th>
                <th>STOCK</th>
                <th class="btn-print"> ACCION </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($con, "select * from producto where estado='a' ") or die(mysqli_error($con));
              $i = 0;
              while ($row = mysqli_fetch_array($query)) {
                $id_pro = $row['id_pro'];
                $i++;
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><IMG src="subir_producto/<?php echo $row['imagen']; ?>" style="height:50PX" /></td>
                  <td><?php echo $row['nombre_pro']; ?></td>
                  <td><?php echo $row['descripcion']; ?></td>
                  <td><?php echo $row['unidad']; ?></td>
                  <td><?php echo $row['precio_venta']; ?></td>
                  <td><?php echo $row['stock']; ?></td>
                  <td>
                    <?php
                    if ($_SESSION['rol'] == 'administrador')  {
                     
                      // Si el usuario es administrador, mostrar enlaces para eliminar, editar y agregar stock
                      echo "<a class='small-box-footer btn-print' href='eliminar_producto.php?id_pro=$id_pro' onClick='return confirm(\"¿Está seguro de que quieres eliminar este producto?\");'><i class='glyphicon glyphicon-remove'></i></a>";
                      echo "<a class='btn btn-danger btn-print' href='editar_producto.php?id_pro=$id_pro' role='button'>EDITAR</a>";
                      echo "<a class='btn btn-primary btn-print' href='agregar_stock.php?id_pro=$id_pro' role='button'>STOCK</a>";
                    } else {
                      // Si el usuario es empleado, mostrar un mensaje de alerta y no permitir la acción
                      echo "<a class='small-box-footer btn-print' href='#' onClick='alert(\"Usuario no tiene permiso\"); return false;'><i class='glyphicon glyphicon-remove'></i></a>";
                      echo "<a class='btn btn-danger btn-print' href='#' onClick='alert(\"Usuario no tiene permiso\"); return false;'>EDITAR</a>";
                      echo "<a class='btn btn-primary btn-print' href='#' onClick='alert(\"Usuario no tiene permiso\"); return false;'>STOCK</a>";
                    }
                    // Eliminar el producto de la base de datos
                    
                    ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.box-body -->
</div><!-- /.container body -->
</div><!-- /.main_container -->

<!-- footer content -->
<footer>
    <div class="pull-right">
      <a>TODOCARS AUTOPARTS</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>

  <?php include '../layout/datatable_script.php'; ?>

  <script>
    $(document).ready(function() {
      $('#example2').dataTable({
        "language": {
          "paginate": {
            "previous": "Anterior",
            "next": "Posterior"
          },
          "search": "BUSCAR:",
        },
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        "searching": true,
      });
    });
  </script>

  <!-- /gauge.js -->
</body>

</html>