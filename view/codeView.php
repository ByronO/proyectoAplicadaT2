

<!-- Navigation -->
<?php
include_once 'public/header.php';
include_once 'public/navbar.php';
?>


<body>
<CENTER>
    <div style="width: 50%;">

        <h2 style="margin-top: 30px; margin-bottom: 30px">Su codigo es el siguiente</h2>

        <h2 style="margin-top: 30px; margin-bottom: 30px"><?php echo $vars['code'];?></h2>

        <br>
        <button type="button" class="btn btn-success"><a class="nav-link" style="color: white;" href="?controlador=Product&accion=home">Aceptar</a></button>

    </div>
</CENTER>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


