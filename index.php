<?php
// Définir le contrôleur par défaut si la variable n'est pas définie dans l'URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'produit';

// Afficher la barre de sélection
echo '<form method="GET" action="index.php">';
echo '<label for="controller">Sélectionner une section :</label>';
echo '<select name="controller" id="controller" onchange="this.form.submit()">';
echo '<option value="produit" ' . ($controller == 'produit' ? 'selected' : '') . '>Produits</option>';
echo '<option value="categorie" ' . ($controller == 'categorie' ? 'selected' : '') . '>Catégories</option>';
echo '<option value="user" ' . ($controller == 'user' ? 'selected' : '') . '>Utilisateurs</option>';
echo '</select>';
echo '</form>';

// Charger le contrôleur correspondant
switch ($controller) {
    case 'produit':
        require_once './controller/produitController.php';
        break;
    case 'user':
        require_once './controller/userController.php';
        break;
    case 'categorie':
        require_once './controller/categorieController.php';
        break;
    default:
        echo "Contrôleur non valide.";
        exit();
}

// Liste des actions disponibles pour chaque contrôleur
$actions = [
    'produit' => ['add', 'delete', 'save', 'edit', 'update', 'index'],
    'user' => ['add', 'delete', 'save', 'edit', 'update', 'list'],
    'categorie' => ['add', 'delete', 'save', 'edit', 'update', 'index']
];

// Vérifier si une action est spécifiée dans l'URL
$action = isset($_GET['action']) ? $_GET['action'] : null;

if ($action && in_array($action, $actions[$controller])) {
    // Vérifier si la fonction correspondant à l'action existe
    if (function_exists($action)) {
        $action(); // Appeler la fonction
    } else {
        echo "Action non valide.";
    }
} else {
    // Si aucune action n'est spécifiée, appeler l'action par défaut
    if ($controller == 'user') {
        require_once './view/user/list.php'; // Afficher les utilisateurs
    } elseif (function_exists('index')) {
        index(); // Afficher la liste pour les autres contrôleurs
    } else {
        echo "Aucune action par défaut définie.";
    }
}
?>
