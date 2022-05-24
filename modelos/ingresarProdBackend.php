<?php
    include_once("conexion.php");
    
    if(!empty($_POST)){
        
        $marca_produc = mysqli_real_escape_string ($con, $_POST["marca_produc"]);
        $nombre_produc = mysqli_real_escape_string ($con, $_POST["nombre_produc"]);
        $talla = mysqli_real_escape_string ($con,$_POST["select_talla"]);
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $precio = mysqli_real_escape_string ($con, $_POST["precio"]);
        $color = mysqli_real_escape_string ($con, $_POST["select_color"]);
        $stock = mysqli_real_escape_string ($con, $_POST["stock"]);
        $categoria = mysqli_real_escape_string ($con,$_POST["select"]);

        $CrearproductoSql="INSERT INTO producto (marca, nombre, id_talla, precio, id_col, stock, id_cat, img, id_estado) VALUES
        ('".$marca_produc."','".$nombre_produc."','".$talla."','".$precio."','".$color."','".$stock."','".$categoria."','".$imagen."', 1);";
    
        mysqli_query($con, $CrearproductoSql);
        
        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["select_talla"]);
        unset($_POST["precio"]);
        unset($_POST['select_color']);
        unset($_POST["stock"]);
        unset($_POST["select"]);
        
        header("Location:../ingresarProducto.php");

    }
    
?>