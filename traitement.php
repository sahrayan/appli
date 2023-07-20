<?php
session_start(); 

if (isset($_POST['submit'])) { 

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS); 
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); 
    if ($name && $price !== false && $qtt !== false) {

        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt
        ];

        if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) {
            $_SESSION["products"] = array(); // Initialise la session si elle est vide
        }

        $_SESSION["products"][] = $product; // Ajoute le produit à la session
    }
} 

header("Location: index.php"); // Redirige l'utilisateur vers la page index.php
?>
