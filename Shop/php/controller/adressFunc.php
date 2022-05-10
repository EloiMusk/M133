<?php
include dirname(__FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'getDB.php';

function createAdress($adress) {
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO adress (street, nr, zip, city, Country) VALUES (:street, :nr, :zip, :city, :Country)");
    $stmt->bindParam(':street', $adress['street']);
    $stmt->bindParam(':nr', $adress['nr']);
    $stmt->bindParam(':zip', $adress['zip']);
    $stmt->bindParam(':city', $adress['city']);
    $stmt->bindParam(':Country', $adress['Country']);
    $stmt->execute();
    $adress_id = $db->lastInsertId();
    $stmt = $db->prepare("UPDATE user SET adress_id = :adress_id WHERE id = :id");
    $stmt->bindParam(':adress_id', $adress_id);
    $stmt->bindParam(':id', $_SESSION['user']['id']);
    $_SESSION['user']['adress_id'] = $adress_id;
}
function getAdress() {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM adress WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user']['adress_id']);
    $stmt->execute();
}
function removeAdress() {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM adress WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user']['adress_id']);
    $stmt->execute();
    $stmt = $db->prepare("UPDATE user SET adress_id = NULL WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user']['id']);
    $stmt->execute();
    $_SESSION['user']['adress_id'] = null;
}
function updateAdress($adress) {
    $db = getDB();
    $stmt = $db->prepare("UPDATE adress SET street = :street, nr = :nr, zip = :zip, city = :city, Country = :Country WHERE id = :id");
    $stmt->bindParam(':street', $adress['street']);
    $stmt->bindParam(':nr', $adress['nr']);
    $stmt->bindParam(':zip', $adress['zip']);
    $stmt->bindParam(':city', $adress['city']);
    $stmt->bindParam(':Country', $adress['Country']);
    $stmt->bindParam(':id', $_SESSION['user']['adress_id']);
    $stmt->execute();
}