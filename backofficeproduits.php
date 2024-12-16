<?php
require_once '../../controllers/ProductController.php';

$productController = new ProductController();
$products = $productController->listProducts();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>

    <!-- Inclure les fichiers CSS -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">
            <!-- Header -->
            <nav class="navbar header-navbar pcoded-header">
                <!-- Contenu du Header -->
            </nav>

            <!-- Sidebar (Menu) -->
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <!-- Contenu du Menu -->
                </nav>

                <!-- Contenu principal -->
                <div class="pcoded-content">
                    <div class="page-header">
                        <div class="page-block">
                            <h5>Gestion des Produits</h5>
                        </div>
                    </div>

                    <!-- Table des Produits -->
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <h2>Liste des Produits</h2>
                                    <a href="add_product.php" class="btn btn-success">Ajouter un produit</a>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Catégorie</th>
                                                <th>Date Création</th>
                                                <th>Date Modification</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $product): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($product['id']) ?></td>
                                                    <td><?= htmlspecialchars($product['nom']) ?></td>
                                                    <td><?= htmlspecialchars($product['description']) ?></td>
                                                    <td><?= htmlspecialchars($product['category_name']) ?></td>
                                                    <td><?= htmlspecialchars($product['date_creation']) ?></td>
                                                    <td><?= htmlspecialchars($product['date_modification']) ?></td>
                                                    <td><img src="../../uploads/<?= htmlspecialchars($product['image']) ?>" alt="Image produit" width="100"></td>
                                                    <td>
                                                        <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-primary">Modifier</a>
                                                        <a href="delete_product.php?id=<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Contenu principal -->
            </div>
        </div>
    </div>

    <!-- Inclure les fichiers JS -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/raphael.js"></script>
    <script src="js/bootstrap-growl.min.js"></script>
    <script src="js/common-pages.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>
    <script src="js/pcoded.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script.min.js"></script>
    <script src="js/SmoothScroll.js"></script>
    <script src="js/vertical-layout.min.js"></script>
</body>

</html>
