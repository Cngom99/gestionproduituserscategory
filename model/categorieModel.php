<?php

require_once('./model/db.php');

// Fonction pour obtenir toutes les catégories
function getAll(){
    global $connexion;
    $sql = "SELECT * FROM categorie";
    $result = pg_query($connexion, $sql);
    if (!$result) {
        echo "Erreur dans la requête : " . pg_last_error($connexion);
        exit();
    }
    return $result;
}

// Fonction pour supprimer une catégorie
function delete($id){
    global $connexion;
    $sql = "DELETE FROM categorie WHERE id = $1"; // Utilisation d'un paramètre
    $result = pg_query_params($connexion, $sql, array($id));
    if (!$result) {
        echo "Erreur dans la suppression de la catégorie : " . pg_last_error($connexion);
        exit();
    }
    return $result;
}

// Fonction pour ajouter une nouvelle catégorie
function add($libelle){
    global $connexion;
    $sql = "INSERT INTO categorie (libelle) VALUES ($1)"; // Utilisation d'un paramètre
    $result = pg_query_params($connexion, $sql, array($libelle));
    if (!$result) {
        echo "Erreur dans l'ajout de la catégorie : " . pg_last_error($connexion);
        exit();
    }
    return $result;
}

// Fonction pour mettre à jour une catégorie
function updateCategorie($id, $libelle){
    global $connexion;
    $sql = "UPDATE categorie SET libelle = $1 WHERE id = $2"; // Utilisation d'un paramètre
    $result = pg_query_params($connexion, $sql, array($libelle, $id));
    if (!$result) {
        echo "Erreur dans la mise à jour de la catégorie : " . pg_last_error($connexion);
        exit();
    }
    return $result;
}

// Fonction pour obtenir une catégorie par son ID
function getById($id){
    global $connexion;
    $sql = "SELECT * FROM categorie WHERE id = $1"; // Utilisation d'un paramètre
    $result = pg_query_params($connexion, $sql, array($id));
    if (!$result) {
        echo "Erreur dans la récupération de la catégorie : " . pg_last_error($connexion);
        exit();
    }
    return $result;
}

?>
