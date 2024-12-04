<?php
require_once 'DB.php';
require_once 'Event.php';
require_once '../controller/NotificationController.php';



class EventManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createEvent(Event $event)
    {
        try {
            // Insérer l'événement dans la base de données
            $sql = "INSERT INTO events (title, date, location, description, image, id_sponsor) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $event->getTitle(),
                $event->getDate(),
                $event->getLocation(),
                $event->getDescription(),
                $event->getImage(),
                $event->getIdSponsor()
            ]);
    
            // Récupérer l'ID de l'événement inséré
            $eventId = $this->pdo->lastInsertId();
    
            // Créer la notification
            $notificationMessage = "Un nouvel événement a été créé : " . $event->getTitle();
            $notificationManager = new NotificationManager($this->pdo);
            $notificationManager->addNotification($notificationMessage, $eventId);
    
        } catch (PDOException $e) {
            die('Erreur lors de la création de l\'événement : ' . $e->getMessage());
        }
    }
    public function getAllEvents()
    {
        try {
            $sql = "SELECT e.*, s.nom_sp 
                    FROM events e 
                    LEFT JOIN sponsors s ON e.id_sponsor = s.id_sponsor
                    ORDER BY e.date ASC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur lors de la récupération des événements : ' . $e->getMessage());
        }
    }

    public function getEventById($id)
    {
        try {
            $sql = "SELECT * FROM events WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die('Erreur lors de la récupération de l\'événement : ' . $e->getMessage());
        }
    }

    public function updateEvent($id, $title, $date, $location, $description, $image, $id_sponsor)
    {
        try {
            $sql = "UPDATE events 
                    SET title = ?, date = ?, location = ?, description = ?, image = ?, id_sponsor = ? 
                    WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$title, $date, $location, $description, $image, $id_sponsor, $id]);
        } catch (PDOException $e) {
            die('Erreur lors de la mise à jour de l\'événement : ' . $e->getMessage());
        }
    }

   // Supprimer un événement par ID
   public function deleteEvent($id_event) {
    try {
        // Supprimer les notifications liées à cet événement
        $sql = "DELETE FROM notifications WHERE event_id = :id_event";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_event', $id_event, PDO::PARAM_INT);
        $stmt->execute();

        // Supprimer l'événement
        $sql = "DELETE FROM events WHERE id = :id_event";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_event', $id_event, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Erreur lors de la suppression de l\'événement : ' . $e->getMessage());
    }
}
}

?>