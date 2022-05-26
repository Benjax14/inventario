<?php

    require("conexion.php");

    $consultaPuede = "SELECT * FROM se_puede";
    $consultaPue = mysqli_query($con, $consultaPuede);

?>

<?php

    require("conexion.php");    

    $id = $_POST['prod'];

    while($data = mysqli_fetch_array($consultaPue)){
            if($data['id'] == $id){
                echo '<script language="javascript">alert("Producto se encuentra reservado");window.location.href="../index.php"</script>';
            }
    }

    $eliminar = "DELETE FROM producto WHERE id = '".$id."' ";
    mysqli_query($con, $eliminar);

    echo '<script language="javascript">alert("Producto eliminado!");window.location.href="../index.php"</script>';
    //header("location:../index.php");


?>
