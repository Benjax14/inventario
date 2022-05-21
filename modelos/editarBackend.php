<?php
    include("conexion.php");
    
    if(!empty($_POST)) {
        
        $id = mysqli_real_escape_string ($con, $_POST["clave"]);
        $marca_produc = mysqli_real_escape_string ($con, $_POST["marca_produc"]);
        $nombre_produc = mysqli_real_escape_string ($con, $_POST["nombre_produc"]);
        $talla = mysqli_real_escape_string ($con, $_POST["select_talla"]);
        $precio = mysqli_real_escape_string ($con, $_POST["precio"]);
        $stock = mysqli_real_escape_string ($con, $_POST["stock"]);
        $categoria = mysqli_real_escape_string ($con, $_POST["select_cat"]);
        $estado = mysqli_real_escape_string ($con, $_POST["select"]);

        $consultaEditar = "UPDATE producto set marca='".$marca_produc."', nombre='".$nombre_produc."', id_estado='".$estado."', precio='".$precio."', stock='".$stock."', id_talla='".$talla."', id_cat='".$categoria."' WHERE id='".$id."'";
        mysqli_query($con, $consultaEditar);

        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["select_talla"]);
        unset($_POST["precio"]);
        unset($_POST["stock"]);
        unset($_POST["select_cat"]);
        unset($_POST["select"]);    

        header("Location:../index.php");
         
    }
    
?>