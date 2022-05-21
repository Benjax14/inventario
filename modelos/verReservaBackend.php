<?php

require_once("conexion.php");

$consultaPuede = "SELECT * FROM se_puede";
$consultaPue = mysqli_query($con, $consultaPuede);

$consultaReserva = "SELECT * FROM reserva";
$consultaRes = mysqli_query($con, $consultaReserva);

$produc = "SELECT * FROM producto";
$pro = mysqli_query($con, $produc);

$statu = "SELECT * FROM status";
$sta = mysqli_query($con, $statu)

?>