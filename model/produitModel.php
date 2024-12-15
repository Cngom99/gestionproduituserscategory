<?php

require_once('./model/db.php');

function getAll(){
    global $connexion;
    $sql ="SELECT * FROM produit";
    return pg_query($connexion,$sql);
}

function delete($id){
    global $connexion;
    $sql ="DELETE FROM produit WHERE id =$id";
   return pg_query($connexion,$sql);
}

function add($libelle,$quantite,$prix){
    global $connexion;
    $sql ="INSERT INTO produit (libelle,qt,pu,idcat) values
     ('$libelle',$quantite,$prix,1)";
   return pg_query($connexion,$sql);
}

function update($id,$libelle,$quantite,$prix){
    global $connexion;
    $sql ="UPDATE produit SET libelle='$libelle',qt=$quantite,pu=$prix
    where id=$id";
   return pg_query($connexion,$sql);
}
// model/produitModel.php

function saveProduit($libelle, $qt, $pu) {
    global $db; // Assurez-vous que $db est déclaré global pour être accessible

    // Vérifier la connexion
    if (!$db) {
        die("Erreur : la connexion à la base de données n'est pas disponible.");
    }

    // Préparer la requête SQL
    $query = "INSERT INTO produit (libelle, qt, pu) VALUES ($1, $2, $3)";
    $params = [$libelle, $qt, $pu];

    // Exécuter la requête
    $result = pg_query_params($db, $query, $params);

    // Vérifier si la requête a réussi
    if (!$result) {
        die("Erreur lors de l'insertion du produit : " . pg_last_error($db));
    }

    return $result;
}

?>


