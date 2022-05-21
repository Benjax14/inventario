<?php
    include_once("conexion.php");
    
    if(!empty($_POST)){
        
        $res = mysqli_real_escape_string ($con, $_POST["rese"]);
        $prod = mysqli_real_escape_string ($con, $_POST["produ"]);
        $des = mysqli_real_escape_string ($con, $_POST["descripcion"]);

        $resumen="INSERT INTO historial (id_reserva, id, descripcion) VALUES
        ('".$res."','".$prod."','".$des."');";

        $deleteReserva = "DELETE FROM se_puede WHERE (id_reserva = '".$res."')";

        $deleteReserva2 = "DELETE FROM reserva WHERE (id_reserva = '".$res."')";
    
        mysqli_query($con, $resumen);
        mysqli_query($con, $deleteReserva);
        mysqli_query($con, $deleteReserva2);
        
        unset($_POST["rese"]);
        unset($_POST["produ"]);
        unset($_POST["descripcion"]);    
        
        header("Location:../verReserva.php");

    }
    
?>