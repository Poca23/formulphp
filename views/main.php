<!DOCTYPE html>
<html lang="fr">
<?php require __DIR__ . '/header.php'; ?>
<main>
    <?php
    if ($erreurs)
        require __DIR__ . '/erreurs.php';
    if ($succes)
        require __DIR__ . '/succes.php';
    require __DIR__ . '/formulaire.php';
    ?>
</main>
<?php require __DIR__ . '/footer.php'; ?>

</html>