<?php

require_once __DIR__ . '/sponsorManager.php';
require_once __DIR__ . '/../model/DB.php';
require_once __DIR__ . '/../model/Event.php';
require_once __DIR__ . '/../model/EventManager.php';
require_once __DIR__ . '/../view/fpdf185/fpdf.php';

$pdo = Database::getConnection();
$eventManager = new EventManager($pdo);

function listEvents()
{
    global $eventManager;
    return $eventManager->getAllEvents();
}

function getEventById($id) {
    global $eventManager;
    return $eventManager->getEventById($id); 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_event'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $eventId = $_POST['event_id'];

    // Vérifier que l'événement existe
    $event = getEventById($eventId);
    if (!$event) {
        die('Événement introuvable.');
    }

    // Créer le PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Titre de l'événement
    $pdf->Cell(0, 10, 'Inscription a l\'evenement : ' . htmlspecialchars($event['title']), 0, 1, 'C');
    $pdf->Ln(10);

    // Détails de l'événement
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Date : ' . date('d M Y', strtotime($event['date'])), 0, 1);
    $pdf->Cell(0, 10, 'Lieu : ' . htmlspecialchars($event['location']), 0, 1);
  
    $eventImage = htmlspecialchars($event['image']); // Chemin de l'image de l'événement
    $pdf->Image($eventImage, 15, 50, 180, 100, 'JPEG'); // Ajouter l'image (ajustez les coordonnées et taille selon vos besoins)

    $pdf->Ln(100);

    // Informations de l'utilisateur
    $pdf->Cell(0, 10, 'Nom : ' . htmlspecialchars($name), 0, 1);
    $pdf->Cell(0, 10, 'Email : ' . htmlspecialchars($email), 0, 1);

    // Télécharger le PDF
    $pdf->Output('D', 'Inscription_' . $event['title'] . '.pdf');
    
    exit();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? null;
    $date = $_POST['date'] ?? null;
    $location = $_POST['location'] ?? null;
    $description = $_POST['description'] ?? null;
    $id_sponsor = $_POST['id_sponsor'] ?? null;
    $id = $_POST['id'] ?? null;

   
    if (!$title || !$date || !$location || !$description || !$id_sponsor) {
        die('Erreur : tous les champs sont obligatoires.');
    }

    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../view/images/';
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die('Erreur : échec de l\'upload de l\'image.');
        }
    }

    if ($id) {
         
        $eventManager->updateEvent($id, $title, $date, $location, $description, $imagePath, $id_sponsor);
        echo'l évenement a été modifé en succès';
    } else {
        
        $event = new Event();
        $event->setTitle($title);
        $event->setDate($date);
        $event->setLocation($location);
        $event->setDescription($description);
        $event->setImage($imagePath);
        $event->setIdSponsor($id_sponsor);

        $eventManager->createEvent($event);
        echo 'L\'événement a été ajouté avec succès !';
    }
} else {
   
    $event = null;
    if (isset($_GET['id'])) {
        $eventId = $_GET['id'];
        $event = $eventManager->getEventById($eventId);  
    }
    if (isset($_GET['delete_event'])) {
        $id_event = intval($_GET['delete_event']);

        $eventManager->deleteEvent($id_event);

        
        echo'l évenement a été supprimé en succès';
    }
    $sponsors = getAllSponsors();
    
}
?>