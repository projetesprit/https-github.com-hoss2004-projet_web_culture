<?php
// Inclure la connexion à la base de données
require_once '../../config/Database.php';

try {
    // Connexion à la base de données
    $pdo = Database::getInstance();

    // Requête pour récupérer toutes les catégories
    $stmt = $pdo->query("SELECT * FROM categories ORDER BY date_creation DESC");

    // Récupérer toutes les catégories
    $categories = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
public function getProductsByCategory($categoryId) {
// Connexion à la base de données
$pdo = Database::getInstance();

// Requête SQL pour récupérer les produits de la catégorie spécifiée
$stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = :categoryId");
$stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

// Exécution de la requête
$stmt->execute();

// Retourner les résultats sous forme de tableau associatif
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Les Catégories</title>
</head>

<body>
    <h1>Nos Catégories</h1>


    <?php if ($categories): ?>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li>
                    <h2><?php echo htmlspecialchars($category['nom']); ?></h2>
                    <p><?php echo htmlspecialchars($category['description']); ?></p>
                    <p><em>Créé le : <?php echo $category['date_creation']; ?></em></p>
                    <a href="event-details.php?id=<?php echo $category['id']; ?>">Voir les détails</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <h2>Nos Catégories</h2>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="index.php?category_id=<?= $category['id'] ?>"><?= htmlspecialchars($category['nom']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else: ?>
        <p>Aucune catégorie trouvée.</p>
    <?php endif; ?>

</body>

</html>