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
        echo "<a class='btn btn-warning btn-print' href='modelo_agregar.php' style='height:25%; width:15%; font-size: 12px' role='button'>REGISTRAR</a>";
      } else {
        // Si el usuario es empleado, mostrar un mensaje de error al intentar registrar
        echo "<a class='btn btn-warning btn-print' href='#' onClick='alert(\"Usuario No tiene permiso .\"); return false;' style='height:25%; width:15%; font-size: 12px' role='button'>REGISTRAR</a>";
      }
      ?>

      <div class="box-body">
        <div class="box-header" style="text-align: center;">
          <h3 class="box-title" style="font-weight: bold;">LISTA DE LA MODELO DEL VEHICULO</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr class="btn-success">
              <th>#</th>
              <th>MARCA</th>
              <th>MODELO</th>
              <th class="btn-print"> ACCION</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM marca r INNER JOIN modelo m ON r.id_marca = m.id_marca WHERE m.estado='a' ") or die(mysqli_error($con));
            $i = 0;
            while ($row = mysqli_fetch_array($query)) {
            $id_modelo = $row['id_modelo'];
            $i++;
            ?>
             <tr>
            <td><?php echo $i; ?></td>
           <td><?php echo $row['nombre_marca']; ?></td>
           <td><?php echo $row['nombre_modelo']; ?></td>
            <td>
      <?php
      if ($_SESSION['rol'] == 'administrador') {
        // Si el usuario es administrador, mostrar enlace para eliminar
        echo "<a class='small-box-footer btn-print' href='eliminar_modelo.php?id_modelo=$id_modelo' onClick='return confirm(\"¿Está seguro de que quieres eliminar este modelo?\");'><i class='glyphicon glyphicon-remove'></i></a>";
        // Mostrar enlace para editar
        echo "<a class='btn btn-danger btn-print' href='editar_modelo.php?id_modelo=$id_modelo' role='button'>EDITAR</a>";
      } else {
        // Si el usuario es empleado, mostrar un mensaje de error al intentar eliminar y editar
        echo "<a class='small-box-footer btn-print' href='#' onClick='alert(\"Usuario No tiene permiso .\"); return false;'><i class='glyphicon glyphicon-remove'></i></a>";
        echo "<a class='btn btn-danger btn-print' href='#' onClick='alert(\"Usuario No tiene permiso .\"); return false;'>EDITAR</a>";
      }
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
</div>
</div>

<footer>
  <div class="pull-right">
    <a>TODOCARS AUTOPARTS</a>
  </div>
  <div class="clearfix"></div>
</footer>

<?php include '../layout/datatable_script.php'; ?>

<script>
  $(document).ready(function () {
    $('#example2').dataTable({
      "language": {
        "paginate": {
          "previous": "Anterior",
          "next": "Posterior"
        },
        "search": "BUSCAR:"
      },
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "searching": true
    });
  });
</script>

</body>
</html>
