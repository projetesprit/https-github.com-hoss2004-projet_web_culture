<?php
require_once 'DB.php';
require_once 'Event.php';

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
    $pdo = Database::getConnection();
    $sql = "DELETE FROM events WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_event, PDO::PARAM_INT);
    $stmt->execute();
}

}
?>