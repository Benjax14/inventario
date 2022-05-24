<body>
    
    <?php include('./header.php')?> 
    <?php include('./modelos/enlistarTrajesBackend.php')?>

    <?php
        $id = $_POST['Prod'];
        $marca = $_POST['mar'];
        $titulo = $_POST['tit'];
        $imagen = $_POST['ima'];
        $stock = $_POST['sto'];
        $precio = $_POST['pre'];
        $id_color = $_POST['col'];
        $id_talla = $_POST['tal'];
        $id_estado = $_POST['est'];
        $id_cat = $_POST['cat'];
   
    ?>

    <div class="container mt-3 pb-5 pt-3 cont-css">
        <form action="./modelos/editarBackend.php" method="POST" enctype="multipart/form-data" name="formulario" onsubmit="return checkInputs();">
            <div class="row justify-content-center">
                <div class="col-auto"> 
                    <h1>Actualizar producto</h1>
                </div>
            </div>
            
            <hr>
        
            <div class="row justify-content-center">

                <div class="col-md-4 mostrarnt">
                    <select class="mostrarnt" name="clave" required>                               
                        <option selected value="<?php echo $id; ?>"></option>                                                                                  
                    </select>
                </div>

                <div class="col-md-4">
                    <h6>Marca</h6>
                    <input class="input-group mb-3 form-control" type="text" name="marca_produc" id="marca_produc" value="<?php echo $marca; ?>" placeholder="Escriba aqui..." required>
                </div>

                <div class="col-md-4">
                    <h6>Nombre del producto</h6>
                    <input class="input-group mb-3 form-control" type="text" name="nombre_produc" id="nombre_produc" placeholder="Escriba aqui..." value="<?php echo $titulo; ?>" required>
                </div>

                <div class="col-md-4">
                    <h6>Precio $</h6>
                    <input type="number" name="precio" class="input-group mb-3 form-control" id="precio" placeholder="Ingrese valor..." value="<?php echo $precio; ?>" required>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Stock</h6>
                    <input type="number" name="stock" class="input-group mb-3 form-control" id="stock" placeholder="Ingrese stock..." value="<?php echo $stock; ?>" required>
                </div>

                <div class="col-md-4">
                <h6>Talla</h6>
                    <select name="select_talla" class="form-select" value="<?php echo $id_talla; ?>" required>
                        <option>-Seleccione una talla-</option>
                        <?php foreach($consultaTal as $row):?>

                        <?php
                            $tal = $row['id_talla'];
                            $no_tal = $row['nom_talla'];    
                        ?>

                        <?php if($tal == $id_talla){?>
                            <option value="<?php echo $tal?>" selected> <?php echo $no_tal; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $tal?>"> <?php echo $no_tal; ?></option>
                        <?php } ?>

                        <?php endforeach ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <h6>Categoria</h6>
                    <select name="select_cat" class="form-select" value="<?php echo $id_cat; ?>" required>
                        <option>-Seleccione la categoria-</option>
                        <?php foreach($consultaCat as $row):?>

                            <?php
                                $cat = $row['id_cat'];
                                $no_cat = $row['nom_cat'];    
                            ?>

                            <?php if($cat == $id_cat){?>
                                <option value="<?php echo $cat?>" selected> <?php echo $no_cat; ?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $cat?>"> <?php echo $no_cat; ?></option>
                            <?php } ?>

                        <?php endforeach ?>
                    </select>       
                </div>
            </div>
            
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Estado del producto</h6>
                    <select name="select" class="form-select" value="<?php echo $id_estado; ?>" required>
                        <option>-Seleccione estado-</option>
                        <?php foreach($consultaEst as $row):?>

                        <?php
                            $est = $row['id_estado'];
                            $no_est = $row['nom_estado'];    
                        ?>

                        <?php if($est == $id_estado){?>
                            <option value="<?php echo $est?>" selected> <?php echo $no_est; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $est?>"> <?php echo $no_est; ?></option>
                        <?php } ?>

                        <?php endforeach ?>
                    </select>       
                </div>

                <div class="col-md-4">
                    <h6>Color del producto</h6>
                    <select name="select_color" class="form-select" value="<?php echo $id_color; ?>" required>
                        <option>-Seleccione color-</option>
                        <?php foreach($consultaCol as $row):?>

                        <?php
                            $col = $row['id_col'];
                            $no_col = $row['nom_col'];    
                        ?>

                        <?php if($col == $id_color){?>
                            <option value="<?php echo $col?>" selected> <?php echo $no_col; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $col?>"> <?php echo $no_col; ?></option>
                        <?php } ?>

                        <?php endforeach ?>
                    </select>       
                </div>

            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-1 mt-3">
                    <button name="update" class="btn btn-success"> Modificar</button>
                </div>
            </div>
        </form>      
    </div>
    
    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/validacionEdicion.js"></script>
</body>
</html>