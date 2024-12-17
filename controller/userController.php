<?php
    require_once('./model/userModel.php');
    function index() {
        $users = getAllUsers();
        require_once './view/user/list.php';
    }
    function pageAdd() {
        require_once './view/user/add.php';
    }
    function save() {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
            addUser($nom, $prenom, $email, $password);
            header('Location: index.php?controller=user');
        } else {
            echo "Email invalide ou mot de passe trop court.";
        }
    }
    function getUser() {
        $id = $_GET['id'];
        $user = pg_fetch_assoc(getUserById($id));
        require_once './view/user/edit.php';
    }
    function update() {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
            updateUser($id, $nom, $prenom, $email, $password);
            header('Location: index.php?controller=user');
        } else {
            echo "Email invalide ou mot de passe trop court.";
        }
    }
    function remove() {
        $id = $_GET['id'];
        deleteUser($id);
        header('Location: index.php?controller=user');
    }
?>
