<form action="?controller=produit&&action=update" method="POST">
    <input type="text" name="id" value="<?= $produit['id'] ?>" hidden><br>
    <label for="">Libelle</label>
    <input type="text" name="libelle" value="<?= $produit['libelle'] ?>"><br>
    <label for="">Quantité</label>
    <input type="text" name="quantite" value="<?= $produit['qt'] ?>"><br>
    <label for="">Prix Unitaire</label>
    <input type="text" name="prix" value="<?= $produit['pu'] ?>"><br>
    <label for="">Catégorie</label>
    <select name="idcat">""
        <?php while($c = pg_fetch_assoc($categories)) { ?>
            <option value="<?= $c['id'] ?>" <?= $produit['idcat'] == $c['id'] ? 'selected' : '' ?>>
                <?= $c['libelle'] ?>
            </option>
        <?php } ?>
    </select><br>
    <button type="submit">Modifier</button>
</form>
