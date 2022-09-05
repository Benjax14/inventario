<?php

    //Se requiere la conexion a la Base de datos
    require_once("conexion.php");

    //Consulta para llamar la tabla de la reserva
    $ConsultaReserva = "SELECT * FROM reserva";
    $ConsultaRese = mysqli_query($con, $ConsultaReserva);

    //Consulta para llamar la tabla de los productos
    $ConsultaProduc = "SELECT * FROM producto";
    $ConsultaPro = mysqli_query($con, $ConsultaProduc);

    //Se reciben los datos del usuario a reservar y se limpian de posibles ataques
    $id = mysqli_real_escape_string ($con, strip_tags($_POST["clave"]));
    $nombre = mysqli_real_escape_string ($con, strip_tags($_POST["nombre_cliente"]));
    $fono = mysqli_real_escape_string ($con, strip_tags($_POST["fono_cliente"]));
    $rut = mysqli_real_escape_string ($con, strip_tags($_POST["rut"]));
    $correo = mysqli_real_escape_string ($con, strip_tags($_POST["email"]));       
    $fecha = mysqli_real_escape_string ($con, strip_tags($_POST["fecha"]));

    //Validación de si algún datos esta vacio, si es así devuelve a la pagina de agendar una reserva
    if(!empty($id) && !empty($nombre) && !empty($fono) && !empty($rut) && !empty($correo) && !empty($fecha)){

        /*Validación de si un cliente ya tiene dos reservas registradas ya que solo se permiten dos reservas 
        por usuario*/
        $validacion1 = mysqli_query($con, "SELECT * from reserva where nombre_cliente = '".$nombre."' AND rut = '".$rut."' AND num_cliente = '".$fono."' AND email = '".$correo."' ");       
        if(mysqli_num_rows($validacion1) == 1){

            $CrearReserva="INSERT INTO reserva (nombre_cliente, rut, num_cliente, email, fecha_arriendo, id_status) VALUES
            ('".$nombre."', '".$rut."', '".$fono."', '".$correo."', '".$fecha."', 1);";
                   
            $CrearReservaSQL="INSERT INTO se_puede (id) VALUES
            ('".$id."');";

            mysqli_query($con, $CrearReserva);
            mysqli_query($con, $CrearReservaSQL);
 
            foreach($ConsultaPro as $rows):
                if($rows['id'] == $id){

                    $stock = $rows['stock'];

                    $stoc = "UPDATE producto set stock='".$stock."'-1 WHERE id='".$id."'";
                    mysqli_query($con, $stoc);

                }    
            endforeach;

            unset($_POST["clave"]);
            unset($_POST["nombre_cliente"]);
            unset($_POST["rut"]);
            unset($_POST["fono_cliente"]);
            unset($_POST["email"]);
            unset($_POST["fecha"]);

            echo '<script language="javascript">alert("La reserva se ha guardado exitosamente.");window.location.href="../agendarReserva.php"</script>';

        }elseif(mysqli_num_rows($validacion1) > 1) {
            echo '<script language="javascript">alert("¡Ha ocurrido un error!, ya hay dos reservas registradas para este cliente."); window.location.href="../agendarReserva.php"</script>';
        }
        
        //Verificacion de si la tabla de la reserva esta vacia
        $num = mysqli_num_rows($ConsultaRese);
        if($num == 0){

            $CrearReserva="INSERT INTO reserva (nombre_cliente, rut, num_cliente, email, fecha_arriendo, id_status) VALUES
            ('".$nombre."', '".$rut."', '".$fono."', '".$correo."', '".$fecha."', 1);";

            $CrearReservaSQL="INSERT INTO se_puede (id) VALUES
            ('".$id."');";

            foreach($ConsultaPro as $rows):

                if($rows['id'] == $id){

                    $stock = $rows['stock'];

                    $stoc = "UPDATE producto set stock='".$stock."'-1 WHERE id='".$id."'";
                    mysqli_query($con, $stoc);

                }

            endforeach;

            mysqli_query($con, $CrearReserva);
            mysqli_query($con, $CrearReservaSQL);    

            unset($_POST["clave"]);
            unset($_POST["nombre_cliente"]);
            unset($_POST["rut"]);
            unset($_POST["fono_cliente"]);
            unset($_POST["email"]);
            unset($_POST["fecha"]);
                            
            echo '<script language="javascript">alert("La reserva se ha guardado exitosamente.");window.location.href="../agendarReserva.php"</script>';
        
        }

        /*Validación de si se ingresa una nueva reserva con datos de otro cliente
        Ej: si ya hay un usuario con una reserva con nombre Sebastián Jerez con rut 20.439.743-0 no puede 
        haber otro cliente con nombre Benjamín Contreras y con rut igual a 20.439.743-0*/ 
        $validacion2 = mysqli_query($con, "SELECT * from reserva where rut = '".$rut."'");
        if(mysqli_num_rows($validacion2) == 0){
            
            $CrearReserva="INSERT INTO reserva (nombre_cliente, rut, num_cliente, email, fecha_arriendo, id_status) VALUES
            ('".$nombre."', '".$rut."', '".$fono."', '".$correo."', '".$fecha."', 1);";
                   
            $CrearReservaSQL="INSERT INTO se_puede (id) VALUES
            ('".$id."');";

            mysqli_query($con, $CrearReserva);
            mysqli_query($con, $CrearReservaSQL);
 
            foreach($ConsultaPro as $rows):
                if($rows['id'] == $id){

                    $stock = $rows['stock'];

                    $stoc = "UPDATE producto set stock='".$stock."'-1 WHERE id='".$id."'";
                    mysqli_query($con, $stoc);

                }    
            endforeach;

            unset($_POST["clave"]);
            unset($_POST["nombre_cliente"]);
            unset($_POST["rut"]);
            unset($_POST["fono_cliente"]);
            unset($_POST["email"]);
            unset($_POST["fecha"]);

            echo '<script language="javascript">alert("La reserva se ha guardado exitosamente.");window.location.href="../agendarReserva.php"</script>';
            
        }elseif(mysqli_num_rows($validacion2) >= 1){

            echo '<script language="javascript">alert("¡Ha ocurrido un error!, El RUT no corresponde al cliente."); window.location.href="../agendarReserva.php"</script>';
    
        }
           
    }else{
        header("location:../agendarReserva.php");
    }
    
?>
