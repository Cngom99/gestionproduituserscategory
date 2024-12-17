<form action="?controller=produit&&action=save" method="POST">
    <label for="">Libelle</label>
    <input type="text" name="libelle"><br>
    <label for="">Quantité</label>
    <input type="text" name="quantite"><br>
    <label for="">Prix Unitaire</label>
    <input type="text" name="prix"><br>
    <label for="">Catégorie</label>
    <select name="idcat">
        <?php while($c = pg_fetch_assoc($categories)) { ?>
            <option value="<?= $c['id'] ?>"><?= $c['libelle'] ?></option>
        <?php } ?>
    </select><br>
    <button type="submit">Ajouter</button>
</form>
