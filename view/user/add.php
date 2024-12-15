<form method="POST" action="index.php?controller=user&action=save">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="motdepasse">Mot de passe:</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <input type="submit" value="Ajouter l'utilisateur">
</form>
