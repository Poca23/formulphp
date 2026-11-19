<form method="POST">
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" value="<?= e($donnees['prenom']) ?>" autocomplete="given-name"
        required>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= e($donnees['nom']) ?>" autocomplete="family-name" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" rows="6" minlength="10" maxlength="1000"
        required><?= e($donnees['message']) ?></textarea>

    <button type="submit">Envoyer le message</button>
</form>