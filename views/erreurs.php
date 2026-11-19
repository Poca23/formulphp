<output class="erreurs">
    <ul>
        <?php foreach ($erreurs as $erreur): ?>
            <li><?= e($erreur) ?></li>
        <?php endforeach; ?>
    </ul>
</output>