<?php
require_once 'C:\xampp\htdocs\site web 2\config\Database.php'; // Assurez-vous que ce chemin est correct

require_once 'C:\xampp\htdocs\site web 2\controllers\CategoryController.php';

// Vérifier que l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l'ID

    try {
        // Initialiser le modèle
        $categoryModel = new Categories();

        // Supprimer la catégorie
        $categoryModel->deleteCategory($id);

        // Redirection après suppression
        header("Location: backofficecategories.php");
        exit;
    } catch (Exception $e) {
        die("Erreur lors de la suppression de la catégorie : " . $e->getMessage());
    }
} else {
    die("ID non spécifié pour la suppression.");
}
?>