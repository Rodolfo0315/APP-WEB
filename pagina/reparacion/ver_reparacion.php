
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
     if(isset($_REQUEST['id_reparacion']))
            {
              $id_reparacion=$_REQUEST['id_reparacion'];
            }
            else
            {
            $id_reparacion=$_POST['id_reparacion'];
          }


?>

                           <?php
                         
             //         if ($guardar=="si") {
                    
                      ?>

                  <?php
               //       }
                      ?>

                  <!-- Date range -->
               

      
 <!--end of modal-->











                  <div class="box-header">
                  <h3 class="box-title"> MODIFICAR REPARACION</h3>
                </div><!-- /.box-header -->
              
              <a class="btn btn-warning btn-print" href="reparacion.php"    style="height:25%; width:15%; font-size: 12px " role="button">Regresar</a>

                <div class="box-body">
                

<?php
   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from reparacion r inner join marca m on m.id_marca = r.id_marca inner join modelo md on md.id_modelo = r.id_modelo inner join clientes c on c.id_cliente = r.cliente where id_reparacion= '$id_reparacion' ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
$auto=$row['nombre_marca'].'  '.$row['nombre_modelo'];

      // $tipo=$row['tipo'];
       
?>
      
        <form class="form-horizontal" method="post" action="reparacion_actualizar.php" enctype='multipart/form-data'>
            <input type="hidden" class="form-control" id="id_reparacion" name="id_reparacion" value="<?php echo $id_reparacion;?>" required>
    





     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Vehiculo</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $auto;?>" readonly>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Cliente</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $row['nombre'];?>" readonly>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Placa</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $row['placa'];?>" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Diagnóstico Automotriz</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">


                   <textarea readonly class="form-control" id="diagnóstico_automotriz" name="diagnóstico_automotriz"><?php echo $row['diagnóstico_automotriz'];?> </textarea>

                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


          
               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Revision componentes</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">


                   <textarea class="form-control" id="revision_componentes" name="revision_componentes"><?php echo $row['revision_componentes'];?></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>




               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Fecha estimada reparacion</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="date" class="form-control" id="fecha_estimada"  name="fecha_estimada"  value="<?php echo $row['fecha_estimada'];?>" >
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Hora estimada reparacion</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" id="hora_reparacion"  name="hora_reparacion"  value="<?php echo $row['hora_reparacion'];?>" >
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



       <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Costo De Chequeo</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" id="costo_de_chequeo"  name="costo_de_chequeo" value="<?php echo $row['costo_de_chequeo'];?>" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



        
          
 








  


     
                
          
    <button type="submit" class="btn btn-primary">GUARDAR</button>          
  
                   
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
                      "previous": "anterior",
                      "next": "posterior"
                    },
                    "search": "Buscar:",


                  },

                  "info": false,
                  "lengthChange": false,
                  "searching": false,


  "searching": true,
                }

              );
              } );
    </script>
                                         <?php 
 // }    
?>



    <!-- /gauge.js -->
  </body>
</html>
