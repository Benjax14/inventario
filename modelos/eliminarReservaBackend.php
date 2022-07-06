<?php

    require_once("conexion.php");
        
    $res = mysqli_real_escape_string ($con, $_POST['res']);

    $deleteReserva = "DELETE FROM se_puede WHERE id_reserva = '".$res."' ";
    mysqli_query($con, $deleteReserva);
    
    $deleteReservaSQL = "DELETE FROM reserva WHERE id_reserva = '".$res."' ";
    mysqli_query($con, $deleteReservaSQL);
        
    echo '<script language="javascript">alert("La reserva se ha eliminado exitosamente");window.location.href="../verReserva.php"</script>';
    
?>