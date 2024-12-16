<?php
require_once '../../controllers/ProductController.php';

if (!isset($_GET['id'])) {
    die("ID du produit non spécifié.");
}

$id = $_GET['id'];
$productController = new ProductController();
$product = $productController->showProduct($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $image = $_POST['image'];  // Vous pouvez ajouter un traitement pour télécharger l'image

    $productController->updateProduct($id, $nom, $description, $category_id, $image);
    header("Location: backofficeproduits.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Produit</title>
</head>
<body>
    <div class="container">
        <h2>Modifier le Produit</h2>
        <form action="edit_product.php?id=<?= $product['id'] ?>" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= htmlspecialchars($product['nom']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required><?= htmlspecialchars($product['description']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <input type="text" name="category_id" id="category_id" class="form-control" value="<?= htmlspecialchars($product['category_id']) ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image" class="form-control" value="<?= htmlspecialchars($product['image']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
