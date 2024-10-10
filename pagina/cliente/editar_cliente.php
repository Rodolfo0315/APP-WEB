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

      <?php
      if(isset($_REQUEST['id_cliente'])) {
        $id_cliente=$_REQUEST['id_cliente'];
      } else {
        $id_cliente=$_POST['id_cliente'];
      }
      ?>

<div class="box-header" style="text-align: center;">
        <h3 class="box-title" style="font-weight: bold;">MODIFICAR CLIENTES</h3>
      </div><!-- /.box-header -->
      <a class="btn btn-warning btn-print" href="cliente.php" style="height:25%; width:15%; font-size: 12px " role="button">REGRESAR</a>

      <div class="box-body">
        <?php
        $query=mysqli_query($con,"select * from clientes where id_cliente= '$id_cliente' ")or die(mysqli_error($con));
        $i=1;
        while($row=mysqli_fetch_array($query)){
        ?>
        <form class="form-horizontal" method="post" action="cliente_actualizar.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente;?>" required>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date">NOMBRE DEL CLIENTE</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre'];?>" required>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date">DOCUMENTO DEL CLIENTE</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $row['documento'];?>" required>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date">TELEFONO</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="telefono"  name="telefono"  value="<?php echo $row['telefono'];?>">
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date">CORREO ELECTRONICO</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="correo"  name="correo" value="<?php echo $row['correo'];?>" required>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">MODIFICAR</button>

          <br><br><br><hr>
          <div class="modal-footer">
          </div>
        </form>
        <?php }?>
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
      "info": false,
      "lengthChange": false,
      "searching": false,
      "searching": true,
    });
  });
</script>

</body>
</html>
