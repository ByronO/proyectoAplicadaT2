<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PC MANIA CR</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/business-frontpage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<?php
    include_once 'public/navbar.php';
?>

<!-- Header -->
<header class="bg-primary py-5 mb-5" style="background-color: red !important;">
    <div class="container h-100" >
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-white mt-5 mb-2">Las mejores PC's de escritorio del mercado!</h1>
                <p style="color: white !important;" class="lead mb-5 text-white-50">Te ofrecemos PC's para todos los fines y con componentes de las mejores marcas, tanto para gaming
                como para trabajo, con las mejores garantías y precios del mercado.</p>
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="container">


    <!-- /.row -->
    <div class="row">
    <?php
    foreach($vars['products'] as $pro){
    ?>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="<?php echo $pro[4]?>"  alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $pro[1]?></h4>
                    <p class="card-text"><?php echo $pro[3]?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">CRC <?php echo $pro[2]?></a>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <!-- /.row -->
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
