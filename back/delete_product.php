<?php
require_once '../../controllers/ProductController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productController = new ProductController();
    $productController->deleteProduct($id);
    header("Location: backofficeproduits.php");
    exit;
} else {
    die("ID non spécifié.");
}
?>
<?php 
require_once 'C:\xampp\htdocs\site web 2\config\Database.php'; // Assurez-vous que ce chemin est correct
require_once 'C:\xampp\htdocs\site web 2\controllers\ProductController.php'; // Chemin vers le contrôleur des produits

// Vérifier que l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l'ID

    try {
        // Initialiser le modèle
        $productModel = new Products(); // Assurez-vous que vous avez une classe 'Products'

        // Supprimer le produit
        $productModel->deleteProduct($id);

        // Redirection après suppression
        header("Location: backofficeproduits.php");
        exit;
    } catch (Exception $e) {
        die("Erreur lors de la suppression du produit : " . $e->getMessage());
    }
} else {
    die("ID non spécifié pour la suppression.");
}
?>
