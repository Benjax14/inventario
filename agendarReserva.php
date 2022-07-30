<body>
    
    <?php include('./header.php');?>
    <?php include('./modelos/enlistarTrajesBackend.php');?>

    <link rel="stylesheet" type="text/css" href="./css/select2.min.css">

    <div class="container mt-3 pb-5 pt-3 cont-css">
        <form action="./modelos/reservaBackend.php" method="POST" enctype="multipart/form-data" name="formulario" onsubmit="return checkInputs();">
            <div class="row justify-content-center">
                <div class="col-auto"> 
                    <h1>Reservación</h1>
                </div>
            </div>
            
            <hr>
        
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Selector de trajes/vestidos/accesorios</h6>
                    <label>Los productos registrados son los siguientes:</label>
                    <section>
                        <select name="clave" id="controlBuscador" style="width: 100%">
                            <option>-Seleccione el producto-</option>
                            <?php while($rows = mysqli_fetch_array($pro)){?>
                                <?php if($rows['stock'] > 0 ){ ?>
                                <option value="<?php echo $rows[0];?>">
                                    *
                                    <?php echo $rows[1];?>
                                    -
                                    <?php echo $rows[2];?>
                                    -
                                    $<?php echo $rows[5];?>
                                    -
                                    <?php
                                        foreach($consultaCol as $row):
                                            if($rows['id_col'] == $row['id_col']){ 
                                                echo $row['nom_col'];
                                            }
                                        endforeach   
                                    ?>
                                    -
                                    <?php
                                        foreach($consultaTal as $row):
                                            if($rows['id_talla'] == $row['id_talla']){ 
                                                echo $row['nom_talla'];
                                            }
                                        endforeach   
                                    ?>
                                    -
                                    <?php
                                        foreach($consultaCat as $row):
                                            if($rows['id_cat'] == $row['id_cat']){ 
                                                echo $row['nom_cat'];
                                            }
                                        endforeach   
                                    ?>
                                </option>
                                <?php }else{ ?>
                                    <option disabled>
                                    *    
                                    <?php echo $rows[1];?>
                                    -
                                    <?php echo $rows[2];?>
                                    -
                                    $<?php echo $rows[5];?>
                                    -
                                    <?php
                                        foreach($consultaCol as $row):
                                            if($rows['id_col'] == $row['id_col']){ 
                                                echo $row['nom_col'];
                                            }
                                        endforeach   
                                    ?>
                                    -
                                    <?php
                                        foreach($consultaTal as $row):
                                            if($rows['id_talla'] == $row['id_talla']){ 
                                                echo $row['nom_talla'];
                                            }
                                        endforeach   
                                    ?>
                                    -
                                    <?php
                                        foreach($consultaCat as $row):
                                            if($rows['id_cat'] == $row['id_cat']){ 
                                                echo $row['nom_cat'];
                                            }
                                        endforeach   
                                    ?>
                                    - No disponible
                                </option>
                                <?php } ?>    
                            <?php } ?>
                        </select>
                    </section>
                </div>

                <div class="col-md-4">
                    <h6>Nombre del cliente</h6>
                    <label>Solo primer nombre y apellido</label>
                    <input class="input-group mb-3 form-control" type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Ej: Juanito Pérez" required>
                </div>

                <div class="col-md-4">
                    <h6>Rut del cliente (Sin puntos ni guión)</h6>
                    <label>Si el rut termina en K reemplazarla con un 1</label>
                    <input type="number" name="rut" id="rut" class="input-group mb-3 form-control" placeholder="Ej: 201563458" required>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Fono del cliente</h6>
                    <label>Solo los 8 digitos después del +569</label>
                    <input type="number" name="fono_cliente" id="fono_cliente" class="input-group mb-3 form-control" placeholder="Ej: +569-XXXXXXXX" required>
                </div>

                <div class="col-md-4">
                    <h6>Correo electrónico</h6>
                    <label>Ingrese correo personal</label>
                    <input type="text" name="email" id="email" class="input-group mb-3 form-control" placeholder="email@example.com" required>
                </div>

                <div class="col-md-4">
                    <h6>Fecha de retiro</h6>
                    <label>Fecha donde el cliente vendrá por el traje</label>
                    <input type="date" name="fecha" id="fecha" class="input-group mb-3 form-control" placeholder="Seleccione fecha..." required>
                </div>

                <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Reservar</button>
                </div>

            </div>
                      
        </form>
    </div>  

    <!--Scripts-->

    <script src="./js/validacionReserva.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <script src="./js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#controlBuscador').select2();
        });
    </script>

    <!---->

</body>