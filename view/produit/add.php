<form action="index.php?controller=produit&action=save" method="POST">
    <label for="libelle">Libellé :</label>
    <input type="text" id="libelle" name="libelle" required>

    <label for="qt">Quantité :</label>
    <input type="number" id="qt" name="qt" required>

    <label for="pu">Prix Unitaire :</label>
    <input type="number" id="pu" name="pu" step="0.01" required>

    <button type="submit">Ajouter Produit</button>
</form>
