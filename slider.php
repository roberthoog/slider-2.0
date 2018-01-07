<?php
include 'inc/config.php';
include 'inc/error-reporting.php';
include 'inc/connection.php';
// Read the shop id from the query string.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $shopId = $_GET['id'];


    /*
     * Get images list.
     */
    $sql = 'SELECT DISTINCT
                im.filename,
                im.display_delay,
                imsh.image_id,
                im.display_start_date,
                im.display_end_date,
                imsh.shop_id         
            FROM images_shops AS imsh
            LEFT JOIN images AS im ON im.image_id = imsh.image_id 
            LEFT JOIN shops AS sh ON sh.shop_id = imsh.shop_id 
             WHERE 
                imsh.shop_id = :shop_id OR imsh.shop_id = 12
                AND CURDATE() >= im.display_start_date 
                AND CURDATE() <= im.display_end_date';

    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':shop_id' => $shopId,


    ]);
    $images = $statement->fetchAll();

/*
    Get unique image ids if all shops are selected to avoid duplicate shows 
    $image_id = $statement->fetchAll();
    if ($shopId == 12) {
    $sql = ' SELECT DISTINCT image_id 
          FROM images_shops 
          ORDER BY DATE(NOW()), image_id ASC';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $image_id = $statement->fetchAll();
    }
*/ 


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
            <link href="css/slider-animations.php?id=<?php echo $shopId; ?>" type="text/css" rel="stylesheet" />
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
                <div class="row wide">
                    <div class="small-12 columns">
                        <div class="alert callout" data-closable>
                            <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
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
                            <img src="uploads/<?php echo $filename; ?>" alt="Slider Image" >
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