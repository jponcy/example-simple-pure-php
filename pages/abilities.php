<?php

function useTemplate(string $templateName)
{ require_once "../templates/$templateName.php"; }

useTemplate('header');

try {
    $abilities = \Dao\AbilityDao::getInstance()->findAll();

    if (count($abilities) > 0) {
    ?><table><tr><th>Id</th><th>Name</th></tr><?php
        foreach ($abilities as $ability) {
        ?>
            <tr>
                <td><?=$ability->getId()?></td>
                <td><?=$ability->getLabel()?></td>
            </tr>
        <?php
        }
    ?></table><?php
    }
} catch(PDOException $error) {
    echo '<div class="error">' . $error->getMessage() . '</div>';
}

useTemplate('footer');