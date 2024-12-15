<!-- view/home/home.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion Produits et Catégories</title>
    <!-- Ajouter Bootstrap 4 ou 5 pour le design -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style supplémentaire */
        .container {
            margin-top: 50px;
        }
        .btn-home {
            margin: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5271FF;">
    <a class="navbar-brand" href="#">Gestion Produits et Catégories</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=produit">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=categorie">Catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=user">Utilisateurs</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Contenu principal -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Bienvenue sur l'application de gestion des produits et catégories</h1>
            <p class="lead">Gérez vos produits, catégories et utilisateurs depuis cette plateforme.</p>

            <!-- Liens vers les différentes sections -->
            <div>
                <a href="index.php?controller=produit" class="btn btn-primary btn-home">Gérer les Produits</a>
                <a href="index.php?controller=categorie" class="btn btn-success btn-home">Gérer les Catégories</a>
                <a href="index.php?controller=user" class="btn btn-info btn-home">Gérer les Utilisateurs</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts nécessaires pour Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
