<?php
require_once '../../config/Database.php'; // Assurez-vous que ce chemin est correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $description = htmlspecialchars($_POST['description']);
    $category_id = intval($_POST['category_id']);
    
    // Gestion de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $imageName = basename($image['name']);
        $targetDir = "../../uploads/"; // Dossier où l'image sera enregistrée
        $targetFile = $targetDir . $imageName;

        // Vérifier si le fichier est une image
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($image['tmp_name'], $targetFile);
        } else {
            echo "L'image doit être au format JPG, JPEG, PNG ou GIF.";
            exit;
        }
    } else {
        $imageName = null; // Pas d'image sélectionnée
    }

    // Vérification de la saisie
    if (!empty($nom) && !empty($description) && !empty($category_id)) {
        // Connexion à la base de données
        $pdo = Database::getInstance();

        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO products (nom, description, category_id, image, date_creation, date_modification) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$nom, $description, $category_id, $imageName]);

        // Rediriger vers la page de gestion des produits après l'ajout
        header("Location: backofficeproduits.php");
        exit;
    } else {
        echo "Le nom, la description et la catégorie sont obligatoires.";
    }
}

// Récupérer les catégories pour les afficher dans le formulaire
$pdo = Database::getInstance();
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
</head>
<body>
    <h1>Ajouter un Nouveau Produit</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="category_id">Catégorie :</label>
        <select id="category_id" name="category_id" required>
            <option value="">Sélectionnez une catégorie</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['nom']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
