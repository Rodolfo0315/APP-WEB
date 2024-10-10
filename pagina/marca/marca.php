<?php include '../layout/header.php'; ?>

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <?php include '../layout/main_sidebar.php'; ?>

    <!-- top navigation -->
    <?php include '../layout/top_nav.php'; ?>      <!-- /top navigation -->

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

      <div class="box-header">
        <h3 class="box-title"> </h3>
      </div><!-- /.box-header -->
      <a class="btn btn-success btn-print" href="#" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> IMPRECION</a>
      <?php
      if ($_SESSION['rol'] == 'administrador') {
        // Si el usuario es administrador, mostrar enlace para registrar
        echo "<a class='btn btn-warning btn-print' href='marca_agregar.php' style='height:25%; width:15%; font-size: 12px' role='button'>REGISTRAR</a>";
      } else {
        // Si el usuario es empleado, mostrar un mensaje de error al intentar registrar
        echo "<a class='btn btn-warning btn-print' href='#' onClick='alert(\"Usuario No tiene permiso .\"); return false;' style='height:25%; width:15%; font-size: 12px' role='button'>REGISTRAR</a>";
      }
      ?>

        <div class="box-body">
          <div class="box-header" style="text-align: center;">
            <h3 class="box-title" style="font-weight: bold;">LISTA DE LA MARCA DEL VEHICULO</h3>
          </div><!-- /.box-header -->

          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr class="btn-success">
                  <th>#</th>
                  <th>MARCA</th>
                  <th class="btn-print">ACCION</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($con, "select * from marca where estado='a' ") or die(mysqli_error($con));
                $i = 0;
                while ($row = mysqli_fetch_array($query)) {
                  $id_marca = $row['id_marca'];
                  $i++;
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nombre_marca']; ?></td>
                    <td>
                      <?php
                      if ($_SESSION['rol'] == 'administrador') {
                        // Si el usuario es administrador, mostrar enlace para eliminar
                        echo "<a class='small-box-footer btn-print' href='eliminar_marca.php?id_marca=$id_marca' onClick='return confirm(\"¿Está seguro de que quieres eliminar esta marca?\");'><i class='glyphicon glyphicon-remove'></i></a>";
                      } else {
                        // Si el usuario es empleado, mostrar un mensaje de error y no permitir la eliminación
                        echo "<a class='small-box-footer btn-print' href='#' onClick='alert(\"Usuario No tiene permiso .\"); return false;'><i class='glyphicon glyphicon-remove'></i></a>";
                      }
                      // Mostrar enlace para editar para todos los usuarios
                      echo "<a class='btn btn-danger btn-print' href='editar_marca.php?id_marca=$id_marca' role='button'>EDITAR</a>";
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
        }

      );
    });
  </script>
  <!-- /gauge.js -->
</body>
</html>