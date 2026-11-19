<?php
require __DIR__ . '/../src/Outils.php';

function verifier(bool $condition, string $nom): void
{
    echo ($condition ? 'OK   ' : 'ECHEC') . " - $nom\n";
    if (!$condition)
        exit(1);
}

verifier(!str_contains(e('<script>'), '<'), 'e() échappe le HTML');
verifier(nettoyer(['prenom' => '  Claire '])['prenom'] === 'Claire', 'nettoyer() retire les espaces');
verifier(nettoyer([])['nom'] === '', 'nettoyer() gère un champ absent');