<body>

    <?php include('./header.php');?>
    <?php require('./modelos/enlistarTrajesBackend.php')?>
      
    <?php $imagen = $_GET['id']; ?>

    <div class="container mt-3 pb-5 pt-3 cont-css">

        <?php foreach($pro as $row): ?>

                <?php if($row['id'] == $imagen){ ?>
                    <img height="300" width="300" src="data:image/*;base64,<?php echo base64_encode($row['img']);?>">
                <?php } ?>

        <?php endforeach ?>

    </div>

    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>