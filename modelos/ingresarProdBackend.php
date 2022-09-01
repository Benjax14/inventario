<?php
    include_once("conexion.php");
    
    if(!empty($_POST) && empty($_FILES['imagen']['tmp_name'])){
        echo 'No se ha sido encontrado el archivo';
        exit();
    }
    if(!empty($_POST)){
        
        $marca_produc = mysqli_real_escape_string ($con, strip_tags($_POST["marca_produc"]));
        $nombre_produc = mysqli_real_escape_string ($con, strip_tags($_POST["nombre_produc"]));
        $talla = mysqli_real_escape_string ($con, strip_tags($_POST["select_talla"]));
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $precio = mysqli_real_escape_string ($con, strip_tags($_POST["precio"]));
        $color = mysqli_real_escape_string ($con, strip_tags($_POST["select_color"]));
        $stock = mysqli_real_escape_string ($con, strip_tags($_POST["stock"]));
        $categoria = mysqli_real_escape_string ($con, strip_tags($_POST["select"]));
        $genero = mysqli_real_escape_string ($con, strip_tags($_POST["select_gen"]));
        $tam_imagen = addslashes(file_get_contents($_FILES['imagen']['size']));
        $tip_imagen = addslashes(file_get_contents($_FILES['imagen']['type']));

        //validacion datos imagen
        if($tam_imagen>1000000){
            echo '<script language="javascript">alert("archivo de imagen demasiado pesado"); window.location.href="../ingresarProducto.php"</script>';
            exit();

        }else{
            if($tip_imagen!="image/jpg" || $tip_imagen!="image/jpeg" || $tip_imagen!="image/png"){
                echo '<script language="javascript">alert("solo se permite fotos con formato: jpg/jpeg/png"); window.location.href="../ingresarProducto.php"</script>';
                exit();
        }
        }
        $CrearproductoSql="INSERT INTO producto (marca, nombre, id_talla,id_gen ,precio , id_col, stock, id_cat, img, id_estado) VALUES
        ('".$marca_produc."','".$nombre_produc."','".$talla."','".$genero."','".$precio."','".$color."','".$stock."','".$categoria."','".$imagen."', 1);";
        $ver_nombre = mysqli_query($con, "SELECT * from producto where nombre ='$nombre_produc'");
        
        if(mysqli_num_rows($ver_nombre) > 0){
            echo '<script language="javascript">alert("Nombre ya ingresado, modifíquelo"); window.location.href="../ingresarProducto.php"</script>';
            exit();
        }
    
        mysqli_query($con, $CrearproductoSql);
        
        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["select_talla"]);
        unset($_POST["precio"]);
        unset($_POST['select_color']);
        unset($_POST["stock"]);
        unset($_POST["select"]);
        unset($_POST["select_gen"]);
        
        header("Location:../ingresarProducto.php");

    }
    
?>