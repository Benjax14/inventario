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
        $id_gen = $_POST['gen'];
        $id_color = $_POST['col'];
        $id_talla = $_POST['tal'];
        $id_cat = $_POST['cat'];

        $validacion = mysqli_query($con, "SELECT * from se_puede where id = '".$id."'");
        if(mysqli_num_rows($validacion) > 0){
            echo '<script language="javascript">alert("El producto se encuentra reservado"); window.location.href="index.php"</script>';
        }

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
                    <label>Marca del producto</label>
                    <input class="input-group mb-3 form-control" type="text" name="marca_produc" id="marca_produc" value="<?php echo $marca; ?>" placeholder="Ej: Falabella">
                </div>

                <div class="col-md-4">
                    <h6>Nombre del producto</h6>
                    <label>Modelo y tipo de producto</label>
                    <input class="input-group mb-3 form-control" type="text" name="nombre_produc" id="nombre_produc" placeholder="Ej: Traje negro" value="<?php echo $titulo; ?>" >
                </div>

                <div class="col-md-4">
                    <h6>Precio $</h6>
                    <label>El precio tiene que ser mayor a $5000</label>
                    <input type="number" name="precio" class="input-group mb-3 form-control" id="precio" placeholder="Ej: 5000" value="<?php echo $precio; ?>" >
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Stock</h6>
                    <label>El stock tiene que ser mayor a 1</label>
                    <input type="number" name="stock" class="input-group mb-3 form-control" id="stock" placeholder="Ej: 5" value="<?php echo $stock; ?>" >
                </div>

                <div class="col-md-4">
                <h6>Talla</h6>
                <label>Las tallas son las siguientes: </label>
                    <select name="select_talla" id="talla" class="form-select" value="<?php echo $id_talla; ?>" >
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
                    <h6>Categoría</h6>
                    <label>Las categorías son las siguientes: </label>
                    <select name="select_cat" id="cat" class="form-select" value="<?php echo $id_cat; ?>" >
                        <option>-Seleccione la categoría-</option>
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
                    <h6>Color del producto</h6>
                    <label>Los colores son los siguientes: </label>
                    <select name="select_color" id="color" class="form-select" value="<?php echo $id_color; ?>" >
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
                
                <div class="col-md-4">
                    <h6>Género</h6>
                    <label>Los géneros son los siguientes: </label>
                    <select name="select_gen" id="genx" class="form-select" value="<?php echo $id_gen; ?>" >
                        <option>-Seleccione género-</option>
                        <?php foreach($consultaGen as $row):?>

                        <?php
                            $genero = $row['id_gen'];
                            $nom_genero = $row['nom_gen'];    
                        ?>

                        <?php if($genero == $id_gen){?>
                            <option value="<?php echo $genero?>" selected> <?php echo $nom_genero; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $genero?>"> <?php echo $nom_genero; ?></option>
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
    <script src="./js/validacionEditar.js"></script>
</body>
</html>
