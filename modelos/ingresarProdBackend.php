<?php
include_once("conexion.php");
$consultaNombre = "SELECT nombre FROM producto";
$consultaNombreC = mysqli_query($con,$consultaNombre);
?>



<?php
    include_once("conexion.php");
    
    if(!empty($_POST)){
        
        $marca_produc = mysqli_real_escape_string ($con, $_POST["marca_produc"]);
        $nombre_produc = mysqli_real_escape_string ($con, $_POST["nombre_produc"]);
        $talla = mysqli_real_escape_string ($con,$_POST["select_talla"]);
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $precio = mysqli_real_escape_string ($con, $_POST["precio"]);
        $stock = mysqli_real_escape_string ($con, $_POST["stock"]);
        $categoria = mysqli_real_escape_string ($con,$_POST["select"]);


        foreach($consultaNombreC as $row):
        $nombre = $row['nombre'];
        if($nombre == $nombre_produc){

            echo '<script language="javascript">alert("Nombre ya ingresado, modifiquelo");window.location.href="../ingresarProducto.php"</script>';
            
        }else{
        $CrearproductoSql="INSERT INTO producto (marca, nombre, id_talla, precio, stock, id_cat, img, id_estado) VALUES
        ('".$marca_produc."','".$nombre_produc."','".$talla."','".$precio."','".$stock."','".$categoria."','".$imagen."', 1);";
    
        mysqli_query($con, $CrearproductoSql);
        
        unset($_POST["marca_produc"]);
        unset($_POST["nombre_produc"]);
        unset($_POST["select_talla"]);
        unset($_POST["precio"]);
        unset($_POST["stock"]);
        unset($_POST["select"]);    
        
        header("Location:../ingresarProducto.php");
    }
endforeach;
    }
    
?>