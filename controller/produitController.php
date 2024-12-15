<?php
require_once('./model/produitModel.php');

function index() {
    // Récupérer tous les produits
    $produits = getAll();

    // Inclure la vue pour afficher la liste des produits
    require_once './view/produit/list.php';
}

function remove() {
    // Vérifier si l'ID est passé dans les paramètres GET
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        delete($id);
        header('Location: index.php?controller=produit');
        exit();
    } else {
        echo "Erreur : ID du produit non fourni.";
    }
}

function pageAdd() {
    // Inclure la vue pour ajouter un produit
    require_once './view/produit/add.php';
}

function save() {
    // Inclure la connexion à la base de données
    require_once(__DIR__ . '/../model/db.php');

    // Vérifier les données envoyées via POST
    $libelle = $_POST['libelle'];
    $qt = $_POST['qt'];  // Correction : Retirer la parenthèse supplémentaire
    $pu = $_POST['pu'];  // Correction : Retirer la parenthèse supplémentaire

    // Insérer le produit dans la base de données
    $result = add($libelle, $qt, $pu);  // Correction : Utilisation de la fonction `add`

    if ($result) {
        echo "Produit ajouté avec succès.";
        header("Location: index.php?controller=produit");
        exit();
    } else {
        echo "Erreur lors de l'ajout du produit.";
    }
}
?>
