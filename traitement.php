<?php
session_start();

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if ($name && $price && $qtt) {
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt
        ];

        if (!isset($_SESSION["products"])) {
            $_SESSION["products"] = array();
        }

        $_SESSION["products"][] = $product;

        // Message de succès
        $_SESSION["message"] = "Produit ajouté avec succès !";
    } else {
        // Message d'erreur
        $_SESSION["message"] = "Erreur : Veuillez remplir correctement tous les champs !";
    }
}

header("Location:index.php");
exit();
?>