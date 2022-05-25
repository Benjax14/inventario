<?php

    require("conexion.php");

    $consultaPuede = "SELECT * FROM se_puede";
    $consultaPue = mysqli_query($con, $consultaPuede);

?>

<?php

    require("conexion.php");    

    $id = $_POST['prod'];

    foreach($consultaPue as $row):

    $id_pro = $row['id'];

    if($id == $id_pro){
        
        echo '<script language="javascript">alert("Producto se encuentra reservado");window.location.href="../index.php"</script>'; 
    
    }else{
    
        $eliminar = "DELETE FROM producto WHERE id = '".$id."' ";
        mysqli_query($con, $eliminar);

        echo '<script language="javascript">alert("Producto eliminado!");window.location.href="../index.php"</script>';
        //header("location:../index.php");
    }

    endforeach

?>
