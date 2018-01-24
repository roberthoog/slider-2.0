<?php
include 'inc/config.php';
include 'inc/error-reporting.php';
include 'inc/connection.php';

$imageSavedFlag = FALSE;

if (isset($_POST['submitButton'])) {
    /*
     * Get posted values.
     */
    $imageTitle = isset($_POST['imageTitle']) ? $_POST['imageTitle'] : '';
    $displayStartDate = isset($_POST['displayStartDate']) ? $_POST['displayStartDate'] : '';
    $displayEndDate = isset($_POST['displayEndDate']) ? $_POST['displayEndDate'] : '';
    $displayDelay = isset($_POST['displayDelay']) ? $_POST['displayDelay'] : 0;
    $selectedShops = isset($_POST['shops']) ? $_POST['shops'] : [];

    /*
     * Validate values.
     */
    // if (!$selectedShops) {
    //     $errors[] = 'OBS! Ange minst en (eller alla) butik..';
    // }
    if (empty($displayStartDate)) {
        $errors[] = 'OBS! Sätt startdatum';
    }
    if (empty($displayEndDate)) {
        $errors[] = 'OBS! Sätt sista dautum.';
    }
    if (empty($displayDelay)) {
        $errors[] = 'OBS! Ange i sekunder hur länge bilden ska visas';
    }

    $imagePath = '';
    $imageFilename = '';

    /*
     * Upload file.
     */
    if (!empty($_FILES)) {
        if (isset($_FILES['file']['error'])) {
            if ($_FILES['file']['error'] === UPLOAD_ERR_NO_FILE) {
                // @todo to translate
                $errors[] = 'No file provided.';
            } elseif ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                if ($_FILES['file']['size'] <= UPLOAD_MAX_FILE_SIZE) {
                    $imageFilename = basename($_FILES['file']['name']);
                    $imageType = $_FILES['file']['type'];
                    $imageTmpName = $_FILES['file']['tmp_name'];

                    $imagePath = rtrim(UPLOAD_DIR, '/') . '/' . $imageFilename;

                    if (in_array($imageType, UPLOAD_ALLOWED_MIME_TYPES)) {
                        if (!move_uploaded_file($imageTmpName, $imagePath)) {
                            $errors[] = 'Vänligen försök igen. Ett fel uppstod..';
                        }
                    } else {
                        $errors[] = 'Bara JPG, JPEG, PNG och GIF är tillåtna.';
                    }
                } else {
                    $errors[] = 'F.';
                }
            }
        }
    }

    if (!isset($errors)) {
        /*
         * Save image.
         */
        $sql = 'INSERT INTO images (
                    title,
                    path,
                    filename,
                    display_start_date,
                    display_end_date,
                    display_delay,
                    upload_date
                ) VALUES (
                    :title,
                    :path,
                    :filename,
                    :display_start_date,
                    :display_end_date,
                    :display_delay,
                    :upload_date
                )';

        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':title'              => $imageTitle,
            ':path'               => $imagePath,
            ':filename'           => $imageFilename,
            ':display_start_date' => $displayStartDate,
            ':display_end_date'   => $displayEndDate,
            ':display_delay'      => $displayDelay,
            ':upload_date'        => date('Y-m-d'),
        ]);

        // Read the id of the inserted image.
        $lastInsertId = $pdo->lastInsertId();

        /*
         * Save a record for each selected shop in the checkboxes list.
         */
        foreach ($selectedShops as $shopId) {
            $sql = 'INSERT INTO images_shops (
                        image_id,
                        shop_id
                    ) VALUES (
                        :image_id,
                        :shop_id
                    )';

            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':image_id' => $lastInsertId,
                ':shop_id' => $shopId,
            ]);
        }
        $imageSavedFlag = TRUE;
    }
}

/*
 * Get shops list.
 */
$sql = 'SELECT shop_id, city
        FROM shops';

$statement = $pdo->prepare($sql);
$statement->execute();
$shops = $statement->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require 'inc/head-meta.php'; ?>
        <title>Gocciani AB | Admin bildvisning</title>
        <?php require 'inc/head-resources.php'; ?>
