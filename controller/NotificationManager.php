<?php
require_once '../model/Notification.php';
require_once '../model/DB.php';
class NotificationManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUnreadNotifications()
    {
        $sql = "SELECT n.id, n.message, n.is_read, n.event_id, e.title AS event_title
                FROM notifications n
                JOIN events e ON n.event_id = e.id
                WHERE n.is_read = 0
                ORDER BY n.created_at DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsRead($notificationId)
    {
        $sql = "UPDATE notifications SET is_read = 1 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $notificationId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addNotification($message, $eventId)
{
    // Créer l'URL vers l'événement (assurez-vous que cette URL correspond à votre structure)
    $eventUrl = "../view/event-detail.php?id=" . $eventId;  // Vous pouvez ajuster cela en fonction de la structure de votre application

    // Ajouter le lien dans le message
    $messageWithLink = $message . ' <a href="' . $eventUrl . '">Voir l\'événement</a>';

    // Insérer la notification avec le message contenant le lien
    $sql = "INSERT INTO notifications (message, is_read, event_id) VALUES (:message, 0, :event_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':message', $messageWithLink);
    $stmt->bindParam(':event_id', $eventId, PDO::PARAM_INT);
    $stmt->execute();
}

}?>