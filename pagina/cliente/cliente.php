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
    <?php include '../layout/main_sidebar.php';?>

    <!-- top navigation -->
    <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->

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
        <h3 class="box-title"></h3>
      </div><!-- /.box-header -->
      <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> IMPRECION</a>
      <a class="btn btn-warning btn-print" href="cliente_agregar.php" style="height:25%; width:15%; font-size: 12px " role="button">REGISTRAR</a>

      <div class="box-body">
      <div class="box-header" style="text-align: center;">
        <h3 class="box-title" style="font-weight: bold;">LISTA DE CLIENTES</h3>
      </div><!-- /.box-header -->

        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr class=" btn-success">
                <th>#</th>
                <th>NOMBRE DEL CLIENTE</th>
                <th>DOCUMENTO</th>
                <th>TELEFONO</th>
                <th>CORREO ELECTRONICO</th>
                <th class="btn-print">ACCION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query=mysqli_query($con,"select * from clientes where estado='a' ")or die(mysqli_error($con));
              $i=0;
              while($row=mysqli_fetch_array($query)){
                $id_cliente=$row['id_cliente'];
                $i++;
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['nombre'];?></td>
                <td><?php echo $row['documento'];?></td>
                <td><?php echo $row['telefono'];?></td>
                <td><?php echo $row['correo'];?></td>
                <td>
                  <a class="small-box-footer btn-print"  href="<?php echo "eliminar_cliente.php?id_cliente=$id_cliente";?>" onClick="return confirm('¿Está seguro de que quieres eliminar cliente??');"><i class="glyphicon glyphicon-remove"></i></a>
                  <a class="btn btn-danger btn-print" href="<?php echo "editar_cliente.php?id_cliente=$id_cliente";?>"  role="button">EDITAR</a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div><!-- /.box-body -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.box-body -->
</div>
</div>
</div>
<!-- /page content -->

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

<?php include '../layout/datatable_script.php';?>

<script>
  $(document).ready( function() {
    $('#example2').dataTable( {
      "language": {
        "paginate": {
          "previous": "Anterior",
          "next": "Posterior"
        },
        "search": "BUSCAR:",
      },
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "searching": true,
    });
  });
</script>

<!-- /gauge.js -->
</body>
</html>
