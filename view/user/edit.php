<h1>Modifier un utilisateur</h1>
<form method="POST" action="index.php?controller=user&action=update">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= $user['nom'] ?>" required><br>
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= $user['prenom'] ?>" required><br>
    <label>Email :</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
    <label>Mot de passe :</label>
    <input type="password" name="password" required><br>
    <button type="submit">Mettre à jour</button>
</form>
