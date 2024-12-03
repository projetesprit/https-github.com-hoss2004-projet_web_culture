<?php
require_once 'eventController.php';  // Inclure le contrôleur des événements

// Récupérer la requête de recherche
$query = $_GET['query'] ?? '';

// Récupérer tous les événements
$events = listEvents();

// Filtrer les événements si une requête de recherche est présente
if ($query) {
    $query = strtolower($query);
    $events = array_filter($events, function ($event) use ($query) {
        return stripos($event['title'], $query) !== false || 
               stripos($event['description'], $query) !== false || 
               stripos($event['location'], $query) !== false;
    });
}

// Générer dynamiquement le HTML pour les événements
if (!empty($events)) {
    foreach ($events as $event) {
        echo '<div class="row custom-block mb-3">';
        echo '<div class="col-lg-2 col-md-4 col-12">';
        echo '<div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center">';
        echo '<h6 class="custom-block-date">' . date('d', strtotime($event['date'])) . '</h6>';
        echo '<strong class="text-white">' . date('M Y', strtotime($event['date'])) . '</strong>';
        echo '</div></div>';
        echo '<div class="col-lg-4 col-md-8 col-12">';
        echo '<img src="' . htmlspecialchars($event['image']) . '" class="custom-block-image img-fluid" alt="' . htmlspecialchars($event['title']) . '">';
        echo '</div>';
        echo '<div class="col-lg-6 col-12">';
        echo '<a href="event-detail.php?id=' . $event['id'] . '" class="events-title">' . htmlspecialchars($event['title']) . '</a>';
        echo '<p>' . htmlspecialchars($event['description']) . '</p>';
        echo '<div class="d-flex flex-wrap border-top mt-4 pt-3">';
        echo '<p class="mb-0"><strong>Lieu :</strong> ' . htmlspecialchars($event['location']) . '</p>';
        echo '</div></div></div>';
    }
} else {
    echo '<p class="text-center">Aucun événement trouvé pour cette recherche.</p>';
}
?>