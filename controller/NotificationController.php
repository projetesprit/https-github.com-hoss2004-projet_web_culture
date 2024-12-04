<?php
require_once 'NotificationManager.php';

class NotificationController
{
    private $notificationManager;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->notificationManager = new NotificationManager($pdo);
    }

    public function fetchUnreadNotifications()
    {
        return $this->notificationManager->getUnreadNotifications();
    }

    public function handleMarkAsRead($notificationId)
    {
        $this->notificationManager->markAsRead($notificationId);
        header('Location: index.php');
        exit;
    }
}?>