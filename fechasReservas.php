<body>

    <?php include("./header.php"); ?>
    <?php require("./modelos/conexion.php"); ?>

    <div class="container mt-5">    

        <div class="row justify-content-center">

            <div class="col-md-12 mt-3">

                <div class="col-sm-12 d-flex justify-content-center">
                    <h1>Listado de reservas activas</h1>
                </div>

                    <hr>
                    
                    <div class="resp-table">

                        <table class="table table-striped table-bordered">

                                <tr>
                                    <th>Marca</th>
                                    <th>Imagen</th>
                                    <th>Título</th>
                                    <th>Talla</th>
                                    <th>Nombre del cliente</th>
                                    <th>Rut del cliente</th>
                                    <th>Número del cliente</th>
                                    <th>Correo electrónico</th>
                                    <th>Fecha de retiro</th>
                                    <th>Estado de la reserva</th>
                                    <th>Acciones</th>
                                </tr>
                            
                                <tr>

                                    <?php

                                        if(!empty($_POST['f1']) && !empty($_POST['f2'])){
                                                
                                            $f1 = mysqli_real_escape_string ($con, strip_tags($_POST['f1']));
                                            $f2 = mysqli_real_escape_string ($con, strip_tags($_POST['f2']));

                                            $consultaBusqueda = "SELECT *, DATE_FORMAT(fecha_arriendo, '%d-%m-%Y') AS fecha_retiro FROM reserva WHERE fecha_arriendo BETWEEN '$f1' AND '$f2'";
                                            $consulta = mysqli_query($con, $consultaBusqueda);

                                            $producto = "SELECT * FROM producto, se_puede WHERE producto.id = se_puede.id";
                                            $pro = mysqli_query($con, $producto);

                                            $talla = "SELECT * FROM tallas, producto WHERE tallas.id_talla = producto.id_talla";
                                            $tal = mysqli_query($con, $talla);

                                            $status = "SELECT * FROM status";
                                            $sta = mysqli_query($con, $status);

                                            $fech = date('Y-m-d');

                                            function formateo_rut($rut_param){

                                                $parte1 = substr($rut_param, 0, 2);
                                                $parte2 = substr($rut_param, 2, 3);
                                                $parte3 = substr($rut_param, 5, 3);
                                                $parte4 = substr($rut_param, 8);
    
                                                return $parte1.".".$parte2.".".$parte3."-".$parte4;
                                                
                                            }

                                            while($rows = mysqli_fetch_array($consulta)){
                                                $reserva = $rows['id_reserva']; 
                                                $nombre = $rows['nombre_cliente'];
                                                $rut = $rows['rut'];
                                                $fono = $rows['num_cliente'];
                                                $mail = $rows['email'];
                                                $fecha = $rows['fecha_retiro'];
                                                $status = $rows['id_status'];
                                    ?>

                                    <td>
                                        <?php foreach($pro as $row): ?>
                                            <?php if($row['id_reserva'] == $rows['id_reserva']){ ?> 
                                                <?php $producto = $row['id'];?> 
                                                <a data-bs-toggle="modal" data-bs-target="#imagen<?php echo $producto; ?>"><img width="80" height="80" src="data:image/*;base64,<?php echo base64_encode ($row['img']);?>"></a>
                                            <?php } ?>   
                                        <?php endforeach ?>
                                    </td>

                                    <td>
                                        <?php 
                                            foreach($pro as $row): 
                                                if($row['id_reserva'] == $rows['id_reserva']){    
                                                    echo $row['marca'];
                                                }    
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php 
                                            foreach($pro as $row): 
                                                if($row['id_reserva'] == $rows['id_reserva']){    
                                                    echo $row['nombre'];
                                                }    
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php 
                                            foreach($tal as $row): 
                                                if($row['id'] == $row['id']){    
                                                    echo $row['nom_talla'];
                                                }    
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php echo $nombre; ?>
                                    </td>

                                    <td>
                                        <?php echo formateo_rut($rut); ?>
                                    </td>

                                    <td>
                                        +569<?php echo $fono; ?>
                                    </td>

                                    <td>
                                        <?php echo $mail; ?>
                                    </td>

                                    <td>
                                        <?php echo $fecha; ?>
                                    </td>

                                    <td>
                                        <?php foreach($sta as $row): ?> 
                                            <?php if($row['id_status'] == $status){ ?> 
                                                <?php $status = $row['nom_status']; ?>

                                                <?php if($fech > $rows['fecha_arriendo'] && $row['id_status'] == 1){?>

                                                    <img src="lmnts_grfcs/rojo.png" width="20" height="20"> 
                                                    Expirado

                                                <?php }else{ ?>

                                                    <?php if($row['id_status'] == 2){ ?>
                                                        <img src="lmnts_grfcs/verde.png" width="20" height="20"> 
                                                        <?php echo $status; ?>
                                                    <?php } ?>

                                                    <?php if($row['id_status'] == 1){ ?>
                                                        <img src="lmnts_grfcs/amarillo.png" width="20" height="20"> 
                                                        <?php echo $status; ?>
                                                    <?php } ?>

                                                    <?php if($row['id_status'] == 3){ ?>
                                                        <img src="lmnts_grfcs/rojo.png" width="20" height="20"> 
                                                        <?php echo $status; ?>
                                                    <?php } ?>

                                                <?php }?>

                                            <?php } ?>   
                                        <?php endforeach ?>
                                    </td>

                                    <td>
                                    <form action="./modelos/eliminarReservaBackend.php?res=<?php echo $reserva; ?>" method="POST">

                                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"> <img class="me-2" src="lmnts_grfcs/eliminar.png" width="20" height="20"></button>        

                                    </form>

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStatus<?php echo $reserva; ?>">
                                        <img class="me-2" src="lmnts_grfcs/editar.png" width="20" height="20">
                                    </button>
                                    </td>
                                    
                                </tr>

                                <!--Modal para la edición del estado-->

                                <div class="modal fade" id="editStatus<?php echo $reserva; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Estado de la reserva</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="./modelos/edicionStatusBackend.php?id_res=<?php echo $reserva; ?>">
                                                <div>
                                                    <h6>Seleccione el nuevo estado</h6>
                                                        <select name="select_status" id="select_status" class="form-select">

                                                            <option value="1">En espera</option>
                                                            <option value="2">Confirmada</option>
                                                            <!--<option value="3">Cancelada</option>-->
       
                                                        </select>       
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                                            </div>
                                        </div>
                                            </form>
                                    </div>
                                </div>

                                <!---->
                                
                                <!--Modal para mostrar imagen-->

                                <?php foreach($pro as $row): ?>
                                <?php if($producto == $row['id']){ ?>
                                    <div class="modal fade" id="imagen<?php echo $producto; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">         
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nombre'];?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                        <img height="450" width="450" src="data:image/*;base64,<?php echo base64_encode($row['img']);?>">                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php endforeach ?>

                                <!---->

                                <?php } } ?>
                            
                        </table>

                    </div>

            </div>

        </div>

    </div>

    <!--Script de confirmacion a la eliminacion de una reserva-->

    <script type="text/javascript">
        function confirmDelete(){
           var respuesta = confirm("¿Esta seguro/a que desea eliminar esta reservación?");
           if(respuesta == true){
               return true;
           }
           else{
               return false;
           } 
        }
    </script>

    <!---->

</body>