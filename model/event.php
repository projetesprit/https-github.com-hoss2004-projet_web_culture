<?php
class Event
{
    private $id;
    private $title;
    private $date;
    private $location;
    private $description;
    private $image;
    private $id_sponsor;

    // Getters
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDate() { return $this->date; }
    public function getLocation() { return $this->location; }
    public function getDescription() { return $this->description; }
    public function getImage() { return $this->image; }
    public function getIdSponsor() { return $this->id_sponsor; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    public function setDate($date) { $this->date = $date; }
    public function setLocation($location) { $this->location = $location; }
    public function setDescription($description) { $this->description = $description; }
    public function setImage($image) { $this->image = $image; }
    public function setIdSponsor($id_sponsor) { $this->id_sponsor = $id_sponsor; }
}
?>