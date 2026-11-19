<?php
function valider(array $d): array
{
    $erreurs = [];
    if ($d['prenom'] === '')
        $erreurs[] = 'Le prénom est manquant';
    if ($d['nom'] === '')
        $erreurs[] = 'Le nom est manquant';

    $longueur = mb_strlen($d['message']);
    if ($longueur === 0) {
        $erreurs[] = 'Le message est manquant';
    } elseif ($longueur < 10) {
        $erreurs[] = 'Le message est trop court (10 caractères minimum)';
    } elseif ($longueur > 1000) {
        $erreurs[] = 'Le message est trop long (1000 caractères maximum)';
    }
    return $erreurs;
}