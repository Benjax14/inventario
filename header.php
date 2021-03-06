<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 

    <style type="text/css">
        <?php
            $css = file_get_contents('./css/imagen.css');
            echo $css;
        ?>
    </style>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light header-color container-bg">
            <div class="container-fluid">
                <a class="navbar-brand texto-bar" href="./index.php"><img width="13%" height="13%" src="../inventario/lmnts_grfcs/queso.png">Panel administrativo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link texto-bar" href="ingresarProducto.php">Ingresar un producto al sistema</a>
                        <a class="nav-link texto-bar" href="agendarReserva.php">Hacer una reserva</a>
                        <a class="nav-link texto-bar" href="VerReserva.php">Ver reservas</a>
                        <!--<a class="nav-link texto-bar" href="">Resumen de reservas</a>-->
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>