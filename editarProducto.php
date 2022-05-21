<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous">
    </script>
    <style>
    .mostrarnt{
        display: none;
    }
    </style>
</head>

<body>
    
    <?php include('header.php')?> 
    <?php include('modelos/enlistarTrajesBackend.php')?>

    <?php
        $id = $_POST['Prod'];
        $marca = $_POST['mar'];
        $titulo = $_POST['tit'];
        $imagen = $_POST['ima'];
        $stock = $_POST['sto'];
        $precio = $_POST['pre'];
        $id_talla = $_POST['tal'];
        $id_estado = $_POST['est'];
        $id_cat = $_POST['cat'];
   
    ?>

    <div class="container mt-3 pb-5 pt-3 cont-css">
        <form action="modelos/editarBackend.php" method="POST" enctype="multipart/form-data" name="formulario" onsubmit="return checkInputs();">
            <div class="row justify-content-center">
                <div class="col-auto"> 
                    <h1>Editar producto</h1>
                </div>
            </div>
            
            <hr>
        
            <div class="row justify-content-center">

                <div class="col-md-4 mostrarnt">
                        <select class="mostrarnt" name="clave">                               
                            <option selected value="<?php echo $id; ?>"></option>                                                                                  
                        </select>
                </div>

                <div class="col-md-4">
                    <h6>Marca</h6>
                    <input class="input-group mb-3 form-control" type="text" id="marca" name="marca_produc" value="<?php echo $marca; ?>">
                </div>

                <div class="col-md-4">
                    <h6>Nombre del producto</h6>
                    <input class="input-group mb-3 form-control" type="text" id="titulo_producto" name="nombre_produc" value="<?php echo $titulo; ?>">
                </div>

                <div class="col-md-4">
                    <h6>Precio $</h6>
                    <input class="input-group mb-3 form-control" type="number" id="precio_producto" name="precio_pr" value="<?php echo $precio; ?>">
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Stock</h6>
                    <input class="input-group mb-3 form-control" type="number" id="sto" name="stock" value="<?php echo $stock; ?>">
                </div>

                <div class="col-md-4">
                <h6>Talla</h6>
                    <select id="talla" name="select_talla" class="form-select" value="<?php echo $id_talla; ?>">
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
                    <select id="cat" name="select_cat" class="form-select" value="<?php echo $id_cat; ?>">
                        <option>-Seleccione la categoria-</option>
                        <?php foreach($consultaCat as $row):?>

                            <?php
                                $cat = $row['id_cat'];
                                $no_cat = $row['nom_cat'];    
                            ?>

                            <?php if($cat == $id_cat){?>
                                <option value="<?php echo $cat;?>" selected> <?php echo $no_cat; ?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $cat;?>"> <?php echo $no_cat; ?></option>
                            <?php } ?>

                        <?php endforeach ?>
                    </select>       
                </div>
            </div>
            
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Estado del producto</h6>
                    <select id="estado" name="select" class="form-select" value="<?php echo $id_estado; ?>">
                        <option>-Seleccione estado-</option>
                        <?php foreach($consultaEst as $row):?>

                        <?php
                            $est = $row['id_estado'];
                            $no_est = $row['nom_estado'];    
                        ?>

                        <?php if($est == $id_estado){?>
                            <option value="<?php echo $est;?>" selected> <?php echo $no_est; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $est;?>"> <?php echo $no_est; ?></option>
                        <?php } ?>

                        <?php endforeach ?>
                    </select>       
                </div>

                <!-- <div class="col-md-8 mt-3">
                    <h6 for="formFile" class="form-label">Adjunte imagenes</h6>
                    <input class="form-control" name="imagen" type="file" id="formFile" multiple accept="image/*" value="<?php echo $imagen ?>">
                </div>-->

            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-1 mt-3">
                    <button type="submit" name="update" class="btn btn-primary"> Modificar</button>
                </div>
            </div>
        </form>
    </div>    

    <!--SCRIPTS ÚTILES-->
    <script src="./js/validacionEditar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>