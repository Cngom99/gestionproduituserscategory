<div class="container">
    <div class="add-categorie-link">
        <a href="?controller=categorie&&action=add" class="btn-actions">Add Catégorie</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Libelle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($c = pg_fetch_assoc($categories)) { ?>
                    <tr>
                        <!-- <td><?= $c['id'] ?></td> -->
                        <td><?= $c['libelle'] ?></td>
                        <td>
                            <a href="?controller=categorie&&action=delete&&id=<?= $c['id'] ?>" class="btn-actions delete">Delete</a>
                            <a href="?controller=categorie&&action=edit&&id=<?= $c['id'] ?>" class="btn-actions edit">Update</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
