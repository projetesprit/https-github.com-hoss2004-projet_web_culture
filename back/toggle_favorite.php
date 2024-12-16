<?php
require_once '../../config/Database.php';
require_once '../../models/ProductModel.php';
require_once '../../controllers/ProductController.php';

$productController = new ProductController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Basculer le statut favori
    if ($productController->toggleFavorite($product_id)) {
        header('Location: products.php'); // Redirigez vers la liste des produits
        exit;
    } else {
        echo "Erreur lors de la mise à jour du produit.";
    }
} else {
    echo "Requête invalide.";
}
