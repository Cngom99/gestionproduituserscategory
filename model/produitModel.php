<?php
require_once('./model/db.php');
function getAllProduits() {
    global $connexion;
    $sql = "SELECT p.*, c.libelle AS categorie FROM produit p JOIN categorie c ON p.idcat = c.id";
    return pg_query($connexion, $sql);
}
function delete($id){
    global $connexion;
    $sql = "DELETE FROM produit WHERE id = $id";
    return pg_query($connexion, $sql);
}
function add($libelle, $quantite, $prix, $idcat){
    global $connexion;
    $sql = "INSERT INTO produit (libelle, qt, pu, idcat) VALUES 
            ('$libelle', $quantite, $prix, $idcat)";
    return pg_query($connexion, $sql);
}
function updateProduit($id, $libelle, $quantite, $prix, $idcat) {
    $connexion = pg_connect("host=localhost dbname=l3_iage_2024 user=postgres password=passer");
    $query = "UPDATE produit 
              SET libelle = $1, qt = $2, pu = $3, idcat = $4
              WHERE id = $5";
    $result = pg_query_params($connexion, $query, array($libelle, $quantite, $prix, $idcat, $id));
    if ($result) {
        return true; 
    } else {
        return false; 
    }
}
function getById($id){
    global $connexion;
    $sql = "SELECT * FROM produit WHERE id = $id";
    return pg_query($connexion, $sql);
}
?>
