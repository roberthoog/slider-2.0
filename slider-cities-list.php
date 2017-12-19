<?php
include 'inc/config.php';
include 'inc/error-reporting.php';
include 'inc/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'inc/head-meta.php'; ?>

    <title>Gocciani AB | Admin bilddatabas</title>

    <?php require 'inc/head-resources.php'; ?>

</head>
<body>
<?php include 'inc/header.php'; ?>
<h1 class="text-center">
    Välj slider för butik
</h1>
<br>
<div class="row cities-row">
    <div class="column medium-6 small-12 text-left">
        <h5>
          &raquo; &nbsp;   <a href="slider.php?id=1"><i class="angle-double-right"></i>Stockholm City</a>
        </h5>
        
        <h5>
            &raquo; &nbsp; <a href="slider.php?id=2">Stockholm Globen</a>
        </h5>
        
        <h5>
            &raquo; &nbsp; <a href="slider.php?id=3">Göteborg</a>
        </h5>
        
        <h5>
            &raquo; &nbsp; <a href="slider.php?id=4">Malmö</a>
        </h5>
        
        <h5>
            &raquo; &nbsp; <a href="slider.php?id=5">Uppsala</a>
        </h5>
        
        <h5>
            &raquo; &nbsp; <a href="slider.php?id=6">Västerås</a>
        </h5>

        </div>
        <div class="column medium-6 small-12 text-right">

        <h5>
            <a href="slider.php?id=7">Örebro</a>&nbsp; &laquo; 
        </h5>
        
        <h5>
            <a href="slider.php?id=8">Linköping</a>&nbsp; &laquo; 
        </h5>
        
        <h5>
             <a href="slider.php?id=9">Jönköping</a>&nbsp; &laquo; 
        </h5>
        
        <h5>
             <a href="slider.php?id=10">Norrköping</a>&nbsp; &laquo; 
        </h5>
        
        <h5>
             <a href="slider.php?id=11">Växjö</a>&nbsp; &laquo; 
        </h5>

        <h5>
             <a href="slider.php?id=11">Alla butikera</a>&nbsp; &laquo; 
        </h5>





    </div> <!-- columns -->
</div> <!-- row -->


<?php require 'inc/footer.php'; ?>
</body>
</html>