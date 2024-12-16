<?php
// Barderecherche.php : Traitement de la recherche

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    // Connectez-vous à la base de données (exemple avec PDO)
    
    $pdo = new PDO('mysql:host=localhost;dbname=craftupia', 'root', ''); // Remplacez par vos informations
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour rechercher des articles (ajustez selon vos tables et colonnes)
    $stmt = $pdo->prepare("SELECT * FROM produits WHERE nom LIKE :query OR description LIKE :query");
    $stmt->execute(['query' => '%' . $query . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
        // Afficher les résultats de la recherche
        echo "<h2>Résultats pour '$query':</h2>";
        foreach ($result as $row) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            // Afficher d'autres informations comme les coordonnées de l'artisan
            echo "</div>";
        }
    } else {
        echo "Aucun résultat trouvé pour '$query'.";
    }
} else {
    echo "Veuillez entrer un terme de recherche.";
}
?>
