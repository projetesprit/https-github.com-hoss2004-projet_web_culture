<?php
class Sponsor
{
    private $id_sponsor;
    private $nom_sp;
    private $logo;
    private $website;
    private $description;

   
    public function getIdSponsor() { return $this->id_sponsor; }
    public function setIdSponsor($id) { $this->id_sponsor = $id; }

    public function getNomSp() { return $this->nom_sp; }
    public function setNomSp($nom) { $this->nom_sp = $nom; }

    public function getLogo() { return $this->logo; }
    public function setLogo($logo) { $this->logo = $logo; }

    public function getWebsite() { return $this->website; }
    public function setWebsite($website) { $this->website = $website; }

    public function getDescription() { return $this->description; }
    public function setDescription($desc) { $this->description = $desc; }
}
?>