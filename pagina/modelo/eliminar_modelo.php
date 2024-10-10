<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


          if(isset($_REQUEST['id_modelo']))
            {
              $id_modelo=$_REQUEST['id_modelo'];
            }
            else
            {
            $id_modelo=$_POST['id_modelo'];
          }



  mysqli_query($con,"update modelo set estado='d' where id_modelo='$id_modelo'")or die(mysqli_error($con));
echo "<script>document.location='../modelo/modelo.php'</script>"; 
     // header('Location:../usuario.php');
?>