<a href="?controller=user&action=add">ADD USERS</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php
    // Vérifiez si $users contient des données
    if (!empty($users)) {
        // Parcourir les utilisateurs récupérés
        foreach ($users as $p) {
            ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nom'] ?></td>
                <td><?= $p['prenom'] ?></td>
                <td><?= $p['email'] ?></td>
                <td>
                    <a href="?controller=user&action=delete&id=<?= urlencode($p['id']) ?>">Delete</a>
                    <a href="?controller=user&action=update&id=<?= urlencode($p['id']) ?>">Update</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='5'>Aucun utilisateur trouvé.</td></tr>";
    }
    ?>
</table>
