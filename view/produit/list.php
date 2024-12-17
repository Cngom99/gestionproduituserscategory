<body>
    <div class="container">
        <div class="add-product-link">
            <a href="?controller=produit&&action=add">Ajouter un Produit</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Libelle</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($p = pg_fetch_assoc($produits)) { ?>
                    <tr>
                        <!-- <td><?= $p['id'] ?></td> -->
                        <td><?= $p['libelle'] ?></td>
                        <td><?= $p['qt'] ?></td>
                        <td><?= $p['pu'] ?></td>
                        <td><?= $p['categorie'] ?></td>
                        <td>
                            <a href="?controller=produit&&action=delete&id=<?= $p['id'] ?>" class="btn-actions delete">Supprimer</a>
                            <a href="?controller=produit&&action=edit&id=<?= $p['id'] ?>" class="btn-actions edit">Modifier</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
