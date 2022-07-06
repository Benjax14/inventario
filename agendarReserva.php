<body>
    
    <?php include('./header.php');?>

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
                    <input class="input-group mb-3 form-control" type="number" name="clave" id="clave" placeholder="Ej: 1" required>
                </div>

                <div class="col-md-4">
                    <h6>Nombre del cliente</h6>
                    <input class="input-group mb-3 form-control" type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Ej: Juanito Pérez" required>
                </div>

                <div class="col-md-4">
                    <h6>Fono del cliente</h6>
                    <input type="number" name="fono_cliente" id="fono_cliente" class="input-group mb-3 form-control" placeholder="Ej: +569-XXXXXXXX" required>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>Correo electrónico</h6>
                    <input type="text" name="email" id="email" class="input-group mb-3 form-control" placeholder="email@example.com" required>
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

    <!--Validacion con javascript-->
    <script src="./js/validacionReserva.js"></script>

</body>