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
          <div class="x-panel">
          </div>
        </div><!--end of modal-dialog-->
      </div>


      <div class="box-header" style="text-align: center;">
          <h3 class="box-title" style="font-weight: bold;">REGISTRAR PRODUCTOS</h3>
        </div><!-- /.box-header -->
      <a class="btn btn-warning btn-print" href="producto.php" style="height:25%; width:15%; font-size: 12px " role="button">REGRESAR</a>

      <div class="box-body">

        <form class="form-horizontal" method="post" action="producto_add.php" enctype='multipart/form-data'>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >IMAGEN</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
              <!-- El input de tipo 'file' permite al usuario seleccionar y subir un archivo -->
<input 
  type="file" <!-- Especifica que el input debe ser de tipo 'file'  class="form-control" <!-- Clases para estilos, en este caso de Bootstrap id="imagen" <!-- Identificador único del elemento, útil para referenciarlo en scripts y estilos  name="imagen" <!-- Nombre del input, que se usa para enviar datos en un formulario  accept="image/*" <!-- Acepta solo archivos de imagen de cualquier tipo --> 
  
 
  
 

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
                <input type="text" class="form-control pull-right" id="nombre_pro" name="nombre_pro" required >
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
                <textarea class="form-control" id="descripcion" name="descripcion" ></textarea>
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
                <input type="text" class="form-control pull-right" id="unidad" name="unidad" required >
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
                <input type="text" class="form-control pull-right" id="precio_venta" name="precio_venta" required >
              </div>
            </div>
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 btn-print">
              <div class="form-group">
                <label for="date" >STOCK INICIAL</label>
              </div><!-- /.form group -->
            </div>
            <div class="col-md-4 btn-print">
              <div class="form-group">
                <input type="text" class="form-control pull-right" id="stock" name="stock" required >
              </div>
            </div>
            
            <div class="col-md-4 btn-print">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>

          <div class="modal-footer">
          </div>
        </form>
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

<!-- /gauge.js -->
</body>
</html>
