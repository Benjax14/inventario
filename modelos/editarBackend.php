<?php
    include("conexion.php");
    
    if(!empty($_POST)) {
        
        $id = mysqli_real_escape_string ($con, $_POST["clave"]);
        $marca_produc = mysqli_real_escape_string ($con, $_POST["marca_produc"]);
        $nombre_produc = mysqli_real_escape_string ($con, $_POST["nombre_produc"]);
        $talla = $_POST["select_talla"];
        //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $precio = mysqli_real_escape_string ($con, $_POST["precio_pr"]);
        $stock = mysqli_real_escape_string ($con, $_POST["stock"]);
        $categoria = $_POST["select_cat"];
        $estado = $_POST["select"];
        $consultaEditar = "UPDATE producto set marca='".$marca_produc."', nombre='".$nombre_produc."', id_estado='".$estado."', precio='".$precio."', stock='".$stock."', id_talla='".$talla."', id_cat='".$categoria."' WHERE id='".$id."'";
        $aux = mysqli_query($con, $consultaEditar);
        //echo $consultaEditar;
        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["stock"]);
        unset($_POST["precio_pr"]);
        unset($_POST["select_talla"]);
        unset($_POST["select_cat"]);
        unset($_POST["select"]);    

        header("Location:../index.php");
        
    }
    
?>