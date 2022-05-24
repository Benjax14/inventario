<?php

    include("conexion.php");

    $id = $_POST['Prod'];

    $sql = "DELETE FROM producto WHERE id = '".$id."'";
    mysqli_query($con, $sql);
    echo '<script language="javascript">alert("Producto Eliminado");window.location.href="../index.php"</script>';


?>