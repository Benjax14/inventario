<body>
    
    <?php include('./header.php')?>
    <?php include('./modelos/ingresarProdBackend.php')?>  

    <div class="container mt-3 pb-5 pt-3 cont-css">
        <form action="modelos/ingresarProdBackend.php" method="POST" enctype="multipart/form-data" name="formulario" onsubmit="return valid();">
            <div class = "row justify-content-center">
                <div class="col-auto"> 
                    <h1>Registro de producto</h1>
                </div>
            </div>
            
            <hr>
        
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Marca</h6>
                    <input class="input-group mb-3 form-control" type="text" name="marca_produc" id="mar" placeholder="Escriba aqui..." maxlength="45" onkeypress="return palabras(event)">
                </div>

                <div class="col-md-4">
                    <h6>Nombre del producto</h6>
                    <input class="input-group mb-3 form-control" type="text" name="nombre_produc" id="nom" placeholder="Escriba aqui..." maxlength="45" onkeypress="return palabras(event)">
                </div>

                <div class="col-md-4">
                    <h6>Precio $</h6>
                    <input type="number" name="precio" class="input-group mb-3 form-control" id="pre" placeholder="Ingrese valor..." maxlength="5" onkeypress="return numeros(event)" >
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Stock</h6>
                    <input type="number" name="stock" class="input-group mb-3 form-control" id="sto" placeholder="Ingrese stock..." maxlength="2" onkeypress="return numeros(event)">
                </div>

                <div class="col-md-4">
                <h6>Talla</h6>
                    <select name="select_talla" class="form-select" id="talla">
                        <option>-Seleccione una talla-</option>
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                        <option value="4">XL</option>
                        <option value="5">XXL</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <h6>Categoria</h6>
                    <select name="select" class="form-select" id="cat">
                        <option>-Seleccione la categoria-</option>
                        <option value="1">Traje</option>
                        <option value="2">Accesorio</option>
                    </select>
                    
                    
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 mt-3">
                    <h6 for="formFile" class="form-label">Adjunte imagen</h6>
                    <input class="form-control" name="imagen" type="file" id="formFile" multiple accept="image/*" required>
                </div>               
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-1 mt-3">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </div>
        </form>
    </div>    

    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/validacionIngresar.js"></script>

</body>