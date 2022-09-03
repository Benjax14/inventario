<body>
    
    <?php include('./header.php')?>
    <?php include('./modelos/ingresarProdBackend.php')?>  

    <div class="container mt-3 pb-5 pt-3 cont-css">
        <form action="./modelos/ingresarProdBackend.php" method="POST" enctype="multipart/form-data" name="formulario" onsubmit="return checkInputs();">
            <div class="row justify-content-center">
                <div class="col-auto"> 
                    <h1>Registro para el inventario</h1>
                </div>
            </div>
            
            <hr>
        
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Marca del producto</h6>
                    <input type="text" class="input-group mb-3 form-control" name="marca_produc" id="marca_produc" placeholder="Escriba aquí..." required>
                </div>

                <div class="col-md-4">
                    <h6>Nombre del producto</h6>
                    <input type="text" class="input-group mb-3 form-control" name="nombre_produc" id="nombre_produc" placeholder="Escriba aquí..." required>
                </div>

                <div class="col-md-4">
                    <h6>Precio</h6>
                    <input type="number" name="precio" class="input-group mb-3 form-control" id="precio" placeholder="Ingrese valor..." required>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Stock</h6>
                    <input type="number" name="stock" class="input-group mb-3 form-control" id="stock" placeholder="Ingrese stock..." required>
                </div>

                <div class="col-md-4">
                <h6>Talla</h6>
                    <select name="select_talla" class="form-select" required>
                        <option>-Seleccione una talla-</option>
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                        <option value="4">XL</option>
                        <option value="5">XXL</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <h6>Categoría</h6>
                    <select name="select" class="form-select" required>
                        <option>-Seleccione la categoria-</option>
                        <option value="1">Traje</option>
                        <option value="2">Vestido</option>
                        <option value="3">Accesorio</option>
                    </select>      
                </div>

            </div>
            <div class="row justify-content-center">

                <div class="col-md-8 mt-3">
                    <h6 for="formFile" class="form-label">Adjunte imagen</h6>
                    <input class="form-control" name="imagen" type="file" id="formFile" multiple accept="image/*" required>
                </div>
                
                <div class="col-md-4">
                    <h6>Coolor</h6>
                    <select name="select_color" class="form-select" required>
                        <option>-Seleccione el color-</option>
                        <option value="1">Negro</option>
                        <option value="2">Blanco</option>
                        <option value="3">Rojo</option>
                        <option value="4">Azul</option>
                        <option value="5">Gris</option>
                    </select>      
                </div>
                <div class="col-md-4">
                    <h6>Género</h6>
                    <select name="select_gen" class="form-select" required>
                        <option>-Seleccione el género-</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                        <option value="3">Unisex</option>
                    </select>      
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-1 mt-3">
                    <button type="submit" class="btn btn-success">Ingresar</button>
                </div>
            </div>
        </form>
    </div>    

    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/validacionIngreso.js"></script>
</body>
</html>
