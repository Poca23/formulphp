# Formulphp

Auteure : Claire Naudin, formation CDA 2026-2027

## Objectif

Un formulaire de contact en PHP : le visiteur envoie un message, le serveur le valide, l'enregistre dans un fichier JSON et affiche une confirmation ou les erreurs. Affichage adapté au mobile et au desktop.

Points travaillés : validation côté serveur, gestion d'erreurs (try/catch), architecture modulaire, séparation logique / affichage, tests automatiques.

## Structure

```
.
├── public/
│   ├── index.php
│   └── css/
│       ├── main.css
│       ├── base.css
│       ├── formulaire.css
│       ├── messages.css
│       └── responsive.css
├── src/
│   ├── main.php
│   ├── Outils.php
│   ├── Validation.php
│   └── Stockage.php
├── views/
│   ├── main.php
│   ├── header.php
│   ├── erreurs.php
│   ├── succes.php
│   ├── formulaire.php
│   └── footer.php
├── data/
│   └── messages.json
└── tests/
    ├── OutilsTest.php
    ├── ValidationTest.php
    └── StockageTest.php
```

## Rôle des fichiers

| Fichier               | Rôle                                                       |
| --------------------- | ---------------------------------------------------------- |
| `public/index.php`    | point d'entrée : appelle les fonctionnalités puis les vues |
| `src/main.php`        | importe les fonctions et traite le formulaire              |
| `src/Outils.php`      | `e()` échappe le HTML, `nettoyer()` supprime les espaces   |
| `src/Validation.php`  | `valider()` retourne la liste des erreurs                  |
| `src/Stockage.php`    | `enregistrer()` écrit le message dans le JSON              |
| `views/main.php`      | appelle les vues dans l'ordre                              |
| `public/css/main.css` | importe tous les CSS                                       |

## Lancer le projet

```
php -S localhost:8000 -t public
```

Ouvrir http://localhost:8000.

## Tester

```
php tests/OutilsTest.php
php tests/ValidationTest.php
php tests/StockageTest.php
```

Résultat attendu : 10 lignes OK.

## Validation du formulaire

| Cas                            | Comportement                                   |
| ------------------------------ | ---------------------------------------------- |
| Prénom ou nom vide             | message d'erreur                               |
| Message vide                   | message d'erreur                               |
| Message < 10 caractères        | message d'erreur                               |
| Message > 1000 caractères      | message d'erreur                               |
| Données valides                | enregistrement + confirmation, formulaire vidé |
| Écriture du fichier impossible | message neutre + erreur dans les logs          |
| Méthode autre que GET / POST   | statut 405                                     |

## Bonnes pratiques

- Fichiers de moins de 100 lignes.
- Un main par rôle : CSS, vues, fonctionnalités.
- `htmlspecialchars()` sur les données affichées (protection XSS).
- Balises sémantiques : `header`, `main`, `form`, `label`, `output`, `footer`.
- Attributs `required`, `minlength`, `maxlength`, `autocomplete`.
- CSS mobile first : 1 colonne, puis adaptation dès 768 px.
- Aucune erreur technique affichée au visiteur.

## Méthode : TDD

Écrire le test, le lancer (il échoue), écrire le code, relancer (il réussit).

## Ce que j'ai appris

- `trim()` et `mb_strlen()` pour nettoyer et mesurer un texte accentué.
- `htmlspecialchars()` protège l'affichage contre le XSS.
- `try/catch` permet d'afficher un message neutre et de garder l'erreur technique dans les logs.
- Un test peut lui-même contenir une erreur (ici, un copier-coller).
- Séparer la logique de l'affichage rend le code plus simple à tester.

## Statut

Exercice terminé et validé.
