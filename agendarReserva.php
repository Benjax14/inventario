<body>
    
    <?php include('./header.php')?>

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
                    <h6>ID del producto a reservar</h6>
                    <input class="input-group mb-3 form-control readonly" type="number" name="clave" id="clave" placeholder="Ingrese ID..." required>
                </div>

                <div class="col-md-4">
                    <h6>Nombre del cliente</h6>
                    <input class="input-group mb-3 form-control" type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Escriba aqui..." required>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Fono del cliente</h6>
                    <input type="number" name="fono_cliente" id="fono_cliente" class="input-group mb-3 form-control" placeholder="Ingrese fono..." required>
                </div>

                <div class="col-md-4">
                    <h6>Fecha de retiro</h6>
                    <input type="date" name="fecha" id="fecha" class="input-group mb-3 form-control" placeholder="Seleccione fecha..." required>
                </div>

            </div>
                      
            <div class="row justify-content-center">

                <div class="col-md-1 mt-3">
                    <button type="submit" class="btn btn-success">Reservar</button>
                </div>

            </div>
        </form>
    </div>  

    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/validacionReserva.js"></script>

</body>
</html>