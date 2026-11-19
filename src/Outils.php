<?php
function e(string $texte): string
{
    return htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');
}

function nettoyer(array $source): array
{
    $donnees = [];
    foreach (['prenom', 'nom', 'message'] as $champ) {
        $donnees[$champ] = trim((string) ($source[$champ] ?? ''));
    }
    return $donnees;
}