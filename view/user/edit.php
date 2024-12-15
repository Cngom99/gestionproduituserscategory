<form action="?controller=users&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>"><br>

    <label for="nom">Nom:</label>
    <input type="text" name="nom" value="<?= $user['nom'] ?>" required><br>

    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" value="<?= $user['prenom'] ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br>

    <label for="mot_de_passe">Mot de Passe:</label>
    <input type="password" name="mot_de_passe"><br> <!-- Champ de mot de passe optionnel -->

    <button type="submit">Mettre à jour l'utilisateur</button>
</form>
