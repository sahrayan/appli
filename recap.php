<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Fichier CSS personnalisé -->

    <title>Récapitulatif des produits</title>
</head>
<body>
        <!-- Menu de navigation -->
        <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recap.php">Récapitulatif</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <?php 
            if(!isset($_SESSION["products"]) || empty($_SESSION["products"])) {
                echo "<p>Aucun produit en session...</p>";
            } else {
                echo '<table class="table">',
                        '<thead class="thead-light">',
                            '<tr>',
                                '<th>#</th>',
                                '<th>Nom</th>',
                                '<th>Prix</th>',
                                '<th>Quantité</th>',
                                '<th>Total</th>',
                            '</tr>',
                        '</thead>',
                        '<tbody>';
                $totalGeneral = 0;
                foreach($_SESSION["products"] as $index => $product) {
                    echo '<tr>',
                            '<td>'.$index.'</td>',
                            '<td>'.$product["name"].'</td>',
                            '<td>'.number_format($product["price"], 2, ",", "&nbsp;").'€</td>',
                            '<td>'.$product["qtt"].'</td>',
                            '<td>'.number_format($product["total"], 2, ",", "&nbsp;").'€</td>',
                        '</tr>';
                    $totalGeneral += $product["total"];
                }
                echo '<tr>',
                        '<td colspan="4" class="text-right"><strong>Total général : </strong></td>',
                        '<td><strong>'.number_format($totalGeneral, 2, ",", "&nbsp;").'€</strong></td>',
                    '</tr>',
                '</tbody>',
                '</table>';
            }
        ?>
    </div>
</body>
</html>
