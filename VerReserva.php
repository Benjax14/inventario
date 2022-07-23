<body>

    <link rel="stylesheet" href="./css/buscador.css">

    <?php include('./header.php'); ?>
    <?php include('./modelos/verReservaBackend.php'); ?>
    
    <div class="container mt-5">

        <div class="row justify-content-center">

                <div class="col-sm-12 d-flex justify-content-center">
                    <h1>Listado de reservas activas</h1>
                </div>

                <div class="buscar">

                    <form action="./busquedaReservas.php" method="POST">

                        <input type="text" name="busqueda" class="src" placeholder="Escriba aqui para buscar un cliente">
                
                    </form>

                </div>

               
                <div class="col">
                    <h6>Buscar por rango de fechas</h6>
                    <form action="./fechasReservas.php" method="POST">
                        <input type="date" name="f1" required>
                        <input type="date" name="f2" required>
                        <button>Buscar</button>
                    </form>
                </div>        

                    <hr>
                    
                    <div class="resp-table">

                        <table class="table table-striped table-bordered">

                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Marca</th>
                                    <th>Título</th>
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

                                        function formateo_rut($rut_param){

                                            $parte1 = substr($rut_param, 0, 2);
                                            $parte2 = substr($rut_param, 2, 3);
                                            $parte3 = substr($rut_param, 5, 3);
                                            $parte4 = substr($rut_param, 8);

                                            return $parte1.".".$parte2.".".$parte3."-".$parte4;
                                            
                                        }

                                        $date = date("Y-m-d");

                                        while($rows = mysqli_fetch_array($consultaPue)){
                                            $reserva = $rows['id_reserva'];
                                            $producto = $rows['id'];
                                            
                                    ?>

                                    <td>
                                        <?php
                                            foreach($pro as $row):
                                                if($row['id'] == $producto){
                                                    echo $reserva;
                                                }
                                            endforeach    
                                        ?>
                                    </td>

                                    <td>
                                        <?php foreach($pro as $row): ?>
                                            <?php if($row['id'] == $producto){ ?>   
                                                <a data-bs-toggle="modal" data-bs-target="#imagen<?php echo $producto; ?>"><img width="80" height="80" src="data:image/*;base64,<?php echo base64_encode ($row['img']);?>"></a>
                                            <?php } ?>   
                                        <?php endforeach ?>
                                    </td>

                                    <td>
                                        <?php
                                            foreach($pro as $row):
                                                if($row['id'] == $producto){
                                                    echo $row['marca'];
                                                }
                                            endforeach    
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                            foreach($pro as $row):
                                                if($row['id'] == $producto){
                                                    echo $row['nombre'];
                                                }
                                            endforeach    
                                        ?>
                                    </td>

                                    <td>
                                        <?php 
                                            foreach($consultaRes as $row):
                                                if($row['id_reserva'] == $reserva){   
                                                    echo $row['nombre_cliente']; 
                                                }    
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                            foreach($consultaRes as $row):
                                                $rut = $row['rut'];
                                                if($row['id_reserva'] == $reserva){   
                                                    echo formateo_rut($rut); 
                                                }    
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>        
                                    +569<?php  
                                            foreach($consultaRes as $row): 
                                                if($row['id_reserva'] == $reserva){    
                                                    echo $row['num_cliente'];
                                                }   
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php 
                                            foreach($consultaRes as $row):
                                                if($row['id_reserva'] == $reserva){   
                                                    echo $row['email']; 
                                                }    
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php 
                                            foreach($consultaRes as $row): 
                                                if($row['id_reserva'] == $reserva){ 
                                                    $fecha = $row['fecha_retiro'];
                                                    echo $fecha; 
                                                }   
                                            endforeach 
                                        ?>
                                    </td>

                                    <td>
                                        <?php foreach($sta as $row): ?> 
                                                <?php if($row['id_reserva'] == $reserva){ ?> 
                                                    <?php $status = $row['nom_status']; ?>

                                                    <?php if($row['id_status'] == 2){ ?>
                                                        <img src="lmnts_grfcs/verde.png" width="20" height="20"> 
                                                        <br>
                                                        <?php echo $status; ?>
                                                    <?php } ?>

                                                    <?php if($row['id_status'] == 1){ ?>
                                                        <img src="lmnts_grfcs/amarillo.png" width="20" height="20"> 
                                                        <br>
                                                        <?php echo $status; ?>
                                                    <?php } ?>

                                                    <?php if($row['id_status'] == 3){ ?>
                                                        <img src="lmnts_grfcs/rojo.png" width="20" height="20"> 
                                                        <br>
                                                        <?php echo $status; ?>
                                                    <?php } ?>
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
                                                    <h6>Seleccione el estado</h6>
                                                        <select name="select_status" id="select_status" class="form-select">

                                                            <option value="1">En espera</option>
                                                            <option value="2">Confirmada</option>
                                                            <option value="3">Cancelada</option>
       
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

                                    <div class="modal fade" id="imagen<?php echo $producto; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <?php foreach($pro as $row): ?>
                                                        <?php if($row['id'] == $producto){ ?>
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nombre'];?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                                <img height="450" width="450" src="data:image/*;base64,<?php echo base64_encode($row['img']);?>">
                                                            <?php } ?>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!---->
                                
                                <?php } ?>
                            

                        </table>

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