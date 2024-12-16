<?php
require_once '../../config/Database.php';

class ProductModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    // Créer un produit
    public function createProduct($nom, $description, $category_id, $image) {
        $stmt = $this->pdo->prepare("INSERT INTO products (nom, description, category_id, image, date_creation, date_modification) 
                                     VALUES (?, ?, ?, ?, NOW(), NOW())");
        return $stmt->execute([$nom, $description, $category_id, $image]);
    }

    // Obtenir tous les produits
    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtenir un produit par ID
    public function getProductById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un produit
    public function updateProduct($id, $nom, $description, $category_id, $image) {
        $stmt = $this->pdo->prepare("UPDATE products SET nom = ?, description = ?, category_id = ?, image = ?, date_modification = NOW() WHERE id = ?");
        return $stmt->execute([$nom, $description, $category_id, $image, $id]);
    }

    // Supprimer un produit
    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function toggleFavorite($product_id, $is_favorite) {
        $pdo = Database::getInstance();
    
        // Préparer la requête de mise à jour
        $stmt = $pdo->prepare("UPDATE products SET is_favorite = ? WHERE id = ?");
        $stmt->execute([$is_favorite, $product_id]);
    
        return $stmt->rowCount() > 0;
    }
    
}
?>
