<?php

    include_once("conexion.php");

    $ConsultaID = "SELECT id FROM se_puede";
    $ConsultaIDP = mysqli_query($con, $ConsultaID);
    
?>

<?php

    include("conexion.php");

    foreach($ConsultaIDP as $row):
    $id_traje = $row['id']; 
    $id = $_POST['Prod'];

    if($id == $id_traje){

        echo '<script language="javascript">alert("Producto Reservado, no es posible eliminar");window.location.href="../index.php"</script>';

    }else{

    $sql = "DELETE FROM producto WHERE id = '".$id."'";
    mysqli_query($con, $sql);
    echo '<script language="javascript">alert("Producto Eliminado");window.location.href="../index.php"</script>';
    }

    endforeach;
    
?>