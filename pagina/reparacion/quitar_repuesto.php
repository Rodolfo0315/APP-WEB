<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


          if(isset($_REQUEST['id_detalles']))
            {
              $id_detalles=$_REQUEST['id_detalles'];
            }
            else
            {
            $id_detalles=$_POST['id_detalles'];
          }


    $query=mysqli_query($con,"select * from detalles_pedido where id_detalles='$id_detalles' ")or die(mysqli_error($con));
    $i=0;
    while($row=mysqli_fetch_array($query)){
    $id_pro=$row['id_producto'];

$cantidad=$row['cantidad'];
  }


  mysqli_query($con,"delete from detalles_pedido where id_detalles= '$id_detalles'")or die(mysqli_error($con));

    $update=mysqli_query($con,"update producto set stock=stock+'$cantidad' where id_pro='$id_pro' ");
  
  echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
  echo "<script>document.location='../reparacion/reparacion.php'</script>"; 
  
?>