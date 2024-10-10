

              <?php
$caja_cont=0;
$acumulado=0;

    $caja_query=mysqli_query($con,"select * from caja where estado='abierto' ")or die(mysqli_error($con));
    $i=0;
    while($row_caja=mysqli_fetch_array($caja_query)){
      $caja_cont++;
      $acumulado=$row_caja['monto'];
    }
if ($caja_cont==0) {

}
?>

              <?php


    $caja_query=mysqli_query($con,"select * from empresa  ")or die(mysqli_error($con));
    $i=0;
    while($row_caja=mysqli_fetch_array($caja_query)){
   
      $simbolo_moneda=$row_caja['simbolo_moneda'];
    }
?>

              <?php

?>
 <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                         <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../usuario/subir_us/<?php echo $imagen; ?>" alt=""><?php echo $nombre; ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                
                    <li><a href="../layout/logout.php"><i class="fa fa-sign-out pull-right"></i> CERRAR SESION</a></li>

                  </ul>
                </li>   


                    <?php
                      if ($tipo=="administrador" or $tipo=="empleado") {
                    
                      ?>
         <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../layout/images/caja.png" alt="">CAJA<?php echo "<h2>$simbolo_moneda $acumulado</h2>"; ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                          <?php
                          if ($caja_cont==0) {


                          ?>
                           <li><a href="../layout/caja.php"><i class="fa fa-money"></i> ABRIR CAJA</a></li>
                                   <?php                   
}
           if ($caja_cont>0) {


                          ?>   

            
         <li><a href="../layout/caja.php"><i class="fa fa-money"></i> CERRAR CAJA</a></li>

                         <?php 
                         }
                             ?>  
                  </ul>
                </li>  

        <?php
                      }
                      ?>



   



     
              </ul>
            </nav>
          </div>
 </div>