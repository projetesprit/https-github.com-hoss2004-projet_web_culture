<?php
// Récupérer l'événement à partir de l'ID
require_once __DIR__ . '/../controller/eventController.php';

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $event = getEventById($eventId);
    if (!$event) {
        echo "Événement introuvable.";
        exit;
    }
}
?>

<!-- Formulaire d'inscription -->
<form action="inscription.php" method="POST">
    <h2>S'inscrire à l'événement : <?= htmlspecialchars($event['title']); ?></h2>

    <input type="hidden" name="event_id" value="<?= $event['id']; ?>">

    <label for="name">Nom complet :</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required><br><br>

    <button type="submit" name="register_event">S'inscrire et télécharger le PDF</button>
</form>