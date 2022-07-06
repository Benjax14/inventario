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

    <?php include("./header.php"); ?>
    <?php require("./modelos/conexion.php"); ?>

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

                                        if(!empty($_POST['busqueda'])){
                                                
                                            $busqueda = mysqli_real_escape_string ($con, $_POST['busqueda']);

                                            $consultaBusqueda = "SELECT *, DATE_FORMAT(fecha_arriendo, '%d-%m-%Y') AS fecha_retiro FROM reserva WHERE nombre_cliente LIKE '%$busqueda%'";
                                            $consulta = mysqli_query($con, $consultaBusqueda);

                                            $producto = "SELECT * FROM producto, se_puede WHERE producto.id = se_puede.id";
                                            $pro = mysqli_query($con, $producto);

                                            $status = "SELECT * FROM status";
                                            $sta = mysqli_query($con, $status);

                                            while($rows = mysqli_fetch_array($consulta)){
                                                $reserva = $rows['id_reserva']; 
                                                $nombre = $rows['nombre_cliente'];
                                                $fono = $rows['num_cliente'];
                                                $mail = $rows['email'];
                                                $fecha = $rows['fecha_retiro'];
                                                $status = $rows['id_status'];
                                    ?>

                                    <td>
                                        <?php echo $rows['id_reserva']; ?>
                                    </td>

                                    <td>
                                    <?php foreach($pro as $row): ?>
                                        <?php if($row['id_reserva'] == $rows['id_reserva']){ ?>   
                                            <img width="80" height="80" src="data:image/*;base64,<?php echo base64_encode ($row['img']);?>">
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
                                        <?php echo $nombre; ?>
                                    </td>

                                    <td>
                                        +569 <?php echo $fono; ?>
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
                                <?php } } ?>
                            

                        </table>

                    </div>

            </div>

        </div>


    </div>

</body>