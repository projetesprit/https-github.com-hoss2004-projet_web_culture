<?php

require_once __DIR__ . '/sponsorManager.php';
require_once __DIR__ . '/../model/DB.php';
require_once __DIR__ . '/../model/Event.php';
require_once __DIR__ . '/../model/EventManager.php';

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