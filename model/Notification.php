<?php
class Notification
{
    private $id;
    private $message;
    private $isRead;
    private $eventId;
    private $createdAt;

    // Getters
    public function getId() { return $this->id; }
    public function getMessage() { return $this->message; }
    public function getIsRead() { return $this->isRead; }
    public function getEventId() { return $this->eventId; }
    public function getCreatedAt() { return $this->createdAt; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setMessage($message) { $this->message = $message; }
    public function setIsRead($isRead) { $this->isRead = $isRead; }
    public function setEventId($eventId) { $this->eventId = $eventId; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }
}