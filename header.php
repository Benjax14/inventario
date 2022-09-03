<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="shortcut icon" href="./lmnts_grfcs/queso.png">
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
                <a class="navbar-brand texto-bar" href="./index.php"><h1>Panel administrativo</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link texto-bar" href="ingresarProducto.php"><h6>Ingresar un producto al sistema</h6></a>
                        <a class="nav-link texto-bar" href="agendarReserva.php"><h6>Hacer una reserva</h6></a>
                        <a class="nav-link texto-bar" href="VerReserva.php"><h6>Ver reservas</h6></a>
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