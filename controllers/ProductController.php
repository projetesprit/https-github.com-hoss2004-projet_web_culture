<?php
require_once '../../models/ProductModel.php';
class ProductController {
    public function listProducts() {
        $pdo = Database::getInstance();
        $sql = "
            SELECT p.id, p.nom, p.description, p.image, p.date_creation, p.date_modification, c.nom AS category_name
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            ORDER BY p.date_creation DESC
        ";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __construct() {
        $this->ProductModel = new ProductModel();
    }

    // Créer un produit
    public function createProduct($nom, $description, $category_id, $image) {
        return $this->ProductModel->createProduct($nom, $description, $category_id, $image);
    }

    

    // Afficher un produit
    public function showProduct($id)
    {
        return $this->ProductModel->getProductById($id);
    }

    // Mettre à jour un produit
    public function updateProduct($id, $nom, $description, $category_id, $image) {
        return $this->ProductModel->updateProduct($id, $nom, $description, $category_id, $image);
    }

    // Supprimer un produit
    public function deleteProduct($id) {
        return $this->ProductModel->deleteProduct($id);
    }
    public function toggleFavorite($product_id) {
        // Récupérer le statut actuel du produit
        $product = $this->getProductById($product_id);
    
        if (!$product) {
            return false;
        }
    
        // Basculer le statut favori
        $new_status = $product['is_favorite'] == 1 ? 0 : 1;
        return $this->productModel->toggleFavorite($product_id, $new_status);
    }
    
}
?>
