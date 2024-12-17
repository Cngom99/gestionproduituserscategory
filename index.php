<?php
echo "
    <nav>
        <ul>
            <li><a href='?controller=produit'>Produits</a></li>
            <li><a href='?controller=categorie'>Catégories</a></li>
            <li><a href='?controller=user'>Utilisateurs</a></li>
        </ul>
    </nav>
";
$controller = isset($_GET["controller"]) ? $_GET["controller"] : 'produit';
$validControllers = ['produit', 'categorie', 'user'];
if (!in_array($controller, $validControllers)) {
    die("Erreur : Contrôleur inconnu !");
}
$controllerFile = "./controller/{$controller}Controller.php";
if (!file_exists($controllerFile)) {
    die("Erreur : Fichier contrôleur introuvable !");
}
require_once $controllerFile;
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'produit':
        switch ($action) {
            case 'add':
                pageAdd();
                break;
            case 'delete':
                remove();
                break;
            case 'save':
                save();
                break;
            case 'edit':
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    getProduit($_GET['id']);
                } else {
                    echo "Erreur : ID manquant pour l'édition !";
                }
                break;
            case 'update':
                update();
                break;
            case 'index':
            default:
                index();
                break;
        }
        break;

    case 'categorie':
        switch ($action) {
            case 'add':
                pageAdd();
                break;
            case 'delete':
                remove();
                break;
            case 'save':
                save();
                break;
            case 'edit':
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    getCategorie($_GET['id']);
                } else {
                    echo "Erreur : ID manquant pour l'édition !";
                }
                break;
            case 'update':
                update();
                break;
            case 'index':
            default:
                index();
                break;
        }
        break;

    case 'user':
        switch ($action) {
            case 'add':
                pageAdd();
                break;
            case 'delete':
                remove();
                break;
            case 'save':
                save();
                break;
            case 'edit':
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    getUser($_GET['id']);
                } else {
                    echo "Erreur : ID manquant pour l'édition !";
                }
                break;
            case 'update':
                update();
                break;
            case 'index':
            default:
                index();
                break;
        }
        break;

    default:
        echo "Erreur : Contrôleur inconnu !";
}
?>
