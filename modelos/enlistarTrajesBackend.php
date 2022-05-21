<?php

require_once("conexion.php");

$consultaEstado = "SELECT * FROM estado";
$consultaEst = mysqli_query($con, $consultaEstado);

$consultaTalla = "SELECT * FROM tallas";
$consultaTal = mysqli_query($con, $consultaTalla);

$consultaCategoria = "SELECT * FROM categorias";
$consultaCat = mysqli_query($con, $consultaCategoria);

$produc = "SELECT * FROM producto";
$pro = mysqli_query($con, $produc);

?>