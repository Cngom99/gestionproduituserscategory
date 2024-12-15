
<a href="?controller=produit&&action=add">ADD PRODUCT</a>
<table>
    <tr>
        <th>ID</th>
        <th>Libelle</th>
        <th>Quantite</th>
        <th>Prix Unitaire</th>
    </tr>
    <?php while( $p = pg_fetch_assoc($produits)){ ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['libelle'] ?></td>
            <td><?= $p['qt'] ?></td>
            <td><?= $p['pu'] ?></td>
            <td>
                <a href="?controller=produit&&action=delete&id=<?= $p['id'] ?>">Delete</a>
                <a href="?controller=produit&&action=update&id=<?= $p['id'] ?>">Update</a>
            </td>
        </tr>
    <?php } ?>    
</table>