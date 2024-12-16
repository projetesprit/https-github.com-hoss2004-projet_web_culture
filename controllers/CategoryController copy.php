<?php
require_once __DIR__ . '/../../models/CategoryModel.php'; // Inclure le modèle

class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    // Afficher toutes les catégories
    public function index()
    {
        try {
            $categories = $this->model->getAllCategories();
            include __DIR__ . '/../../views/back2/backofficecategories.php'; // Afficher les catégories
        } catch (Exception $e) {
            die("Erreur lors de la récupération des catégories : " . $e->getMessage());
        }
    }

    // Ajouter une nouvelle catégorie
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = htmlspecialchars($_POST['nom']);
            $description = htmlspecialchars($_POST['description']);

            // Validation des données
            if (empty($nom) || empty($description)) {
                $error = "Tous les champs sont obligatoires.";
                include __DIR__ . '/../../views/back2/add_category.php';
                return;
            }

            try {
                $this->model->addCategory($nom, $description);
                header("Location: backofficecategories.php");
                exit;
            } catch (Exception $e) {
                die("Erreur lors de l'ajout de la catégorie : " . $e->getMessage());
            }
        }

        include __DIR__ . '/../../views/back2/add_category.php'; // Formulaire d'ajout
    }

    // Modifier une catégorie
    public function edit($id)
    {
        if (empty($id)) {
            die("ID non spécifié pour la modification.");
        }

        try {
            $category = $this->model->getCategoryById($id);

            if (!$category) {
                die("Catégorie introuvable.");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = htmlspecialchars($_POST['nom']);
                $description = htmlspecialchars($_POST['description']);

                // Validation des données
                if (empty($nom) || empty($description)) {
                    $error = "Tous les champs sont obligatoires.";
                    include __DIR__ . '/../../views/back2/edit_category.php';
                    return;
                }

                $this->model->updateCategory($id, $nom, $description);
                header("Location: backofficecategories.php");
                exit;
            }

            include __DIR__ . '/../../views/back2/edit_category.php'; // Formulaire de modification
        } catch (Exception $e) {
            die("Erreur lors de la modification de la catégorie : " . $e->getMessage());
        }
    }

    // Supprimer une catégorie
    public function delete($id)
    {
        if (empty($id)) {
            die("ID non spécifié pour la suppression.");
        }

        try {
            $this->model->deleteCategory($id);
            header("Location: backofficecategories.php");
            exit;
        } catch (Exception $e) {
            die("Erreur lors de la suppression de la catégorie : " . $e->getMessage());
        }
    }
}
?>
