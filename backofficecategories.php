<?php
// Inclure la connexion à la base de données
require_once '../../config/Database.php';

$pdo = Database::getInstance();
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>

    <!-- Inclure les fichiers CSS -->
    <!-- Bootstrap CSS (Framework CSS) -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS (Pour les icônes) -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Style personnalisé -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Début du container de la template -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">
            <!-- Header -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index.html">
                            <img src="images/logo.png" alt="Logo">
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>Admin</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar (Menu) -->
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <ul class="pcoded-item pcoded-left-item">
                            <li>
                                <a href="backofficecategories.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext">Catégories</span>
                                </a>
                            </li>
                            <li>
                                <a href="backofficeproduits.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-package"></i></span>
                                    <span class="pcoded-mtext">Produits</span>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i></span>
                                    <span class="pcoded-mtext">Déconnexion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Contenu principal -->
                <div class="pcoded-content">
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5>Gestion des Catégories</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table des Catégories -->
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <h2>Liste des Catégories</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Date Création</th>
                                                <th>Date Modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($categories as $category): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($category['id']) ?></td>
                                                    <td><?= htmlspecialchars($category['nom']) ?></td>
                                                    <td><?= htmlspecialchars($category['description']) ?></td>
                                                    <td><?= htmlspecialchars($category['date_creation']) ?></td>
                                                    <td><?= htmlspecialchars($category['date_modification']) ?></td>
                                                    <td>
                                                        <a href="../../controllers/CategoryController.php?action=edit&id=<?= $category['id'] ?>"
                                                            class="btn btn-primary">Modifier</a>
                                                        <a href="../../controllers/CategoryController.php?action=delete&id=<?= $category['id'] ?>"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">Supprimer</a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <!-- Formulaire d'ajout -->
                                    <h2>Ajouter une Nouvelle Catégorie</h2>
                                    <form action="add_category.php" method="POST">
                                        <div class="form-group">
                                            <label for="nom">Nom :</label>
                                            <input type="text" id="nom" name="nom" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description :</label>
                                            <textarea id="description" name="description" class="form-control"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Ajouter</button>
                                    </form>
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
    <script src="js/jquery/jquery.min.js"></script> <!-- jQuery -->
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap -->
    <script src="js/jquery-ui/jquery-ui.min.js"></script> <!-- jQuery UI -->
    <script src="js/jquery.slimscroll.js"></script> <!-- Slimscroll -->
    <script src="js/popper.js"></script> <!-- Popper.js -->
    <script src="js/raphael.js"></script> <!-- Raphael.js -->
    <script src="js/bootstrap-growl.min.js"></script> <!-- Bootstrap Growl -->
    <script src="js/common-pages.js"></script> <!-- Pages -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbars -->
    <script src="js/jquery.mousewheel.min.js"></script> <!-- Mousewheel Plugin -->
    <script src="js/pcoded.min.js"></script> <!-- Main JS -->
    <script src="js/script.js"></script> <!-- Custom Scripts -->
    <script src="js/script.min.js"></script> <!-- Minified Custom Scripts -->
    <script src="js/SmoothScroll.js"></script> <!-- Smooth Scroll -->
    <script src="js/vertical-layout.min.js"></script> <!-- Vertical Layout JS -->
</body>

</html>