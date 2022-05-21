<?php
    include("conexion.php")
    
    $idProd = $_POST["Prod"];    

    $EliminarProducto="DELETE FROM producto WHERE id = '".$idProd."'";
    
    mysqli_query($con, $EliminarProducto);

    header("Location:../index.php");

?>    
