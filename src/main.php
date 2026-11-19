<?php
require __DIR__ . '/Outils.php';
require __DIR__ . '/Validation.php';
require __DIR__ . '/Stockage.php';

$erreurs = [];
$succes = false;
$donnees = ['prenom' => '', 'nom' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donnees = nettoyer($_POST);
    $erreurs = valider($donnees);

    if (!$erreurs) {
        try {
            enregistrer($donnees, __DIR__ . '/../data/messages.json');
            $succes = true;
            $donnees = ['prenom' => '', 'nom' => '', 'message' => ''];
        } catch (RuntimeException $e) {
            error_log($e->getMessage());
            $erreurs[] = "Une erreur est survenue, veuillez réessayer plus tard.";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    exit('Méthode non autorisée');
}