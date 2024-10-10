
<?php
include('../layout/dbcon.php');
if (!isset($_POST["iddetalle_ingreso"])) {
    return;
}


$porcentaje_impuesto=0;
       $query=mysqli_query($con,"select * from empresa  ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $porcentaje_impuesto=$row['impuesto'];
}


$iddetalle_ingreso = $_POST["iddetalle_ingreso"];
$cantidad = $_POST["cantidad"];
$descuento = $_POST["descuento"];


$sentencia = $base_de_datos->prepare("SELECT * FROM detalle_ingreso as d INNER JOIN articulo as a
ON d.idarticulo = a.idarticulo WHERE iddetalle_ingreso = ? LIMIT 1;");
$sentencia->execute([$iddetalle_ingreso]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);




# Si no existe, salimos y lo indicamos
if (!$producto) {
      echo "<script>document.location='./pos.php?status=4'</script>";
//    header("Location: ../pos.php?status=4");
    exit;
}
# Si no hay existencia...
if ($producto->stock_actual < 1) {
//    header("Location: ../pos.php?status=5");
          echo "<script>document.location='./pos.php?status=5'</script>";
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->iddetalle_ingreso === $iddetalle_ingreso) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = $cantidad;
    $producto->total = $producto->precio_ventapublico*$cantidad-$descuento;
//        $producto->descuento = $descuento*$cantidad;
        $producto->impu = $producto->precio_ventapublico*$cantidad*$porcentaje_impuesto/100;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->stock_actual) {
//        header("Location: ../pos.php?status=5");
                  echo "<script>document.location='./pos.php?status=5'</script>";
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
        $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_ventapublico-$descuento;

//    $_SESSION["carrito"][$indice]->descuento = $_SESSION["carrito"][$indice]->cantidad * $descuento;
        $_SESSION["carrito"][$indice]->impu = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_ventapublico*$porcentaje_impuesto/100+ $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_ventapublico;
}
                  echo "<script>document.location='./pos.php'</script>";

