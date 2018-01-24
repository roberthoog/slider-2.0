<?php
include 'inc/config.php';
include 'inc/error-reporting.php';
include 'inc/connection.php';
// Read the shop id from the query string.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $shopId = $_GET['id'];
    $imageId = "";

    /*
     * Get images list.
     */
    $sql = 'SELECT 
        im.image_id,
        im.filename,
        im.title,
        im.display_start_date,
        im.display_end_date,
        imsh.shop_id,
        im.upload_date
    FROM images AS im
    JOIN images_shops AS imsh ON 
        imsh.image_id = im.image_id
        AND imsh.shop_id = 12
    WHERE 
        CURDATE() BETWEEN im.display_start_date AND im.display_end_date
    GROUP BY im.image_id
    ORDER BY im.upload_date DESC';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $images = $statement->fetchAll();
}
?>

<!DOCTYPE HTML>
<html class="no-js" lang="en">
    <head>
        <?php require 'inc/head-meta.php'; ?>

        <title>Slider</title>
        <META HTTP-EQUIV="refresh" CONTENT="3600">
        <?php require 'inc/head-resources.php'; ?>

        <?php
        if (!isset($errors)) {
            ?>
            <link href="css/slider-style.css" type="text/css" rel="stylesheet" />
            <link href="css/slider-animations.php?id=12" type="text/css" rel="stylesheet" />
            <script src="js/modernizr.custom.86080.js" type="text/javascript"></script>
            <?php
        }
        ?>
    </head>
    <body>
        <?php
        if (isset($errors)) {
            require 'inc/header.php';
            
            foreach ($errors as $error) {
                ?>
               
                <?php
            }
            
        } else {
            ?>
            <ul class="cb-slideshow">
                <?php
                foreach ($images as $image) {
                        $filename = $image['filename'];
            ?>

                    <li>
                        <span>
                            <img src="uploads/<?php echo $filename; ?>" alt="Gocciani advertisement" >
                        </span>
                    </li>
                    <?php
                }
            
                ?>
            </ul>
            <?php
        }
        ?>
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/what-input/dist/what-input.js"></script>
        <script src="bower_components/foundation-sites/dist/js/foundation.js"></script>  
<!--     <?php require 'inc/footer.php'; ?>
 -->    </body>
</html>