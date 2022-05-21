<?php

    include("conexion.php");

    $id = $_POST['Prod'];

    $sql = "DELETE FROM producto WHERE id = '".$id."'";
    mysqli_query($con, $sql);

    header("Location:../index.php");
    
?>