<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');

       if(isset($_REQUEST['id_usuario']))
            {
              $id_usuario=$_REQUEST['id_usuario'];
            }
            else
            {
            $id_usuario=$_POST['id_usuario'];
          }

          if(isset($_REQUEST['monto']))
            {
              $monto=$_REQUEST['monto'];
            }
            else
            {
            $monto=$_POST['monto'];
          }

          if(isset($_REQUEST['id_libro']))
            {
              $id_libro=$_REQUEST['id_libro'];
            }
            else
            {
            $id_libro=$_POST['id_libro'];
          }

        if(isset($_REQUEST['debe_haber']))
            {
              $debe_haber=$_REQUEST['debe_haber'];
            }
            else
            {
            $debe_haber=$_POST['debe_haber'];
          }
  mysqli_query($con,"delete from libro where id_libro='$id_libro'")or die(mysqli_error($con));
if ($debe_haber=="haber") {
       $update=mysqli_query($con,"update usuario set caja=caja+'$monto' where id='$id_usuario' ");
}

if ($debe_haber=="debe") {
       $update=mysqli_query($con,"update usuario set caja=caja-'$monto' where id='$id_usuario' ");
}



  echo "<script>document.location='../libro/libro.php'</script>";
     // header('Location:../usuario.php');
?>