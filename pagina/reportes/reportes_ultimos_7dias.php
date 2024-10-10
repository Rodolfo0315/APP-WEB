
<?php include '../layout/header.php';
      $id_usuario=$_SESSION['id'];
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
    <div class="container body">
      <div class="main_container">
        <?php include '../layout/main_sidebar.php';?>

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class = "x-panel">

            </div>

        </div><!--end of modal-dialog-->
 </div>


 <!--end of modal-->

                        <div class="box-body">
                  <!-- Date range -->  <section class="content-header">
             
          </section>

 <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>


                  <div class="box-header">
                  <h3 class="box-title"> ULTIMOS 7 DIAS</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
  <table id="example2" class="table table-bordered table-striped">
                   <thead>
                          <tr class=" btn-success">
                    <th>#</th>
               
                        <th>Vehiculo</th>
                    <th>Placa</th>
                       
         
                           
        <th>Fecha estimada</th>
    <th>Cliente</th>
 <th class="btn-print"> Accion </th>
             
                      </tr>
                    </thead>
                    <tbody>
                   




<?php


 $fechaActual = date('Y-m-d');

$fecha7days = date('Y-m-d', strtotime('-7 day')) ;

?>

   <?php
 
    $query=mysqli_query($con,"select * from reparacion r inner join marca m on m.id_marca = r.id_marca inner join modelo md on md.id_modelo = r.id_modelo inner join clientes c on c.id_cliente = r.cliente
 where r.estado_reparacion='reparado' and   r.fecha_estimada BETWEEN '$fecha7days' AND '$fechaActual'  ")or die(mysqli_error($con));
    $contador=0;
    while($row=mysqli_fetch_array($query)){
$contador++;
    }

?>

  <div class = "row">
        <div class = "col-md-4 col-lg-12 hide-section">
  <a class="btn btn-danger btn-print"    disabled="true" style="height:25%; width:50%; font-size: 25px " role="button">CANTIDAD DE ELEMENTOS= <label style='color:black;  font-size: 25px '>=<?php echo $contador;?></label></a>



</div>

      
</div>

 <?php







    $query=mysqli_query($con,"select * from reparacion r inner join marca m on m.id_marca = r.id_marca inner join modelo md on md.id_modelo = r.id_modelo inner join clientes c on c.id_cliente = r.cliente
 where r.estado_reparacion='reparado' and   r.fecha_estimada BETWEEN '$fecha7days' AND '$fechaActual' ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
          $auto=$row['nombre_marca'].'  '.$row['nombre_modelo'];
$id_reparacion=$row['id_reparacion'];
$tipo_comprobante=$row['tipo_comprobante'];
?>

                          <tr >
<td ><?php echo $i;?></td>

<td><?php echo $auto;?></td>

    

        <td><?php echo $row['placa'];?></td>              
         <td><?php echo $row['fecha_estimada'];?></td>     
           <td><?php echo $row['nombre'];?></td> 
  <td>
                                 <?php
                   
if ($tipo_comprobante=="Boleta") {



                    
                      ?>


<a class="btn btn-danger btn-print" href="<?php  echo "../boletas_ventas/generar_boleta.php?id_reparacion=$id_reparacion";?>"  target="_blank"  role="button">Boleta</a>


      <?php
                      }
                      ?>

                                                       <?php


  if ($tipo_comprobante=="Factura") {

                    
                      ?>

<a class="btn btn-danger btn-print" href="<?php  echo "../boletas_ventas/generar_factura.php?id_reparacion=$id_reparacion";?>"  target="_blank"  role="button">Factura</a>

      <?php
                      }
                      ?>


                                                       <?php
                   
if ($tipo_comprobante=="Ticket") {

                      ?>


                      <a class="btn btn-danger btn-print" href="<?php  echo "../boletas_ventas/generar_ticket.php?id_reparacion=$id_reparacion";?>"  target="_blank"  role="button">Ticket</a>
            
                               <?php
                      }
                      ?>

            </td>
                      </tr>

                                          <?php
                      }
                    
?>


 <!--end of modal-->

                    </tbody>
         








        <footer>

          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <?php include '../layout/datatable_script.php';?>
    <!-- /gauge.js -->



          <script>
        $(document).ready( function() {
                $('#example2').dataTable( {
                 "language": {
                   "paginate": {
                      "previous": "anterior",
                      "next": "posterior"
                    },
                    "search": "Buscar:",


                  },

                  "info": false,
                  "lengthChange": false,
                  "searching": false,


                }

              );
              } );
    </script>
  </body>
</html>
