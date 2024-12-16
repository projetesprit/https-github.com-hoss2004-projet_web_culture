<?php
require_once '../config/Database.php';

if (!isset($_GET['id'])) {
    die("ID de catégorie non spécifié.");
}

$id = $_GET['id'];
$pdo = Database::getInstance();

// Récupérer les informations de la catégorie
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    die("Catégorie introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);

    // Mise à jour
    $stmt = $pdo->prepare("UPDATE categories SET nom = ?, description = ?, date_modification = NOW() WHERE id = ?");
    $stmt->execute([$nom, $description, $id]);

    header("Location: backofficecategories.php");
    exit;
}
?>
<!-- Formulaire avec données existantes -->
<form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($category['nom']); ?>" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description"
        required><?php echo htmlspecialchars($category['description']); ?></textarea>

    <button type="submit">Enregistrer</button>
</form>