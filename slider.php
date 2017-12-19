<?php
include 'inc/config.php';
include 'inc/error-reporting.php';
include 'inc/connection.php';

if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    //@todo translate.
    $errors[] = 'Ingen butik vald.';
} else {
    /*
     * Get images list.
     */
    $sql = 'SELECT title, filename
            FROM images';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $images = $statement->fetchAll();

    // Shop id. To pass to slider-animations.php as query string value.
    $shopId = $_GET['id'];
}
?>

<!DOCTYPE HTML>
<html class="no-js" lang="en">
    <head>
        <?php require 'inc/head-meta.php'; ?>

        <title>Slider</title>

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
                    $title = $image['title'];
                    $filename = $image['filename'];
                    ?>
                    <li>
                        <span>

                        <img src="uploads/<?php echo $filename?>" alt="<?php echo $title; ?>">
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