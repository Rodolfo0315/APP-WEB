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
      <?php
      if(isset($_REQUEST['id_modelo'])) {
        $id_modelo=$_REQUEST['id_modelo'];
      } else {
        $id_modelo=$_POST['id_modelo'];
      }
      ?>
      <div class="box-header" style="text-align: center;">
          <h3 class="box-title" style="font-weight: bold;">MODIFICAR MODELO</h3>
        </div><!-- /.box-header -->
      <a class="btn btn-warning btn-print" href="modelo.php" style="height:25%; width:15%; font-size: 12px " role="button">REGRESAR</a>
      <div class="box-body">
        <?php
        $query=mysqli_query($con,"SELECT * FROM modelo WHERE id_modelo= '$id_modelo' ")or die(mysqli_error($con));
        $i=1;
        while($row=mysqli_fetch_array($query)){
          $id_marca=$row['id_marca'];
        ?>
        <form class="form-horizontal" method="post" action="modelo_actualizar.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" id="id_modelo" name="id_modelo" value="<?php echo $id_modelo;?>" required>
          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >NOMBRE DEL MODELO</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="nombre_modelo" name="nombre_modelo" value="<?php echo $row['nombre_modelo'];?>" required>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >MARCA</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <select class="form-control select2" name="id_marca" required>
                  <?php
                  $queryc=mysqli_query($con,"SELECT * FROM marca")or die(mysqli_error($con));
                  while($rowc=mysqli_fetch_array($queryc)){
                  ?>
                  <option value="<?php echo $rowc['id_marca'];?>" <?php if($id_marca==$rowc['id_marca']) {echo "selected"; }?>><?php echo $rowc['nombre_marca'];?></option>
                  <?php }?>
                </select>
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
<?php include '../layout/datatable_script.php'; ?>
<script>
  $(document).ready( function() {
    $('#example2').dataTable( {
      "language": {
        "paginate": {
          "previous": "anterior",
          "next": "posterior"
        },
        "search": "Buscar:"
      },
      "info": false,
      "lengthChange": false,
      "searching": false,
      "searching": true
    });
  });
</script>
</body>
</html>
