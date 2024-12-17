<?php
require_once(__DIR__ . '/db.php'); // Correction du chemin absolu
function getAllCategories() {
    global $connexion;
    // Utilisez le nom exact de la table, avec des guillemets doubles si nécessaire
    $sql = 'SELECT * FROM categorie';
    $result = pg_query($connexion, $sql);

    if (!$result) {
        die("Erreur lors de l'exécution de la requête : " . pg_last_error($connexion));
    }

    return $result;
}
function deleteCategorie($id) {
    global $connexion;
    $id = (int) $id; // S'assurer que l'ID est un entier
    $sql = "DELETE FROM categorie WHERE id = $id";
    $result = pg_query($connexion, $sql);
    if (!$result) {
        die("Erreur lors de la suppression : " . pg_last_error($connexion));
    }
    return $result;
}
function addCategorie($libelle) {
    global $connexion;
    $libelle = pg_escape_string($connexion, $libelle); // Échapper les chaînes pour éviter les injections SQL
    $sql = "INSERT INTO categorie (libelle) VALUES ('$libelle')";
    $result = pg_query($connexion, $sql);
    if (!$result) {
        die("Erreur lors de l'ajout : " . pg_last_error($connexion));
    }
    return $result;
}
function updateCategorie($id, $libelle) {
    global $connexion;
    $id = (int) $id;
    $libelle = pg_escape_string($connexion, $libelle);
    $sql = "UPDATE categorie SET libelle = '$libelle' WHERE id = $id";
    $result = pg_query($connexion, $sql);
    if (!$result) {
        die("Erreur lors de la mise à jour : " . pg_last_error($connexion));
    }
    return $result;
}
function getCategorieById($id) {
    global $connexion;
    $id = (int) $id;
    $sql = "SELECT * FROM categorie WHERE id = $id";
    $result = pg_query($connexion, $sql);
    if (!$result) {
        die("Erreur lors de la récupération de la catégorie : " . pg_last_error($connexion));
    }
    return $result;
}
?>
