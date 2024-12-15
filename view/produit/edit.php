<form action="?controller=produit&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $produit['id'] ?>"><br>

    <label for="libelle">Libelle:</label>
    <input type="text" name="libelle" value="<?= $produit['libelle'] ?>" required><br>

    <label for="quantite">Quantite:</label>
    <input type="number" name="quantite" value="<?= $produit['qt'] ?>" required><br>

    <label for="prix">Prix Unitaire:</label>
    <input type="number" name="prix" value="<?= $produit['pu'] ?>" required><br>

    <button type="submit">Update</button>
</form>
