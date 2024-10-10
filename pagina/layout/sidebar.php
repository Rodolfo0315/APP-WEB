<?php 
$id=$_SESSION['id'];
?>

<?php

?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>MENU</h3>
                <ul class="nav side-menu">
                                   <li><a href = "../layout/inicio.php"><i class="fa fa-dashboard"></i>INICIO <span class="fa fa-chevron-right"></span></a></li>
           


                           <?php
                      if ($tipo=="administrador" ) {
                    
                      ?>
          
                     
                                  <?php
                      }
                      ?>

                            <?php
 
                    
                      ?>

                                   <li><a><i class="fa fa-bar-chart"></i> REPARACIÓN<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="../reparacion/reparacion.php">REPARACIONES EN CURSO</a></li>
<li><a href="../reparacion/reparacion_concluidas.php">REPARACIONES CONCLUIDAS</a></li>
<li><a href="../reparacion/reparacion_agregar.php">NUEVA REPARACIÓN</a></li>





                       

                    </ul>
                  </li>
                          <li><a><i class="fa fa-database"></i>REPUESTO<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="../producto/producto.php">PRODUCTOS</a></li>





                       

                    </ul>
                  </li>


                                            <li><a><i class="fa fa-user"></i>CLIENTES<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="../cliente/cliente.php">CLIENTES</a></li>





                       

                    </ul>
                  </li>

                          <li><a><i class="fa fa-automobile"></i>MARCA DE VEHICULO<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="../marca/marca.php">MARCA</a></li>
<li><a href="../modelo/modelo.php">MODELO</a></li>





                       

                    </ul>
                  </li>
    
                                  <?php
        
                      ?>
                    
                






             
                 
         









                                   <li><a><i class="fa fa-bar-chart"></i>REPORTES<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="../reportes/reportes_por_fecha.php">REPORTE ENTRE FECHAS</a></li>
<li><a href="../reportes/reportes_por_dia.php">REPORTE POR DIA</a></li>
<li><a href="../reportes/reportes_ultimos_7dias.php">REPORTE DE LOS ULTIMOS 7 DIAS</a></li>




                       

                    </ul>
                  </li>






           




                      




       
          
                   <?php
                      if ($tipo=="administrador" ) {
                    
                      ?>
             <li><a href = "../usuario/usuario.php"><i class="fa fa-user"></i>USUARIO<span class="fa fa-chevron-right"></span></a>


        <?php
                      }
                      ?>

                             <?php
                      if ($tipo=="administrador" ) {
                    
                      ?>

                 <li><a><i class="fa fa-gear"></i>CONFIGURACION<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="../configuracion/configuracion.php">EMPRESA</a></li>
       
                       

                    </ul>
                  </li>


                     <li><a><i class="fa fa-database"></i> BASE DE DATOS<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="../otros/vaciar_bd.php" onClick="return confirm('¿Está seguro de que quieres vaciar la base de datos ??');">VACIAR</a></li>
       
                       <li><a href="../otros/respaldo_add.php">RECUPERAR</a></li>

                    </ul>
                  </li>
             <?php
                      }
                      ?>


                   
              </div>
            
            </div>
