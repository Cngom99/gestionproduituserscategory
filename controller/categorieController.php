<?php
    require_once('./model/categorieModel.php');
    function index() {
        $categories = getAllCategories();
        if (!$categories) {
            die("Erreur : Impossible de récupérer les catégories.");
        }
        require_once './view/categorie/list.php';
    }
    function remove() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            die("Erreur : ID invalide pour la suppression.");
        }
        $result = deleteCategorie($id);

        if (!$result) {
            die("Erreur : Impossible de supprimer la catégorie.");
        }

        header('Location: index.php?controller=categorie');
        exit;
    }
    function pageAdd() {
        require_once './view/categorie/add.php';
    }
    function save() {
        $libelle = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);

        if (empty($libelle)) {
            die("Erreur : Le libellé est obligatoire.");
        }
        $result = addCategorie($libelle);

        if (!$result) {
            die("Erreur : Impossible d'ajouter la catégorie.");
        }

        header('Location: index.php?controller=categorie');
        exit;
    }
    function getCategorie() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            die("Erreur : ID invalide pour la récupération de la catégorie.");
        }
        $categorie = pg_fetch_assoc(getCategorieById($id));
        if (!$categorie) {
            die("Erreur : Catégorie introuvable.");
        }
        require_once './view/categorie/edit.php';
    }
    function update() {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $libelle = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);
        if (!$id || empty($libelle)) {
            die("Erreur : Données invalides pour la mise à jour.");
        }
        $result = updateCategorie($id, $libelle);
        if (!$result) {
            die("Erreur : Impossible de mettre à jour la catégorie.");
        }
        header('Location: index.php?controller=categorie');
        exit;
    }
?>
