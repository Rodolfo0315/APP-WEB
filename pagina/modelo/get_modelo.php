<?php
include('../../dist/includes/dbcon.php');
    $query=mysqli_query($con,"select * from modelo where id_marca='$_GET[id_marca]'")or die(mysqli_error($con));

$modelo = array();
while($r=$query->fetch_object()){ $modelo[]=$r; }
if(count($modelo)>0){
print "<option value=''>-- SELECCIONE --</option>";
foreach ($modelo as $s) {
	print "<option value='$s->id_modelo'>$s->nombre_modelo</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>