<?php include '../layout/dbcon.php';?>

<?php 
 @session_start();





//$idusuario=$_SESSION["idusuario"];
   $fechaactual = date('Y-m-d');

$porcentaje_impuesto=0;
$simbolo_moneda="";
       $query=mysqli_query($con,"select * from empresa  ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $porcentaje_impuesto=$row['impuesto'];
       $simbolo_moneda=$row['simbolo_moneda'];
}

?>

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
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../reparacion/css/styles.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repuestos </title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      #myInput {
  background-image: url('../reparacion/css/buscador.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
  /* Remove default list styling */
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd; /* Add a border to all links */
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6; /* Grey background color */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove default text underline */
  font-size: 18px; /* Increase the font-size */
  color: black; /* Add a black text color */
  display: block; /* Make it into a block element to fill the whole list */
}

#myUL li a:hover:not(.header) {
  background-color: #eee; /* Add a hover effect to all links, except for headers */
}

    </style>
  </head>
  <body class="hold-transition login-page">
           <?php    
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
$impuTotal = 0;
?>
  <div class="col-xs-12">
    <h4>Repuestos</h4>
    <?php
      if(isset($_GET["status"])){
        if($_GET["status"] === "1"){
          ?>
            <div class="alert alert-success">
              <strong>¡Correcto!</strong> Venta realizada correctamente
            </div>
          <?php
        }else if($_GET["status"] === "2"){
          ?>
          <div class="alert alert-info">
              <strong>Venta cancelada</strong>
            </div>
          <?php
        }else if($_GET["status"] === "3"){
          ?>
          <div class="alert alert-info">
              <strong>Ok</strong> Producto quitado de la lista
            </div>
          <?php
        }else if($_GET["status"] === "4"){
          ?>
          <div class="alert alert-warning">
              <strong>Error:</strong> El producto que buscas no existe
            </div>
          <?php
        }else if($_GET["status"] === "5"){
          ?>
          <div class="alert alert-danger">
              <strong>Error: </strong>El producto está agotado
            </div>
          <?php
        }else{
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
    <table class="table table-bordered">
      <thead>
        <tr>


          <th>Producto</th>
          <th>Precio de venta</th>
          <th>Cantidad</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
       $query11=mysqli_query($con,"select * from empresa ")or die(mysqli_error($con));

   while($row11=mysqli_fetch_array($query11)){


 $impuesto_producto=$row11['impuesto'];


    
      }



            $query=mysqli_query($con,"select * from detalles_pedido d inner join producto p on d.id_producto = p.id_pro 
 where d.id_reparacion='$id_reparacion'")or die(mysqli_error($con));
    $i=0;
    
    while($row=mysqli_fetch_array($query)){
         $id_detalles=$row['id_detalles'];
      $total=$row['cantidad']*$row['precio_venta'];
           $granTotal +=$total;
$impuTotal += $total;

          ?>
        <tr>
   <td><?php echo $row['nombre_pro']; ?></td>
          <td><?php echo $row['precio_venta']; ?></td>
          <td><?php echo $row['cantidad'] ?></td>
          <td><?php echo $total ?></td>

          <td><a class="btn btn-danger" href="<?php echo "quitar_repuesto.php?id_detalles=" . $id_detalles?>"><i class="fa fa-trash"></i></a>
     
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>





     <h3>Sub Total: <?php echo $granTotal; ?></h3>
  <h3>Impuesto: <?php echo number_format($impuTotal*$porcentaje_impuesto/100,2);?></h3>
     <h3>Total: <?php echo number_format($granTotal*$porcentaje_impuesto/100+$granTotal,2);?></h3>

                    </div>
                  </div> 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a type="button" href="../reparacion/reparacion.php" class="btn btn-danger">Volver a reparaciones en curso</a>
                  </div>
                </form>
              </div><!-- /.box -->

              

              

              
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-8">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">POS</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
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
   <br>   <br> 

   
    <form  class="form-inline" name="f1" action="./terminarVenta.php" method="POST">



<br>






   


<br>


    </form>

<?php

  # code...

?>


                  <div class="row">
                        

                   <div class="box-body">
                
         

 
                        
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar producto..">

<ul id="myUL">
  <?php

    $query=mysqli_query($con,"select * 
from producto where  stock>0 ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $id_pro=$row['id_pro'];

         $stock=$row['stock'];
 
?>

             <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
               
                        <div class="small-box bg-white">
                          <div class="inner">



  <li><a href="#updateordinance<?php echo $row['id_pro'];?>"  data-target="#updateordinance<?php echo $row['id_pro'];?>" data-toggle="modal" style="color:black;"  style="height:25%; width:75%; font-size: 12px " role="button"><?php echo $row['nombre_pro'];?><br><?php echo $simbolo_moneda.' '.$row['precio_venta'];?><br><IMG src="../producto/subir_producto/<?php  echo $row['imagen'];?>" width="100px" height="100px"></a></li>
           
             </tr>
        <div id="updateordinance<?php echo $row['id_pro'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"></span></button>
  
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="../repuestos/pos_repuestos_add.php" >

                 <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                 
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">
                         
               <input type="hidden" class="form-control" id="id_pro" name="id_pro" value="<?php echo $row['id_pro'];?>" required>

       <input type="hidden" class="form-control" id="id_reparacion" name="id_reparacion" value="<?php echo $id_reparacion;?>" required>
 
                      </div>
                    </div>
                           <div class="col-md-1 btn-print">
                
                    </div>
                    </div>



      
          <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                     
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">
                        <label style="color: black;" >Descuento</label>
        <input type="text" class="form-control" id="descuento" name="descuento" value="0" >
 
                      </div>
                    </div>
                           <div class="col-md-1 btn-print">
                
                    </div>
                    </div>

                <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                     
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">
                        <label style="color: black;" >Cantidad</label>

  <input class="form-control"  type="number" id="cantidad" name="cantidad" placeholder="Cantidad" style="width: 100%;" oninput="validarCantidad(this)" >

<script>
function validarCantidad(input) {
    // Validar si el valor es numérico y mayor que cero
    if (isNaN(input.value) || input.value <= 0) {
        // Mostrar un mensaje de error o tomar otra acción apropiada
        alert("Ingrese un número válido mayor que cero");
        // Limpiar el valor del campo
        input.value = '';
    }
}
</script>

<!--// Error que tenia al agrugar producto fue solucionado con funcion de validacion de cantidad-->
 
                      </div>
                    </div>
                           <div class="col-md-1 btn-print">
                
                    </div>
                    </div>

      <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
      
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">

                     <button type="submit" class="btn btn-primary">AGREGAR</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                      </div>
                    </div>
                           <div class="col-md-1 btn-print">
                
                    </div>
                    </div>

              

              </div>
     
        </form>
            </div>

        </div><!--end of modal-dialog-->
 </div>              
                          </div>
                          <div class="icon" style="margin-top:10px">
                   
                          </div>
                   
                        </div>
                      </div><!-- ./col -->

 <?php
}
 ?>
</ul>

          
      






      












             

                  
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
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

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