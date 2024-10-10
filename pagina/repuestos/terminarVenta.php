<?php
if(!isset($_POST["total"])) exit;
include('../layout/dbcon.php');

session_start();

$descuento=0;
$total = $_POST["total"];
$idcliente = $_POST["cliente"];
$idempleado = $_POST["idempleado"];
$idsucursal = $_POST["idsucursal"];
$tipo_pedido = $_POST["tipo_pedido"];
$tipo_comprobante = $_POST["tipo_comprobante"];
$num_comprobante = $_POST["num_comprobante"];
$serie_comprobante = $_POST["serie_comprobante"];
$fecha = $_POST["fecha"];
$tipo_venta = $_POST["tipo_venta"];
$impuesto = $_POST["impuesto"];
$monto_pagado = $_POST["monto_pagado"];

$sub_total=0;
	$igv=$impuesto*$total/100;
				$sub_total=$total+$igv;

//$vuelto=$total



$ahora = date("Y-m-d H:i:s");
$sentencia_pedido = $base_de_datos->prepare("INSERT INTO pedido(idcliente, idempleado,idsucursal,tipo_pedido,fecha,numero,estado) VALUES (?, ?, ?,?, ?, ?,?);");
$sentencia_pedido->execute([$idcliente, $idempleado,$idsucursal,$tipo_pedido,$fecha,'','A']);

$sentencia = $base_de_datos->prepare("SELECT idpedido FROM pedido ORDER BY idpedido DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idpedido = $resultado === false ? 1 : $resultado->idpedido;


$sentencia = $base_de_datos->prepare("INSERT INTO venta(idpedido, idempleado,tipo_venta,tipo_comprobante,serie_comprobante,num_comprobante,fecha,impuesto,total,estado) VALUES (?, ?, ?,?, ?, ?, ?,?, ?, ?);");
$sentencia->execute([$idpedido, $idempleado,$tipo_venta, $tipo_comprobante,$serie_comprobante, $num_comprobante,$fecha, $impuesto,$total,'A']);

$sentencia = $base_de_datos->prepare("SELECT idventa FROM venta ORDER BY  	idventa DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idventa = $resultado === false ? 1 : $resultado->idventa;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO detalle_pedido(idpedido, iddetalle_ingreso, cantidad, precio_venta, descuento) VALUES (?, ?, ?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE detalle_ingreso SET stock_actual = stock_actual - ? WHERE iddetalle_ingreso = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$idpedido, $producto->iddetalle_ingreso, $producto->cantidad, $producto->precio_ventapublico,$descuento]);

			/*$update=mysqli_query($con,"update detalle_ingreso set stock_actual=stock_actual-'$producto->cantidad' where estado='abierto' and  	iddetalle_ingreso='$$producto->iddetalle_ingreso' ");
*/
	$sentenciaExistencia->execute([$producto->cantidad, $producto->iddetalle_ingreso]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];


			$update=mysqli_query($con,"update caja set monto=monto+'$sub_total' where estado='abierto' and idsucursal='$idsucursal' ");


if ($tipo_venta=='Credito') {
	       echo "<script>document.location='../ventas/asignar_credito_pos.php?idventa=$idventa'</script>";
}
if ($tipo_venta=='Contado') {

				    $update=mysqli_query($con,"update caja set monto=monto+'$total' where estado='abierto'  and idsucursal='$idsucursal' ");
	       echo "<script>document.location='../ventas/lista_ventas.php'</script>";
}


?>