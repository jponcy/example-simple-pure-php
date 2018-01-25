<?php require '../templates/header.php' ?>

<h1>Je suis une seconde page <?= strtoupper('html') ?></h1>

<?php
    try {
        var_dump(\Utils\Database::createConnection());
    } catch (\Exception $e) {
        var_dump($e);
    }

    var_dump(error_get_last());
?>

<?php require '../templates/footer.php' ?>
