<?php
require_once '../controller/eventController.php'; // Inclure le contrôleur pour récupérer les événements

// Récupérer les filtres envoyés via POST
$query = $_POST['query'] ?? '';
$startLetter = $_POST['start_letter'] ?? '';
$filterDate = $_POST['filter_date'] ?? '';

// Récupérer tous les événements
$events = listEvents();

// Appliquer les filtres dynamiques
if ($query) {
    $query = strtolower($query);
    $events = array_filter($events, function ($event) use ($query) {
        return stripos($event['title'], $query) !== false 
            || stripos($event['description'], $query) !== false 
            || stripos($event['location'], $query) !== false;
    });
}

if ($startLetter) {
    $events = array_filter($events, function ($event) use ($startLetter) {
        return stripos($event['title'], $startLetter) === 0;
    });
}

if ($filterDate) {
    $events = array_filter($events, function ($event) use ($filterDate) {
        return date('Y-m-d', strtotime($event['date'])) === $filterDate;
    });
}

// Générer le HTML des événements
if (!empty($events)) {
    foreach ($events as $index => $event) {
        echo '<div class="col-lg-12 custom-block mb-3 event-item ' . (($index % 2 === 0) ? 'with-border' : '') . '">';
        echo '<div class="row">';
        echo '<div class="col-lg-2 col-md-4 col-12">';
        echo '<div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center">';
        echo '<h6 class="custom-block-date">' . date('d', strtotime($event['date'])) . '</h6>';
        echo '<strong class="text-white">' . date('M Y', strtotime($event['date'])) . '</strong>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-4 col-md-8 col-12">';
        echo '<div class="custom-block-image-wrap">';
        echo '<img src="' . htmlspecialchars($event['image']) . '" class="custom-block-image img-fluid" alt="' . htmlspecialchars($event['title']) . '">';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-6 col-12">';
        echo '<div class="custom-block-info">';
        echo '<a href="event-detail.php?id=' . $event['id'] . '" class="events-title mb-3">' . htmlspecialchars($event['title']) . '</a>';
        echo '<p class="mb-0">' . htmlspecialchars($event['description']) . '</p>';
        echo '<div class="d-flex flex-wrap border-top mt-4 pt-3">';
        echo '<div class="mb-4 mb-lg-0">';
        echo '<div class="d-flex flex-wrap align-items-center mb-1">';
        echo '<span class="custom-block-span">Lieu :</span>';
        echo '<p class="mb-0">' . htmlspecialchars($event['location']) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center">Aucun événement trouvé pour ces critères.</p>';
}
?>