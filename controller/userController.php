<?php
// Exemple d'utilisation dans le contrôleur
// userController.php
function index() {
    global $connexion;
    $users = getAllUsers();  // Récupérer les utilisateurs depuis le modèle

    // Vérifier si les utilisateurs sont récupérés
    if (empty($users)) {
        echo "Aucun utilisateur trouvé.";
    }

    require_once './view/user/list.php';  // Charger la vue pour afficher la liste des utilisateurs
}



// Fonction pour ajouter un utilisateur
function save() {
    global $connexion;

    // Vérifier si le formulaire a été soumis et que les données sont présentes
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'])) {
        // Utiliser pg_escape_string pour éviter les injections SQL
        $nom = pg_escape_string($connexion, $_POST['nom']);
        $prenom = pg_escape_string($connexion, $_POST['prenom']);
        $email = pg_escape_string($connexion, $_POST['email']);
        $mot_de_passe = pg_escape_string($connexion, $_POST['mot_de_passe']);

        // Requête SQL pour insérer un nouvel utilisateur
        $query = "INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";

        // Exécution de la requête
        $result = pg_query($connexion, $query);

        if ($result) {
            // Redirection vers la page des utilisateurs après ajout réussi
            header("Location: index.php?controller=user");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur.";
        }
    } else {
        echo "Données invalides ou formulaire non soumis.";
    }
}

// Page d'ajout d'un utilisateur
function pageAdd() {
    require_once './view/user/add.php';  // Affiche le formulaire d'ajout d'un utilisateur
}

// Supprimer un utilisateur
function remove() {
    // Vérifier si l'ID de l'utilisateur est présent
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Appeler la fonction du modèle pour supprimer l'utilisateur
        deleteUser($id);

        // Rediriger vers la liste des utilisateurs après la suppression
        header('Location: index.php?controller=user');
        exit();
    } else {
        echo "Aucun ID d'utilisateur fourni.";
    }
}

// Fonction pour obtenir un utilisateur par ID
function getUser() {
    // Vérifier si l'ID est passé dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Appeler la fonction du modèle pour obtenir l'utilisateur par son ID
        $user = getUserById($id);

        // Afficher le formulaire d'édition avec les données de l'utilisateur
        require_once './view/user/edit.php';
    } else {
        echo "Aucun utilisateur trouvé pour l'ID spécifié.";
    }
}

// Mettre à jour un utilisateur
function update() {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'])) {
        // Récupérer les données du formulaire
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // Appeler la fonction du modèle pour mettre à jour l'utilisateur
        updateUser($id, $nom, $prenom, $email, $mot_de_passe);

        // Rediriger vers la liste des utilisateurs après la mise à jour
        header('Location: index.php?controller=user');
        exit();
    } else {
        echo "Données du formulaire invalides ou non soumises.";
    }
}

?>
