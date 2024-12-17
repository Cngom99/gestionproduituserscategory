<?php
require_once('./model/produitModel.php');
require_once('./model/categorieModel.php');

function index(){
   $produits = getAllProduits();
   require_once './view/produit/list.php';
}
function remove(){
    $id = $_GET['id'];
    delete($id);
    header('location:index.php?controller=produit');
}
function pageAdd(){
    $categories = getAllCategories();
    require_once './view/produit/add.php';
}
function save(){
    $libelle = $_POST['libelle'];
    $qt = $_POST['quantite'];
    $pu = $_POST['prix'];
    $idcat = $_POST['idcat']; // Récupérer l'ID de la catégorie
    add($libelle, $qt, $pu, $idcat);
    header('location:index.php?controller=produit');
}
function getProduit(){
    $id = $_GET['id'];
    $produit = pg_fetch_assoc(getById($id));
    $categories = getAllCategories(); // Charger toutes les catégories
    require_once './view/produit/edit.php';
}
function update(){
    $id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $qt = $_POST['quantite'];
    $pu = $_POST['prix'];
    $idcat = $_POST['idcat']; // Récupérer l'ID de la catégorie
    updateProduit($id, $libelle, $qt, $pu, $idcat);
    header('location:index.php?controller=produit');
}
?>