<script>
 $( function() {
    $( ".datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( ".datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );


  $( function() {
    $( document ).tooltip();
  } );

/*
* display datepicker in form
*/ 
 $( function() {
     $( ".datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd', dayNamesMin: ['M', 'T', 'O', 'T', 'F', 'L', 'S']});
     $( ".datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd', dayNamesMin: ['M', 'T', 'O', 'T', 'F', 'L', 'S']});
   } );
</script>     
 </head>
 
    <body>
        <?php require 'inc/header.php'; ?>
        <div class="row">
            <div class="small-12 columns">
                <h2>Gocciani admin bildspel</h2>
                <h4>Lägg upp bild</h4>
            </div>
        </div>

        <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                ?>
                <div class="row">
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
        } elseif ($imageSavedFlag) {
            ?>
            <div class="row">
                <div class="small-12 columns">
                    <div class="success callout" data-closable>
                        <i class="fa fa-check-circle"></i> Bild <strong><?php echo "$imageFilename"; ?></strong> uppladdad!
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="row">
            <div class="small-12 columns">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="small-12 cell">
                        <fieldset class="small-12 cell">
                            <label for="picName">
                            <i class=" sandybrown far fa-address-card"></i>
                            Bildnamn</label>
                        <input type="text" name="imageTitle" id="age" title="Visas ej i bildspelet men gör det lättare att administrera och ändra om bilderna har ett nanm."
                         placeholder="Wella Conditioner 500ml" value="<?php echo isset($imageTitle) ? $imageTitle : ''; ?>" required>
                        </fieldset>
                    </div>

                    <div class="small-12 cell">
                       <!--  <fieldset class="small-12 cell fieldset">
                            <label>Butik bilden ska visas</label>
                            <?php
                            foreach ($shops as $shop) {
                                $shopId = $shop['shop_id'];
                                $shopCity = $shop['city'];

                                $checked = isset($selectedShops) && in_array($shopId, $selectedShops) ? 'checked' : '';
                                ?><br>

                                <input type="radio" checked name="shops[]" id="shop<?php echo $shopId; ?>" value="<?php echo $shopId; ?>"
                                <?php echo $checked; ?> >
                                <label for="shop<?php echo $shopId; ?>">
                                    <?php echo $shopCity; ?>
                                </label>
                                <?php
                            }
                    ?>
                                

                        </fieldset> -->
                    </div>

                    <div class="small-12 cell">
                         <fieldset class="small-12 cell">
                            <label>
                            <i class="far sandybrown fa-calendar-alt"></i>&nbsp;
                            Startdatum för bildens visning</label>
                            <input type="text" class="datepicker1" name='displayStartDate' id="displayStartDate" value="<?php echo isset($displayStartDate) ? $displayStartDate : ''; ?>" required placeholder="2017-12-01">
                        </fieldset>
                    </div>

                    <div class="small-12 cell">
                         <fieldset class="small-12 cell">
                            <label>
                            <i class="far sandybrown fa-calendar-alt"></i>&nbsp;
                            Slutdatum för bildens visning</label>
                        <input type="text" class="datepicker2" name="displayEndDate" id="displayEndDate" value="<?php echo isset($displayEndDate) ? $displayEndDate : ''; ?>" required placeholder="2018-01-01">
                        </fieldset>
                    </div>

                    <div class="small-12 cell">
                         <fieldset class="small-12 cell">
                            <label>
                            <i class="far sandybrown  fa-clock"></i>
                            Antal sekunder bilden ska visas</label>
                        <input type="number" name="displayDelay" id="displayDelay" value="<?php echo isset($displayDelay) ? $displayDelay : '5'; ?>" required placeholder="10">
                        </fieldset>
                    </div>

                    <div class="small-12 cell">
                        <fieldset class="small-12 cell">
                            <label>
                            <i class="far sandybrown  fa-file-image"></i>
                            Välj bild</label>
                            <input type="file" name="file" value="Bläddra">
                            <button type="submit" name="submitButton" id="submitButton" class="button success" title="Genomför">
                                <i class="fa sandybrown fa-upload"></i> Klart - ladda upp!
                            </button>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>

        <?php require 'inc/footer.php'; ?>

    </body>
</html>