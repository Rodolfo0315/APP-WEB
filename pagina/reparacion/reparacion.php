<?php include '../layout/header.php'; ?>
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php include '../layout/main_sidebar.php'; ?>
      <?php include '../layout/top_nav.php'; ?> <!-- /top navigation -->
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
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x-panel">

            </div>

          </div><!--end of modal-dialog-->
        </div>


        <div class="panel-heading">


        </div>
        <div class="box-header" style="text-align: center;">
          <h3 class="box-title" style="font-weight: bold;">LISTA REPARACIONES EN CURSO</h3>
        </div>
        <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>
        <a class="btn btn-warning btn-print" href="reparacion_agregar.php" style="height:25%; width:15%; font-size: 12px " role="button">REGISTRAR REPARACION</a>
        <div class="box-body">
          <div class="box-header">
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr class="btn-success">
                    <th>#</th>
                    <th>VEHICULO</th>
                    <th>PLACA</th>
                    <th>FECHA ESTIMADA</th>
                    <th>CLIENTE</th>
                    <th class="btn-print">ACCION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $auto = "";
                  $query = mysqli_query($con, "SELECT * FROM reparacion r
    INNER JOIN marca m ON m.id_marca = r.id_marca
    INNER JOIN modelo md ON md.id_modelo = r.id_modelo
    INNER JOIN clientes c ON c.id_cliente = r.cliente
    WHERE r.estado_reparacion='transito'") or die(mysqli_error($con));
                  $i = 0;
                  while ($row = mysqli_fetch_array($query)) {
                    $auto = $row['nombre_marca'] . '  ' . $row['nombre_modelo'];
                    $id_reparacion = $row['id_reparacion'];
                    $tipo_comprobante = $row['tipo_comprobante'];
                    $i++;
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $auto; ?></td>
                      <td><?php echo $row['placa']; ?></td>
                      <td><?php echo $row['fecha_estimada']; ?></td>
                      <td><?php echo $row['nombre']; ?></td>
                      <td>
                        <?php
                        if ($tipo_comprobante == "Boleta") {
                        ?>
                          <a class='small-box-footer btn-print' href='eliminar_reparacion.php?id_reparacion=<?php echo $id_reparacion; ?>' onClick='return confirm("¿Está seguro de que quieres eliminar esta reparación?");'><i class='glyphicon glyphicon-remove'></i></a>
                          <a class="btn btn-primary btn-print" href="<?php echo "../reparacion/ver_reparacion.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">VER/EDITAR DETALLES</a>
                          <a class="btn btn-success btn-print" href="<?php echo "../reparacion/pos_repuestos.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">REPUESTO</a>
                          <a class="btn btn-danger btn-print" href="<?php echo "../boletas_ventas/generar_boleta.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">BOLETA</a>
                          <a class="btn btn-primary btn-print" href="<?php echo "../reparacion/cambiar_estado.php?id_reparacion=$id_reparacion"; ?>" onClick="return confirm('¿Está seguro de que quieres dar de alta vehiculo??');" role="button">DAR DE ALTA!!</a>
                        <?php
                        }
                        ?>

                        <?php
                        if ($tipo_comprobante == "Factura") {


                        ?>
                          <a class='small-box-footer btn-print' href='eliminar_reparacion.php?id_reparacion=<?php echo $id_reparacion; ?>' onClick='return confirm("¿Está seguro de que quieres eliminar esta reparación?");'><i class='glyphicon glyphicon-remove'></i></a>
                          <a class="btn btn-primary btn-print" href="<?php echo "../reparacion/ver_reparacion.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">VER/EDITAR DETALLES</a>
                          <a class="btn btn-success btn-print" href="<?php echo "../reparacion/pos_repuestos.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">REPUESTO</a>
                          <a class="btn btn-danger btn-print" href="<?php echo "../boletas_ventas/generar_factura.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">FACTURA</a>
                          <a class="btn btn-primary btn-print" href="<?php echo "../reparacion/cambiar_estado.php?id_reparacion=$id_reparacion"; ?>" onClick="return confirm('¿Está seguro de que quieres dar de alta vehiculo??');" role="button">DAR DE ALTA AL VEHICULO</a>
                        <?php
                        }
                        ?>
                        <?php
                        if ($tipo_comprobante == "Ticket") {
                        ?>
                          <a class='small-box-footer btn-print' href='eliminar_reparacion.php?id_reparacion=<?php echo $id_reparacion; ?>' onClick='return confirm("¿Está seguro de que quieres eliminar esta reparación?");'><i class='glyphicon glyphicon-remove'></i></a>
                          <a class="btn btn-primary btn-print" href="<?php echo "../reparacion/ver_reparacion.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">VER/EDITAR DETALLES</a>
                          <a class="btn btn-success btn-print" href="<?php echo "../reparacion/pos_repuestos.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">REPUESTO</a>
                          <a class="btn btn-danger btn-print" href="<?php echo "../boletas_ventas/generar_ticket.php?id_reparacion=$id_reparacion"; ?>" target="_blank" role="button">TICKET</a>
                          <a class="btn btn-primary btn-print" href="<?php echo "../reparacion/cambiar_estado.php?id_reparacion=$id_reparacion"; ?>" onClick="return confirm('¿Está seguro de que quieres dar de alta vehiculo??');" role="button">DAR DE ALTA AL VEHICULO</a>
                        <?php
                        }
                        ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <footer>
    <div class="pull-right">
      <a>TODOCART AUTOPARTS</a>
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
            "previous": "anterior",
            "next": "posterior"
          },
          "search": "Buscar:",
        },
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        "searching": true,
      });
    });
  </script>
</body>

</html>