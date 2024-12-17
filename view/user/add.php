<h1>Ajouter un utilisateur</h1>
<form method="POST" action="index.php?controller=user&action=save">
    <label>Nom :</label>
    <input type="text" name="nom" required><br>
    <label>Prénom :</label>
    <input type="text" name="prenom" required><br>
    <label>Email :</label>
    <input type="email" name="email" required><br>
    <label>Mot de passe :</label>
    <input type="password" name="password" required><br>
    <button type="submit">Enregistrer</button>
</form>
