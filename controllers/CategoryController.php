<?php
require_once __DIR__ . '../../models/CategoryModel.php'; // Include the model

class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new Categories();
    }

    // Dispatcher to handle actions dynamically
    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'edit':
                $this->edit($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            default:
                $this->index();
                break;
        }
    }

    // Display all categories
    public function index()
    {
        try {
            $categories = $this->model->getAllCategories();
            include __DIR__ . '/../view/back2/backofficecategories.php'; // Show all categories
        } catch (Exception $e) {
            die("Erreur lors de la récupération des catégories : " . $e->getMessage());
        }
    }

    // Add a new category
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = htmlspecialchars($_POST['nom']);
            $description = htmlspecialchars($_POST['description']);

            // Data validation
            if (empty($nom) || empty($description)) {
                $error = "Tous les champs sont obligatoires.";
                include __DIR__ . '/../../views/back2/add_category.php';
                return;
            }

            try {
                $this->model->addCategory($nom, $description);
                header("Location: CategoryController.php?action=index");
                exit;
            } catch (Exception $e) {
                die("Erreur lors de l'ajout de la catégorie : " . $e->getMessage());
            }
        }

        include __DIR__ . '/../../view/back2/add_category.php'; // Show add form
    }

    // Edit an existing category
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

                // Data validation
                if (empty($nom) || empty($description)) {
                    $error = "Tous les champs sont obligatoires.";
                    include __DIR__ . '/../../view/back2/edit_category.php';
                    return;
                }

                $this->model->updateCategory($id, $nom, $description);
                header("Location:  ../view/back2/backofficecategories.php");
                exit;
            }

            include __DIR__ . '/../view/back2/edit_category.php'; // Show edit form
        } catch (Exception $e) {
            die("Erreur lors de la modification de la catégorie : " . $e->getMessage());
        }
    }

    // Delete a category
    public function delete($id)
    {
        if (empty($id)) {
            die("ID non spécifié pour la suppression.");
        }

        try {
            $this->model->deleteCategory($id);
            header("Location: ../view/back2/backofficecategories.php");
            exit;
        } catch (Exception $e) {
            die("Erreur lors de la suppression de la catégorie : " . $e->getMessage());
        }
    }
}

// Dispatcher: Handle the request
$controller = new CategoryController();
$controller->handleRequest();
?>