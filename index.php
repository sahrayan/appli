<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Ajout produit</title>
</head>
<body>
    <!-- Menu de navigation -->
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recap.php">
                        Récapitulatif<?= isset($_SESSION['products']) ? ' (' . count($_SESSION['products']) . ')' : ''; ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Affichage du message de succès ou d'erreur -->
        <?php
        if (isset($_SESSION["message"])) {
            echo '<div class="alert alert-' . ($_SESSION["message"] == "Produit ajouté avec succès !" ? 'success' : 'danger') . '">';
            echo $_SESSION["message"];
            echo '</div>';
            unset($_SESSION["message"]); // On supprime le message après l'avoir affiché
        }
        ?>
        <!-- Formulaire d'ajout de produit -->
        <h1>Ajout produit</h1>
        <form action="traitement.php" method="post" class="container mt-5 border p-3">
            <div class="form-group">
                <label for="name">Nom du produit :</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Prix du produit :</label>
                <input type="number" name="price" id="price" class="form-control" step="any" required>
            </div>
            <div class="form-group">
                <label for="qtt">Quantité désirée :</label>
                <input type="number" name="qtt" id="qtt" class="form-control" value="1" min="1" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Ajouter le produit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>