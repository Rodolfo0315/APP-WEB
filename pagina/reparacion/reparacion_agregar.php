<?php include '../layout/dbcon.php'; ?>
<?php
@session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../reparacion/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#key').on('keyup', function() {
        var key = $(this).val();
        var dataString = 'key=' + key;
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: dataString,
          success: function(data) {
            //Escribimos las sugerencias que nos manda la consulta
            $('#suggestions').fadeIn(1000).html(data);
            //Al hacer click en algua de las sugerencias
            $('.suggest-element').on('click', function() {
              //Obtenemos la id unica de la sugerencia pulsada
              var id = $(this).attr('id');

              var idlcliente = $(this).attr('id').substring(7, 10).match(/\d+/);
              //Editamos el valor del input con data de la sugerencia pulsada
              $('#key').val($('#' + id).attr('data'));
              //Hacemos desaparecer el resto de sugerencias
              $('#suggestions').fadeOut(1000);
              alert('Has seleccionado a ' + ' ' + $('#' + id).attr('data'));
              document.f1.cliente.value = idlcliente;
              document.f1.clientenombre.value = $('#' + id).attr('data');
              return false;
            });
          }
        });
      });
    });
    $(document).ready(function() {
      $('#key').on('keyup', function() {
        var key = $(this).val();
        var dataString = 'key=' + key;
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: dataString,
          success: function(data) {
            //Escribimos las sugerencias que nos manda la consulta
            $('#suggestionsingresos').fadeIn(1000).html(data);
            //Al hacer click en algua de las sugerencias
            $('.suggest-element').on('click', function() {
              //Obtenemos la id unica de la sugerencia pulsada
              var id = $(this).attr('id');

              var idlcliente = $(this).attr('id').substring(7, 10).match(/\d+/);
              //Editamos el valor del input con data de la sugerencia pulsada
              $('#key').val($('#' + id).attr('data'));
              //Hacemos desaparecer el resto de sugerencias
              $('#suggestionsingresos').fadeOut(1000);
              alert('Has seleccionado a ' + ' ' + $('#' + id).attr('data'));
              document.f1.cliente.value = idlcliente;
              document.f1.clientenombre.value = $('#' + id).attr('data');
              return false;
            });
          }
        });
      });
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REPARACION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../reparacion/public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../reparacion/public/css/font-awesome.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../reparacion/public/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../reparacion/public/css/blue.css">
  
  <style type="text/css">
    #myInput {
      background-image: url('../reparacion/css/buscador.png');
      /* Add a search icon to input */
      background-position: 10px 12px;
      /* Position the search icon */
      background-repeat: no-repeat;
      /* Do not repeat the icon image */
      width: 100%;
      /* Full-width */
      font-size: 16px;
      /* Increase font-size */
      padding: 12px 20px 12px 40px;
      /* Add some padding */
      border: 1px solid #ddd;
      /* Add a grey border */
      margin-bottom: 12px;
      /* Add some space below the input */
    }

    #myUL {
      /* Remove default list styling */
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    #myUL li a {
      border: 1px solid #ddd;
      /* Add a border to all links */
      margin-top: -1px;
      /* Prevent double borders */
      background-color: #f6f6f6;
      /* Grey background color */
      padding: 12px;
      /* Add some padding */
      text-decoration: none;
      /* Remove default text underline */
      font-size: 18px;
      /* Increase the font-size */
      color: black;
      /* Add a black text color */
      display: block;
      /* Make it into a block element to fill the whole list */
    }

    #myUL li a:hover:not(.header) {
      background-color: #eee;
      /* Add a hover effect to all links, except for headers */
    }
  </style>
</head>

