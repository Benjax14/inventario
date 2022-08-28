<?php
    include("conexion.php");
    
    if(!empty($_POST)) {
        
        $id = mysqli_real_escape_string ($con, strip_tags($_POST["clave"]));
        $marca_produc = mysqli_real_escape_string ($con, strip_tags($_POST["marca_produc"]));
        $nombre_produc = mysqli_real_escape_string ($con, strip_tags($_POST["nombre_produc"]));
        $talla = mysqli_real_escape_string ($con, strip_tags($_POST["select_talla"]));
        $precio = mysqli_real_escape_string ($con, strip_tags($_POST["precio"]));
        $stock = mysqli_real_escape_string ($con, strip_tags($_POST["stock"]));
        $color = mysqli_real_escape_string ($con, strip_tags($_POST["select_color"]));
        $genero = mysqli_real_escape_string ($con, strip_tags($_POST["select_gen"]));
        $categoria = mysqli_real_escape_string ($con, strip_tags($_POST["select_cat"]));
        //$estado = mysqli_real_escape_string ($con, $_POST["select"]);

        $consultaEditar = "UPDATE producto set marca='".$marca_produc."', nombre='".$nombre_produc."', precio='".$precio."', id_col='".$color."', stock='".$stock."', id_talla='".$talla."', id_gen='".$genero."' , id_cat='".$categoria."' WHERE id='".$id."'";
        mysqli_query($con, $consultaEditar);

        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["select_talla"]);
        unset($_POST["precio"]);
        unset($_POST["stock"]);
        unset($_POST["select_gen"]);
        unset($_POST["select_cat"]);
        //unset($_POST["select"]);    

        header("Location:../index.php");
         
    }
    
?>