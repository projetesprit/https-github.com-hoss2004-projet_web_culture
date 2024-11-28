<?php
require_once __DIR__ . '/../model/DB.php';  


function getAllSponsors() {
    $pdo = Database::getConnection();
    $sql = "SELECT * FROM sponsors";
    $stmt = $pdo->query($sql);

    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getSponsorById($id_sponsor) {
    $pdo = Database::getConnection();
    $sql = "SELECT * FROM sponsors WHERE id_sponsor = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_sponsor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function addSponsor($nom_sp, $website, $description, $logo) {
    $pdo = Database::getConnection();
    $sql = "INSERT INTO sponsors (nom_sp, website, description, logo) VALUES (:nom_sp, :website, :description, :logo)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom_sp', $nom_sp, PDO::PARAM_STR);
    $stmt->bindParam(':website', $website, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
    $stmt->execute();
}


function updateSponsor($id_sponsor, $nom_sp, $website, $description, $logo) {
    $pdo = Database::getConnection();
    $sql = "UPDATE sponsors 
            SET nom_sp = :nom_sp, website = :website, description = :description, logo = :logo 
            WHERE id_sponsor = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_sponsor, PDO::PARAM_INT);
    $stmt->bindParam(':nom_sp', $nom_sp, PDO::PARAM_STR);
    $stmt->bindParam(':website', $website, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
    $stmt->execute();
}


function deleteSponsor($id_sponsor) {
    $pdo = Database::getConnection();
    $sql = "DELETE FROM sponsors WHERE id_sponsor = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_sponsor, PDO::PARAM_INT);
    $stmt->execute();
}
?>