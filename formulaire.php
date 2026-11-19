<?php

// Un tableau d'erreurs pour afficher les erreurs
$erreurs = [];

// On vérifie si c'est du GET ou si c'est du POST
if($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ce que veut dire ce code, c'est :
    // - Je crée une variable $prenom (c'est plus pratique à s'en rappeler)
    // - Je vais chercher (filter_input) dans les données POST (INPUT_POST),
    //   la clé "prenom" envoyée par la requête
    $prenom = filter_input(INPUT_POST, 'prenom');
    // Pareil pour nom et message
    $nom = filter_input(INPUT_POST, 'nom');
    $message = filter_input(INPUT_POST, 'message');

    // Si y'a pas de prenom (prenom="" ou prenom=NULL)
    if(!$prenom) {
        // Pour ajouter une nouvelle case dans le tableau erreurs,
        // on fait comme ça : 
        $erreurs[] = 'Le prénom est manquant';
    }
    // Pareil pour le nom et le message
    if(!$nom) {
        $erreurs[] = 'Le nom est manquant';
    }
    if(!$message) {
        $erreurs[] = 'Le message est manquant';
    }
    if(strlen($message) < 10) {
        $erreurs[] = 'Le message est un peu trop court (10 caractères)';
    }

    // On considère à partir d'ici que les tests sont terminés, et donc
    // on va pouvoir faire le test le plus important pour le processus :
    // est-ce que c'est bon ou pas ?
    // Est-ce qu'il y a eu des erreurs ?
    if(empty($erreurs)) {
        // Il n'y a pas d'erreurs (la fonction s'appelle "empty", donc
        // si c'est vrai, c'est que le tableau d'erreurs est vide)

        // Dans un processus classique, vu que le principe ici est de
        // laisser un message, on devrait stocker ça quelque part.
        // Par exemple dans une base de données.
        
        // A la place, une fonction pour afficher le contenu de la variable
        echo "Oui oui, c'est bon, tout va bien.";
        var_dump([
            'prenom' => $prenom,
            'nom' => $nom,
            'message' => $message
        ]);
    } else {
        // Là y'a eu des erreurs. Mais ce qu'on veut c'est les afficher.
        // Et si on les affiche ici maintenant, on est au dessus du
        // doctype. Donc en termes de sémantique HTML c'est pas terrible.
    }
} else {
    // echo "On est en GET";
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de formulaire</title>
    <style>
.erreurs {
    background: #FABABA;
    border: 1px red solid;
    padding: 0.5em 0.75em;
    margin: 1rem;
    display: block;
}
    </style>
</head>
<body>
    <h1>Envoyez moi un message !</h1>

    <?php if(!empty($erreurs)): ?>
    <output class="erreurs">
        <ul>
            <?php foreach($erreurs as $erreur): ?>
            <li><?= $erreur ?></li>
            <?php endforeach; ?>
        </ul>
    </output>
    <?php endif; ?>

    <form method="POST">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>

        <input type="submit" value="Envoyer le message">
    </form>
</body>
</html>