<body class="hold-transition login-page">
  <?php
  if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
  $granTotal = 0;
  $impuTotal = 0;
  ?>
  <div class="col-xs-12">
    <h4>REPARACION</h4>
    <?php
    if (isset($_GET["status"])) {
      if ($_GET["status"] === "1") {
    ?>
        <div class="alert alert-success">
          <strong>¡Correcto!</strong> Venta realizada correctamente
        </div>
      <?php
      } else if ($_GET["status"] === "2") {
      ?>
        <div class="alert alert-info">
          <strong>Venta cancelada</strong>
        </div>
      <?php
      } else if ($_GET["status"] === "3") {
      ?>
        <div class="alert alert-info">
          <strong>Ok</strong> Producto quitado de la lista
        </div>
      <?php
      } else if ($_GET["status"] === "4") {
      ?>
        <div class="alert alert-warning">
          <strong>Error:</strong> El producto que buscas no existe
        </div>
      <?php
      } else if ($_GET["status"] === "5") {
      ?>
        <div class="alert alert-danger">
          <strong>Error: </strong>El producto está agotado
        </div>
      <?php
      } else {
      ?>
        <div class="alert alert-danger">
          <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
        </div>
    <?php
      }
    }
    ?>
    <br>
    <br>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">

            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="frmAcceder" name="frmAcceder">
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <br><br>
                    <?php
                    $acumulado = 0;
                    $id_usuario = $_SESSION['id'];
                    $caja_cont = 0;
                    $acumulado = 0;
                    $caja_query = mysqli_query($con, "select * from caja where estado='abierto' ") or die(mysqli_error($con));
                    $i = 0;
                    while ($row_caja = mysqli_fetch_array($caja_query)) {
                      $caja_cont++;
                      $acumulado = $row_caja['monto'];
                    }
                    if ($caja_cont == 0) {
                    }
                    $caja_query = mysqli_query($con, "select * from empresa  ") or die(mysqli_error($con));
                    $i = 0;
                    while ($row_caja = mysqli_fetch_array($caja_query)) {

                      $simbolo_moneda = $row_caja['simbolo_moneda'];
                    }
                    ?>
                    <h3>CAJA<?php echo "<h2>$simbolo_moneda $acumulado</h2>"; ?></h3>
                  </div>
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer">
                <a type="button" href="../layout/inicio.php" class="btn btn-danger">Salir de reparacion</a>
              </div>
            </form>
          </div><!-- /.box -->
        </div><!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">REGISTRAR NUEVA REPARACION</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="box">
                <div class="box-body no-padding">
                  <div class="row">
                    <div id="content" class="col-lg-12">
                      <form class="form-inline" method="post" action="#">
                      </form>
                      <div id="suggestions"></div>
                    </div>
                  </div>
                  <br> <br>
                  <form class="form-inline" name="f1" action="./reparacion_add.php" method="POST">
                    <h3>Seleccione cliente</h3>
                    <div class="input-group input-group-sm">
                      <input class="search_query form-control" type="text" name="key" id="key" placeholder="Buscar..." required>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">MARCA</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <select class="form-control select2" name="id_marca" id="id_marca" required>
                            <option value="0">SELECCIONE LA MARCA</option>
                            <?php
                            $queryc = mysqli_query($con, "select * from marca  ") or die(mysqli_error($con));
                            while ($rowc = mysqli_fetch_array($queryc)) {
                            ?>
                              <option value="<?php echo $rowc['id_marca']; ?>"><?php echo $rowc['nombre_marca']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">MODELO</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <select id="id_modelo" class="form-control" name="id_modelo" required>
                            <option value="">SELECCIONE EL MODELO</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">PLACA DEL VEHICULO</label>
                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <input type="text" class="form-control pull-right" id="placa" name="placa" placeholder="Numero de placa" required>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">DIANÓSTICO AUTOMOTRIZ</label>
                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <textarea class="form-control" id="diagnóstico_automotriz" name="diagnóstico_automotriz"></textarea>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">QUE COMOPONENTES SE REVISARAN</label>
                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <textarea class="form-control" id="revision_componentes" name="revision_componentes"></textarea>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">FECHA ESTIMADA DE REPARACION</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <input type="date" class="form-control pull-right" id="fecha_estimada" name="fecha_estimada" required>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">HORA ESTIMADA DE REPARACION</label>
                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <input type="text" class="form-control pull-right" id="hora_reparacion" name="hora_reparacion" placeholder="hora reparacion" required>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">COSTO DE CHEQUEO</label>
                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <input type="text" class="form-control pull-right" id="costo_de_chequeo" name="costo_de_chequeo" placeholder="COSTO DE CHEQUEO" required>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 btn-print">
                        <div class="form-group">
                          <label for="date">TIPO DE COMPROBANTE</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <select class="form-control select2" name="tipo_comprobante" required>
                            <option value="Boleta">BOLETA</option>
                            <option value="Factura">FACTURA</option>
                            <option value="Ticket">TICKET</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>
                    <input name="cliente" id="cliente" type="hidden" required>
                    <br>
                    <button type="submit" class="btn btn-success">REGISTRAR REPARACION</button>
                  </form>
                  <?php
                  ?>
                  <div class="row">
                    <div class="box-body">
                    </div>
                    <div class="icon" style="margin-top:10px">
                      <i class="glyphicon glyphicon-user"></i>
                    </div>
                  </div>
                </div><!-- ./col -->
                <?php
                ?>
              </div><!--row-->
              <?php
              ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.box -->
        <!-- general form elements disabled -->
      </div><!--/.col (right) -->
  </div> <!-- /.row -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <script>
    function myFunction() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
      $("#id_marca").change(function() {
        $.get("get_modelo.php", "id_marca=" + $("#id_marca").val(), function(data) {
          $("#id_modelo").html(data);
          console.log(data);
        });
      });
    });
  </script>
  <!-- jQuery 2.1.4 -->
  <script src="../reparacion/public/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../reparacion/public/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../reparacion/public/js/icheck.min.js"></script>
</body>
</html>
<?php
?>