<?php

require_once("conexion.php");

$consultaPuede = "SELECT * FROM se_puede ORDER BY id_reserva DESC";
$consultaPue = mysqli_query($con, $consultaPuede);

$consultaReserva = "SELECT *, DATE_FORMAT(fecha_arriendo, '%d-%m-%Y') AS fecha_retiro FROM reserva";
$consultaRes = mysqli_query($con, $consultaReserva);

$produc = "SELECT * FROM producto, tallas where producto.id_talla=tallas.id_talla";
$pro = mysqli_query($con, $produc);

$statu = "SELECT * FROM status, reserva WHERE status.id_status=reserva.id_status";
$sta = mysqli_query($con, $statu);

?>