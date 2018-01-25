<?php require '../templates/header.php' ?>

<h1>Salut tout le monde !</h1>
<p>Une pensée spéciale pour :
    <ul>
    <?php
        $names = ['ERIC', 'michèle', 'henrie', 'melissa', 'hervé',
                 'ESTelle', 'ANDRé', 'jérôme', 'SANDRA'];

        foreach ($names as $name) {
    ?>
        <li><?= \Utils\Strings::capitalize($name) ?></li>
    <?php } ?>
</ul></p>

<?php require '../templates/footer.php' ?>