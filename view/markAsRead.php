<?php
require_once '../controller/NotificationController.php';

if (isset($_GET['id'])) {
    $notificationId = intval($_GET['id']);
    $notificationController = new NotificationController();
    $notificationController->handleMarkAsRead($notificationId);
}
?>