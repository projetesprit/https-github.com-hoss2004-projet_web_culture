<?php
require_once '../../controllers/ProductController.php';

$productController = new ProductController();
$products = $productController->listProducts();

?>
<?php foreach ($products as $product): ?>
    <div class="product">
        <h3><?= htmlspecialchars($product['nom']) ?></h3>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <form action="toggle_favorite.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <button type="submit" class="btn btn-<?= $product['is_favorite'] ? 'danger' : 'success' ?>">
                <?= $product['is_favorite'] ? 'Retirer des Favoris' : 'Ajouter aux Favoris' ?>
            </button>
        </form>
    </div>
<?php endforeach; ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Produits</title>
</head>
<body>
    <div class="container">
        <h2>Nos Produits</h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['nom']) ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['nom']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
