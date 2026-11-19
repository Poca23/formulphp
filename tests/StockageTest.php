<?php
require __DIR__ . '/../src/Stockage.php';

function verifier(bool $condition, string $nom): void
{
    echo ($condition ? 'OK   ' : 'ECHEC') . " - $nom\n";
    if (!$condition)
        exit(1);
}

$fichier = sys_get_temp_dir() . '/test_messages.json';
@unlink($fichier);

enregistrer(['prenom' => 'Claire', 'nom' => 'Naudin', 'message' => 'Bonjour tout le monde'], $fichier);
$contenu = json_decode(file_get_contents($fichier), true);
verifier(count($contenu) === 1 && $contenu[0]['prenom'] === 'Claire', 'message enregistré');
unlink($fichier);

try {
    enregistrer([], '/dossier/inexistant/fichier.json');
    verifier(false, 'exception attendue');
} catch (RuntimeException $e) {
    verifier(true, 'exception si écriture impossible');
}