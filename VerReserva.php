<body>

    <link rel="stylesheet" href="./css/buscador.css">

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

    <?php include('./header.php'); ?>
    <?php include('./modelos/verReservaBackend.php'); ?>
    
    <div class="container mt-5">

        <div class="buscar">

            <form action="./busquedaReservas.php" method="POST">

                <input type="text" name="busqueda" class="src" placeholder="Escriba aqui para buscar">
                
            </form>

        </div>    

        <div class="row justify-content-center">

            <div class="col-md-12 mt-3">

                    <div>
                        <h2>Listado de reservas activas</h2>
                    </div>

                    <hr>
                    
                    <div class="resp-table">

                        <table class="table table-striped table-bordered">

                                <tr>
                                    <th>ID</th>
                                    <th>Marca</th>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Nombre del cliente</th>
                                    <th>Numero del cliente</th>
                                    <th>Correo electronico</th>
                                    <th>Fecha de retiro</th>
                                    <th>Estado de la reserva</th>
                                    <th>Acciones</th>
                                </tr>
                            
                                <tr>

                                    <?php
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
                                                <a href="verImagen.php?id=<?php echo $row['id']; ?>"><img width="80" height="80" src="data:image/*;base64,<?php echo base64_encode ($row['img']);?>"></a>
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
                                        +569        
                                        <?php  
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

                                                <?php } ?>   
                                            <?php endforeach ?>
                                    </td>

                                    <td>
                                    <form action="./modelos/eliminarReservaBackend.php" method="POST">

                                        <select class="mostrarnt" name="res">                               
                                            <option selected value="<?php echo $reserva; ?>"></option>                                                                                  
                                        </select>

                                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"> <img class="me-2" src="lmnts_grfcs/eliminar.png" width="20" height="20"></button>        

                                    </form>
                                    </td>

                                    
                                </tr>
                                <?php } ?>
                            

                        </table>

                    </div>

            </div>

        </div>


    </div>

</body>