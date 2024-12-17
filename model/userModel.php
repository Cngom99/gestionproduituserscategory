<?php
function getAllUsers() {
    $conn = pg_connect("host=localhost dbname=l3_iage_2024 user=postgres password=root");
    $query = "SELECT * FROM users";
    return pg_query($conn, $query);
}
function addUser($nom, $prenom, $email, $password) {
    $conn = pg_connect("host=localhost dbname=l3_iage_2024 user=postgres password=passer");
    $query = "INSERT INTO users (nom, prenom, email, password) VALUES ($1, $2, $3, $4)";
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash du mot de passe
    return pg_query_params($conn, $query, array($nom, $prenom, $email, $hashedPassword));
}
function getUserById($id) {
    $conn = pg_connect("host=localhost dbname=l3_iage_2024 user=postgres password=passer");
    $query = "SELECT * FROM users WHERE id = $1";
    return pg_query_params($conn, $query, array($id));
}
function updateUser($id, $nom, $prenom, $email, $password) {
    $conn = pg_connect("host=localhost dbname=l3_iage_2024 user=postgres password=passer");
    $query = "UPDATE users SET nom = $1, prenom = $2, email = $3, password = $4 WHERE id = $5";
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    return pg_query_params($conn, $query, array($nom, $prenom, $email, $hashedPassword, $id));
}
function deleteUser($id) {
    $conn = pg_connect("host=localhost dbname=l3_iage_2024 user=postgres password=passer");
    $query = "DELETE FROM users WHERE id = $1";
    return pg_query_params($conn, $query, array($id));
}
?>
