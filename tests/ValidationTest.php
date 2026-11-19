<?php
require __DIR__ . '/../src/Validation.php';

function verifier(bool $condition, string $nom): void
{
    echo ($condition ? 'OK   ' : 'ECHEC') . " - $nom\n";
    if (!$condition)
        exit(1);
}

$valide = ['prenom' => 'Claire', 'nom' => 'Naudin', 'message' => 'Un message assez long'];

verifier(valider($valide) === [], 'données valides');
verifier(count(valider(['prenom' => '', 'nom' => '', 'message' => ''])) === 3, 'champs vides');
verifier(count(valider(['prenom' => 'C', 'nom' => 'N', 'message' => 'court'])) === 1, 'message trop court');
verifier(count(valider(['prenom' => 'C', 'nom' => 'N', 'message' => str_repeat('a', 1001)])) === 1, 'message trop long');