<?php
// Inclure la connexion à la base de données
require_once '../../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $description = htmlspecialchars($_POST['description']);

    // Vérification de la saisie
    if (!empty($nom) && !empty($description)) {
        // Connexion à la base de données
        $pdo = Database::getInstance();

        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO categories (nom, description, date_creation, date_modification) VALUES (?, ?, NOW(), NOW())");
        $stmt->execute([$nom, $description]);

        // Rediriger vers la page de gestion des catégories après l'ajout
        header("Location: backofficecategories.php");
        exit;
    } else {
        echo "Le nom et la description sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
    
</head>
<body>
    <h1>Ajouter une Nouvelle Catégorie</h1>
    <<form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>


