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
    
    <img src="images/gocc_logo_webb.png" alt="Gocciani logo" style="padding:100px 0; margin: 0 auto; display:block">
    
    <h1 class="text-center">
        Admin butiksslider
    </h1>
    <br>

    <div class="columns">
        <div class="column medium-4">
            <div class="callout text-center">
            <a href="add-image.php"><h3>Lägg till bild</h3></a>
        </div> <!-- column medium-4 -->
    </div> <!-- callout -->

    <div class="column medium-4">
        <div class="callout text-center">
        <a href="slider.php?id=12"><h3>Visa bildspel</h3></a>
        </div> <!-- column medium-4 -->
    </div> <!-- callout -->

    <div class="column medium-4">
        <div class="callout text-center">
        <a href="list-images.php"><h3>Visa &amp; redigera bilder</h3></a>
        </div> <!-- column medium-4 -->
    </div> <!-- callout -->

    </div> <!-- columns -->
</div> <!-- row -->

      
<?php require 'inc/footer.php'; ?>
</body>
</html>