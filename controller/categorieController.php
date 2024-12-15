<?php
require_once('./model/categorieModel.php');

// Fonction pour afficher la liste des catégories
function index(){
    $categories = getAll();
    require_once './view/categorie/list.php';
}

// Fonction pour supprimer une catégorie
function remove(){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        delete($id); // Suppression dans la base de données
        header('Location: index.php?controller=categorie'); // Rediriger vers la liste
    } else {
        echo "Aucun identifiant de catégorie fourni pour la suppression.";
    }
}

// Fonction pour afficher la page d'ajout d'une catégorie
function pageAdd(){
    require_once './view/categorie/add.php';
}

// Fonction pour sauvegarder une nouvelle catégorie
function save(){
    if (isset($_POST['libelle'])) {
        $libelle = $_POST['libelle'];
        add($libelle); // Appeler le modèle pour ajouter la catégorie
        header('Location: index.php?controller=categorie'); // Rediriger vers la liste
    } else {
        echo "Erreur : le libellé de la catégorie est manquant.";
    }
}

// Fonction pour obtenir une catégorie spécifique pour la modification
function getCategorie(){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $categorie = pg_fetch_assoc(getById($id)); // Obtenir la catégorie depuis la base de données
        if ($categorie) {
            require_once './view/categorie/edit.php'; // Passer à la page d'édition
        } else {
            echo "Catégorie introuvable.";
        }
    } else {
        echo "Aucun identifiant de catégorie fourni.";
    }
}

// Fonction pour mettre à jour une catégorie
function update(){
    if (isset($_POST['id']) && isset($_POST['libelle'])) {
        $id = $_POST['id'];
        $libelle = $_POST['libelle'];
        updateCategorie($id, $libelle); // Appeler le modèle pour mettre à jour la catégorie
        header('Location: index.php?controller=categorie'); // Rediriger vers la liste
    } else {
        echo "Erreur : l'identifiant ou le libellé de la catégorie est manquant.";
    }
}
?>
