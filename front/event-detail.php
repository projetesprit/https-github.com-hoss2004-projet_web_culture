<?php
// Inclure la connexion à la base de données
require_once 'config/Database.php';

if (isset($_GET['id'])) {
    $categoryId = (int)$_GET['id'];

    try {
        // Connexion à la base de données
        $pdo = Database::getInstance();

        // Préparer la requête pour récupérer les détails de la catégorie
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$categoryId]);

        // Récupérer la catégorie
        $category = $stmt->fetch();

        if (!$category) {
            echo "Catégorie non trouvée.";
            exit;
        }

    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    echo "Aucune catégorie spécifiée.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de la Catégorie</title>
</head>
<body>
    <h1>Détails de la Catégorie</h1>

    <h2><?php echo htmlspecialchars($category['nom']); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($category['description'])); ?></p>
    <p><em>Créé le : <?php echo $category['date_creation']; ?></em></p>

    <a href="categories.php">Retour aux catégories</a>
</body>
</html>

