<?php
    include_once("conexion.php");
    
    if(!empty($_POST)){
        
        $marca_produc = mysqli_real_escape_string ($con, $_POST["marca_produc"]);
        $nombre_produc = mysqli_real_escape_string ($con, $_POST["nombre_produc"]);
        $talla = $_POST["select_talla"];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $precio = mysqli_real_escape_string ($con, $_POST["precio"]);
        $stock = mysqli_real_escape_string ($con, $_POST["stock"]);
        $categoria = $_POST["select"];

        $CrearproductoSql="INSERT INTO producto (marca, nombre, id_talla, precio, stock, id_cat, img, id_estado) VALUES
        ('$marca_produc','$nombre_produc',".$talla.",".$precio.",".$stock.",".$categoria.",'$imagen', 1);";
    
        $Crearproducto = mysqli_query($con, $CrearproductoSql);
        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["select_talla"]);
        unset($_POST["precio"]);
        unset($_POST["stock"]);
        unset($_POST["select"]);    

        $hostHeader = $_SERVER['HTTP_HOST'];
        $phpHeader = 'ingresarProducto.php';
        $urlHeader = "https://$hostHeader/$phpHeader";        
        //header("Location: $urlHeader");
        
        header("Location:/inventario/ingresarProducto.php");

    }
    
?>