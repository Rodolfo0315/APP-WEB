<?php include '../layout/dbcon.php';?>

<?php 
 @session_start();

         $idempleado=$_SESSION['id']; 

$empresa_query = mysqli_query($con, "select * from usuario where idempleado = '$idempleado'") or die(mysqli_error($con));
$empresa_row = mysqli_fetch_array($empresa_query);

$idsucursal = $empresa_row['idsucursal'];

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
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../ventas/css/styles.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            
  <script>
$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
    $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                     
                           var idlcliente      = $(this).attr('id').substring(7,10).match(/\d+/); 
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        alert('Has seleccionado a '+' '+$('#'+id).attr('data'));
 document.f1.cliente.value = idlcliente;
                 
 document.f1.clientenombre.value = $('#'+id).attr('data');
                        return false;
                });
            }
        });
    });
}); 



$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
    $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestionsingresos').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                     
                           var idlcliente      = $(this).attr('id').substring(7,10).match(/\d+/); 
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestionsingresos').fadeOut(1000);
                        alert('Has seleccionado a '+' '+$('#'+id).attr('data'));
 document.f1.cliente.value = idlcliente;
                 
 document.f1.clientenombre.value = $('#'+id).attr('data');
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
    <title>POS </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../ventas/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../ventas/public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="../ventas/public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../ventas/public/css/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      #myInput {
  background-image: url('../ventas/css/buscador.png'); /* Add a search icon to input */
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
    <h4>VENTAS</h4>
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

    <th>Codigo</th>
          <th>Descripción</th>
          <th>Precio de venta</th>
          <th>Cantidad</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($_SESSION["carrito"] as $indice => $producto){ 
            $granTotal += $producto->total;
$impuTotal += $producto->impu;

          ?>
        <tr>
   <td><?php echo $producto->codigo ?></td>
          <td><?php echo $producto->nombre ?></td>
          <td><?php echo $producto->precio_ventapublico ?></td>
          <td><?php echo $producto->cantidad ?></td>
          <td><?php echo $producto->total ?></td>
          <td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a>
     
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>





     <h3>Sub Total: <?php echo $granTotal; ?></h3>
  <h3>Impuesto: <?php echo number_format($impuTotal,2);?></h3>
     <h3>Total: <?php echo number_format($granTotal*$porcentaje_impuesto/100+$granTotal,2);?></h3>

                    </div>
                  </div> 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a type="button" href="../layout/inicio.php" class="btn btn-danger">Salir de pos</a>
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
      <input name="total" type="hidden" value="<?php echo $granTotal;?>">
 <input name="idempleado" type="hidden" value="<?php echo $idempleado;?>">
  <input name="idsucursal" type="hidden" value="<?php echo $idsucursal;?>">
    <input name="tipo_pedido" type="hidden" value="Venta">
  <input name="impuesto" type="hidden" value="<?php echo $porcentaje_impuesto;?>">
    <input name="fecha" type="hidden" value="<?php echo $fechaactual;?>">
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
                        <label for="date" >Tipo de Comprobante</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 <select class="form-control select2" name="tipo_comprobante" required>
 <option value="Boleta">Boleta</option>
   <option value="Factura">Factura</option>
                  <option value="Ticket">Ticket</option>
                     
             
      
              </select>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


                      <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Numero comprobante</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                          <input type="text" class="form-control pull-right" id="num_comprobante" name="num_comprobante" placeholder="numero comprobante" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

                               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Serie comprobante</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                          <input type="text" class="form-control pull-right" id="serie_comprobante" name="serie_comprobante" placeholder="serie comprobante" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>
       <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Tipo venta</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
              <select class="form-control select2" name="tipo_venta" required>

                  <option value="Contado">Contado</option>
                       <option value="Credito">Credito</option>
             
      
              </select>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


                               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Monto pagado</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                          <input type="text" class="form-control pull-right" id="monto_pagado" onchange="sumar(this.value);" name="monto_pagado" placeholder="Monto a pagar"  required>
                          <br>
                          <span>Su cambio es de: </span> <span id="spTotal"></span>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


     <input name="cliente" id="cliente" type="hidden"  required>
<br>
      <button type="submit" class="btn btn-success">Terminar venta</button>
      <a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>

    </form>

<?php

  # code...

?>


                  <div class="row">
                        

                   <div class="box-body">
                
         

 
                        
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar producto..">

<ul id="myUL">
  <?php

    $query=mysqli_query($con,"select i.fecha,i.tipo_comprobante as comprobante,
          i.serie_comprobante as serie,i.num_comprobante as numero,
          i.impuesto,
          a.nombre as articulo,a.idarticulo,a.imagen,di.codigo,di.serie,di.stock_ingreso,
          di.stock_actual,a.descripcion,
          (di.stock_ingreso-di.stock_actual)as stock_vendido,
          di.precio_compra,di.precio_ventapublico,di.iddetalle_ingreso,i.idingreso
          from detalle_ingreso di inner join articulo a
          on di.idarticulo=a.idarticulo
          inner join ingreso i on di.idingreso=i.idingreso 

         
         where  i.idsucursal= $idsucursal and i.estado='A' and di.stock_actual>0 ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $iddetalle_ingreso=$row['iddetalle_ingreso'];
     $idingreso=$row['idingreso'];
         $stock_actual=$row['stock_actual'];
 
?>

             <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
               
                        <div class="small-box bg-white">
                          <div class="inner">



  <li><a href="#updateordinance<?php echo $row['iddetalle_ingreso'];?>"  data-target="#updateordinance<?php echo $row['iddetalle_ingreso'];?>" data-toggle="modal" style="color:black;"  style="height:25%; width:75%; font-size: 12px " role="button"><?php echo $row['articulo'];?><br><?php echo $row['codigo'];?><br><?php echo $simbolo_moneda.' '.$row['precio_ventapublico'];?><br><IMG src="../producto/subir_producto/<?php  echo $row['imagen'];?>" width="100px" height="100px"></a></li>
           
             </tr>
        <div id="updateordinance<?php echo $row['iddetalle_ingreso'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"></span></button>
  
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="agregarAlCarrito.php" >

                 <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                 
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">
                         
               <input type="hidden" class="form-control" id="iddetalle_ingreso" name="iddetalle_ingreso" value="<?php echo $row['iddetalle_ingreso'];?>" required>

            <input type="hidden" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['descripcion'];?>" disabled>
 
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
  <input  class="form-control" id="cantidad" name="cantidad" type="number"  min="0" max="<?php echo $row['stock_actual']; ?>" id="cantidad" placeholder="cantidad" style="width: : 100%;"  required>
 
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



/* Sumar dos números. */
function sumar (valor) {
 var impuTotal  = '<?php echo $impuTotal; ?>';
          var granTotal  = '<?php echo $granTotal; ?>';
        //  $granTotal=$granTotal*$porcentaje_impuesto/100+$granTotal;
    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
  
    total = document.getElementById('spTotal').innerHTML;
  
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
  
    /* Esta es la suma. */
    total = ( (valor) -(granTotal)-impuTotal);
  
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('spTotal').innerHTML = total;
}
</script>
    <!-- jQuery 2.1.4 -->
    <script src="../ventas/public/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../ventas/public/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../ventas/public/js/icheck.min.js"></script>
    

  </body>
</html>
<?php


  
?>