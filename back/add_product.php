<?php
// Inclure la connexion à la base de données
require_once '../../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $category_id = htmlspecialchars($_POST['category_id']);
    $nom = htmlspecialchars($_POST['nom']);
    $description = htmlspecialchars($_POST['description']);
    
    // Gestion de l'upload de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_path = '../../uploads/' . basename($image_name);

        // Déplacer l'image dans le dossier 'uploads'
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            // Connexion à la base de données
            $pdo = Database::getInstance();

            // Préparer la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO products (category_id, nom, description, image, date_creation, date_modification) VALUES (?, ?, ?, ?, NOW(), NOW())");
            $stmt->execute([$category_id, $nom, $description, $image_path]);

            // Rediriger vers la page de gestion des produits après l'ajout
            header("Location: backofficeproduits.php");
            exit;
        } else {
            echo "Erreur lors de l'upload de l'image.";
        }
    } else {
        echo "L'image est obligatoire.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un Nouveau Produit</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category_id">Catégorie :</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <?php
                    // Récupérer toutes les catégories de la base de données
                    $pdo = Database::getInstance();
                    $categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $category):
                    ?>
                        <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>

    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

