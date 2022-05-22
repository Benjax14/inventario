<body> 

    <script type="text/javascript">
        function confirmDelete(){
        var respuesta = confirm("¿Esta seguro que desea eliminar este producto de la lista?");
        if(respuesta === true){
            return true;
        }
        else{
            return false;
        } 
    }
    </script>

    <?php include('./modelos/enlistarTrajesBackend.php');?>

    <div class="row justify-content-center">
            <div class="col-auto" style="margin-top: 15px"> 
                <h1>Listado de trajes y accesorios</h1>
            </div>
    </div>
    
    <div class="container" style="margin-top: 30px">

    <hr>

        <table class="table table-striped table-bordered">

            <tr>
              <th>ID</th>
              <th>Marca</th>
              <th>Titulo</th>
              <th>Imagen</th>
              <th>Stock</th>
              <th>Precio</th>
              <th>Talla</th>
              <th>Estado</th>
              <th>Categoria</th>
              <th>Acciones</th>
            </tr>
            
            <tr>

            <?php              
                while($rows = mysqli_fetch_array($pro)){
                    $id_traje = $rows['id'];
                    $marca = $rows['marca'];
                    $titulo = $rows['nombre'];
                    $imagen = $rows['img'];
                    $stock = $rows['stock'];
                    $precio = $rows['precio'];
                    $id_talla = $rows['id_talla'];
                    $id_estado = $rows['id_estado'];
                    $id_cat = $rows['id_cat'];
            ?>

              <td><?php echo $id_traje;?></td>
              <td><?php echo $marca;?></td>
              <td><?php echo $titulo;?></td>
              <td><img height="80" width="80" src="data:image/*;base64,<?php echo base64_encode($imagen); ?>"></td>
              <td><?php echo $stock;?></td>
              <td>$<?php echo $precio;?></td>
              <td>

                 <?php foreach($consultaTal as $row):?>
                    <?php if($row['id_talla'] == $id_talla){?>
                        <?php echo $row['nom_talla'];?>
                    <?php } ?> 
                 <?php endforeach?>

              </td>
              <td>

                  <?php foreach($consultaEst as $row):?>

                      <?php if($row['id_estado'] == $id_estado){?>

                        <?php if($id_estado == 1){?>
                        <img src="lmnts_grfcs/verde.png" width="20" height="20">
                        <?php echo $row['nom_estado'];?>
                        <?php } ?>

                        <?php if($id_estado == 2){?>
                        <img src="lmnts_grfcs/rojo.png" width="20" height="20">
                        <?php echo $row['nom_estado'];?>
                        <?php } ?>

                    <?php } ?>

                  <?php endforeach?>

              </td>

              <td>

                  <?php foreach($consultaCat as $row):?>
                      <?php if($row['id_cat'] == $id_cat){?>
                          <?php echo $row['nom_cat'];?>
                      <?php } ?> 
                  <?php endforeach?>

              </td>
              <td>
        
                <div class="col-1 justify-content-center align-self-center">
                    <form action="./editarProducto.php" method="POST">
                        <div>
                            
                        <select class="mostrarnt" name="Prod" required>                               
                            <option selected value="<?php echo $id_traje; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="mar" required>                               
                            <option selected value="<?php echo $marca; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="tit" required>                               
                            <option selected value="<?php echo $titulo; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="ima" required>                               
                            <option selected value="<?php echo $imagen; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="sto" required>                               
                            <option selected value="<?php echo $stock; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="pre" required>                               
                            <option selected value="<?php echo $precio; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="tal" required>                               
                            <option selected value="<?php echo $id_talla; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="est" required>                               
                            <option selected value="<?php echo $id_estado; ?>"></option>                                                                                  
                        </select>

                        <select class="mostrarnt" name="cat" required>                               
                            <option selected value="<?php echo $id_cat; ?>"></option>                                                                                  
                        </select>
                            
                            <button href="./editarProducto.php" type="submit" class="btn btn-success"> <img class="me-2" src="lmnts_grfcs/editar.png" width="20" height="20"></button>
                            
                        </div>
                         
                    </form>
                </div>            
                
                <br>        

                <div class="col-1 justify-content-center align-self-center">
                    <form action="./modelos/eliminarProductoBackend.php" method="POST">
                        <div>
                            
                        <select class="mostrarnt" name="Prod">
                                                       
                            <option selected value="<?php echo $id_traje; ?>"></option>
                                                                                  
                        </select>
                            
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"> <img class="me-2" src="lmnts_grfcs/eliminar.png" width="20" height="20"></button>
                            
                        </div>
                         
                    </form>
                    </div>
            
              </td>
            </tr>
              
            <?php } ?>

        </table>

    </div>
    
    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>                 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
</body>
</html>