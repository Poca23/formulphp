<?php
function enregistrer(array $donnees, string $fichier): void
{
    $messages = is_file($fichier) ? json_decode(file_get_contents($fichier), true) : [];
    $messages[] = $donnees + ['date' => date('c')];

    $ok = @file_put_contents($fichier, json_encode($messages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    if ($ok === false) {
        throw new RuntimeException("Écriture impossible dans $fichier");
    }
}