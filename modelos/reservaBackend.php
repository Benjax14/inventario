<?php

    include_once("conexion.php");

    $ConsultaProduc = "SELECT * FROM producto";
    $ConsultaPro = mysqli_query($con, $ConsultaProduc);
    
?>

<?php

    include_once("conexion.php");

    $id = mysqli_real_escape_string ($con, $_POST["clave"]);
    $nombre = mysqli_real_escape_string ($con, $_POST["nombre_cliente"]);
    $fono = mysqli_real_escape_string ($con, $_POST["fono_cliente"]);       
    $fecha = mysqli_real_escape_string ($con, $_POST["fecha"]);
    
    while($row = mysqli_fetch_array($ConsultaPro)){
        
        if($row['id'] == $id){

            $stock = $row['stock'];

            if($stock > 0){

            $CrearReserva="INSERT INTO reserva (nombre_cliente, num_cliente, fecha_arriendo, id_status) VALUES
            ('".$nombre."', '".$fono."', '".$fecha."', 1);";

            $CrearReservaSQL="INSERT INTO se_puede (id) VALUES
            ('".$id."');";

            $stoc = "UPDATE producto set  stock='".$stock."'-1 WHERE id='".$id."'";

            mysqli_query($con, $stoc);
            mysqli_query($con, $CrearReserva);
            mysqli_query($con, $CrearReservaSQL);    

            unset($_POST["clave"]);
            unset($_POST["nombre_cliente"]);
            unset($_POST["fono_cliente"]);
            unset($_POST["fecha"]);
                    
            echo '<script language="javascript">alert("Reserva exitosa!");window.location.href="../agendarReserva.php"</script>';
            //header("Location:../agendarReserva.php");

            }

        }

    }

    echo '<script language="javascript">alert("Hubo un error");window.location.href="../agendarReserva.php"</script>';
    //header("Location:../agendarReserva.php");
    
?>