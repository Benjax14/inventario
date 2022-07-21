<?php
    include("conexion.php");
    
    if(!empty($_POST)) {
        
        $id_res = mysqli_real_escape_string ($con, $_GET["id_res"]);
        $id_status = mysqli_real_escape_string ($con, $_POST["select_status"]);

        $consultaEditar = "UPDATE reserva set id_status='".$id_status."' WHERE id_reserva='".$id_res."'";
        mysqli_query($con, $consultaEditar);

        unset($_POST["select_status"]);

        echo '<script language="javascript">alert("Actualizacion realizada correctamente");window.location.href="../verReserva.php"</script>';
        //header("Location:../index.php");
         
    }
    
?>