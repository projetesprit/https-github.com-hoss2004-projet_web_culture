<?php
require_once '../../config/Database.php';

class Categories {
    // Code de la classe
    Public function getProductsByCategory($categoryId) 
    {
        // Connexion à la base de données
        $pdo = Database::getInstance();

        // Requête SQL pour récupérer les produits associés à une catégorie
        $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        // Exécute la requête
        $stmt->execute();

        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO:
    }




    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAllCategories()
    {
        $stmt = $this->pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCategory($nom, $description)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (nom, description, date_creation, date_modification) VALUES (?, ?, NOW(), NOW())");
        $stmt->execute([$nom, $description]);
    }

    public function updateCategory($id, $nom, $description)
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET nom = ?, description = ?, date_modification = NOW() WHERE id = ?");
        $stmt->execute([$nom, $description, $id]);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);
    }
    
}
?>
