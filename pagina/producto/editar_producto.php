<?php include '../layout/header.php';

//$branch_id = $_GET['id'];
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
<body class="nav-md">
<?php 
//    if ($usuario=="si") {
      # code...
    
?>
<div class="container body">
  <div class="main_container">
    <?php include '../layout/main_sidebar.php';?>

    <!-- top navigation -->
    <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->
    <style>
      label{
        color: black;
      }
      li {
        color: white;
      }
      ul {
        color: white;
      }
      #buscar{
        text-align: right;
      }
    </style>

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class = "x-panel">
          </div>
        </div><!--end of modal-dialog-->
      </div>

      <?php
     if(isset($_REQUEST['id_pro']))
            {
              $id_pro=$_REQUEST['id_pro'];
            }
            else
            {
            $id_pro=$_POST['id_pro'];
          }
?>

      <!--end of modal-->
      <div class="box-header" style="text-align: center;">
        <h3 class="box-title" style="font-weight: bold;">MODIFICAR PRODUCTO</h3>
      </div><!-- /.box-header -->
      <a class="btn btn-warning btn-print" href="producto.php" style="height:25%; width:15%; font-size: 12px " role="button">REGRESAR</a>

      <div class="box-body">
        <?php
   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from producto where id_pro= '$id_pro' ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
?>

        <form class="form-horizontal" method="post" action="producto_actualizar.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" id="id_pro" name="id_pro" value="<?php echo $id_pro;?>" required>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >IMAGEN ANTIGUA</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <IMG src="subir_producto/<?php echo $row['imagen'];?>" style="height:50PX" />
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >IMAGEN NUEVA</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="file" class="form-control" id="imagen" name="imagen"  >
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >NOMBRE</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control" id="nombre_pro" name="nombre_pro" value="<?php echo $row['nombre_pro'];?>" required>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >DESCRIPCION</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <textarea class="form-control" id="descripcion" name="descripcion" ><?php echo $row['descripcion'];?></textarea>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >UNIDAD</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <textarea class="form-control" id="unidad" name="unidad" ><?php echo $row['unidad'];?></textarea>
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >PRECIO DE VENTA</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <textarea class="form-control" id="precio_venta" name="precio_venta" ><?php echo $row['precio_venta'];?></textarea>
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

        <!--end of modal-->
        <?php }?>
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
      "info": false,
      "lengthChange": false,
      "searching": false,
      "searching": true,
    });
  });
</script>
<?php 
 // }    
?>

<!-- /gauge.js -->
</body>
</html>
