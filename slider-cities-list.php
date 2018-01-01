<?php
include 'inc/config.php';
include 'inc/error-reporting.php';
include 'inc/connection.php';

    $sql = 'SELECT city, shop_id
            FROM shops';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $images = $statement->fetchAll();

// Shop id. To pass to slider-animations.php as query string value.
if (isset($shop_id) && isset($shop_all)) {
    $shop_id = $_GET['id'];

}
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
    Välj butik
</h1>
<br>
<div class="row cities-row">
    <div class="column medium-6 small-12 text-left">
        <h6>
          &raquo; &nbsp;   <a href="slider.php?id=1">Stockholm City</a>
        </h6>
        
        <h6>
            &raquo; &nbsp; <a href="slider.php?id=2">Stockholm Globen</a>
        </h6>
        
        <h6>
            &raquo; &nbsp; <a href="slider.php?id=3">Göteborg</a>
        </h6>
        
        <h6>
            &raquo; &nbsp; <a href="slider.php?id=4">Malmö</a>
        </h6>
        
        <h6>
            &raquo; &nbsp; <a href="slider.php?id=5">Uppsala</a>
        </h6>
        
        <h6>
            &raquo; &nbsp; <a href="slider.php?id=6">Västerås</a>
        </h6>
        <h6>
            &raquo; &nbsp;<a href="slider.php?id=7">Örebro</a>
        </h6>
        
        <h6>
            &raquo; &nbsp;<a href="slider.php?id=8">Linköping</a>
        </h6>
        
        <h6>
             &raquo; &nbsp;<a href="slider.php?id=9">Jönköping</a>
        </h6>
        
        <h6>
             &raquo; &nbsp;<a href="slider.php?id=10">Norrköping</a>
        </h6>
        
        <h6>
             &raquo; &nbsp;<a href="slider.php?id=11">Växjö</a>
        </h6>

        <h6>
             &raquo; &nbsp;<a href="slider.php?id=12">Alla butiker</a>
        </h6>





    </div> <!-- columns -->
</div> <!-- row -->


<?php require 'inc/footer.php'; ?>
</body>
</html>