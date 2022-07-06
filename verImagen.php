<body>

    <?php include('./header.php'); ?>
    <?php require('./modelos/enlistarTrajesBackend.php'); ?>
      
    <?php $imagen = $_GET['id']; ?>

    <div class="row justify-content-center" style="margin-top: 40px">

        <div class="col-auto"> 

            <?php foreach($pro as $row): ?>
                    <?php if($row['id'] == $imagen){ ?>
                        <img height="400" width="400" src="data:image/*;base64,<?php echo base64_encode($row['img']);?>">
                    <?php } ?>
            <?php endforeach ?>

        </div>

    </div>

</body>