<?php

require_once('./model/db.php');

// Récupérer tous les utilisateurs
// userModel.php
function getAllUsers() {
    global $connexion;
    $sql = "SELECT id, nom, prenom, email FROM users";  // Assurez-vous que ces colonnes existent
    $result = pg_query($connexion, $sql);

    if ($result) {
        $users = pg_fetch_all($result);  // Récupérer toutes les lignes sous forme de tableau associatif
        // Afficher les résultats pour le débogage
        if (empty($users)) {
            echo "Aucun utilisateur trouvé.";
        } else {
            echo "<pre>";
            print_r($users);  // Afficher les utilisateurs pour vérifier les données
            echo "</pre>";
        }
        return $users;
    } else {
        echo "Erreur de requête: " . pg_last_error($connexion);
        return [];
    }
}


// Supprimer un utilisateur par ID
function deleteUser($id) {
    global $connexion;

    // Sécurisation avec pg_query_params
    $sql = "DELETE FROM users WHERE id = $1";
    $params = [$id];
    $result = pg_query_params($connexion, $sql, $params);

    // Retourner le résultat pour vérifier le succès de l'opération
    return $result;
}

// Ajouter un nouvel utilisateur
function addUser($nom, $prenom, $email, $mot_de_passe) {
    global $connexion;

    // Sécurisation avec pg_query_params
    $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES ($1, $2, $3, $4)";
    $params = [$nom, $prenom, $email, $mot_de_passe];
    $result = pg_query_params($connexion, $sql, $params);

    // Retourner le résultat pour vérifier si l'insertion a réussi
    return $result;
}

// Mettre à jour un utilisateur existant
function updateUser($id, $nom, $prenom, $email, $mot_de_passe) {
    global $connexion;

    // Sécurisation avec pg_query_params
    $sql = "UPDATE users SET nom = $1, prenom = $2, email = $3, mot_de_passe = $4 WHERE id = $5";
    $params = [$nom, $prenom, $email, $mot_de_passe, $id];
    $result = pg_query_params($connexion, $sql, $params);

    // Retourner le résultat pour vérifier si la mise à jour a réussi
    return $result;
}

// Fonction pour récupérer un utilisateur par ID
function getUserById($id) {
    global $connexion;

    // Sécurisation avec pg_query_params
    $sql = "SELECT * FROM users WHERE id = $1";
    $result = pg_query_params($connexion, $sql, [$id]);

    if ($result) {
        return pg_fetch_assoc($result);  // Retourne l'utilisateur sous forme de tableau associatif
    }

    // Retourne null si aucun utilisateur n'est trouvé
    return null;
}

?>
