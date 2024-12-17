<h1>Liste des utilisateurs</h1>
<div class="container">   
    <div class="add-user-link">
        <a href="index.php?controller=user&action=add" class="btn-actions">Ajouter un utilisateur</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = pg_fetch_assoc($users)) { ?>
                    <tr>
                        <!-- <td><?= $user['id'] ?></td> -->
                        <td><?= $user['nom'] ?></td>
                        <td><?= $user['prenom'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="index.php?controller=user&action=edit&id=<?= $user['id'] ?>" class="btn-actions edit">Modifier</a>
                            <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>" class="btn-actions delete">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
