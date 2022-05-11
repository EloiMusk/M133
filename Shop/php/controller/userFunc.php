<?php
include_once dirname(__FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'getDB.php';

function authenticateUser($user, $pass) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM user WHERE username = :user AND password = :pass");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        return $result[0];
    } else {
        return false;
    }
}

function createUser($user, $pass, $firstname, $lastname, $email) {
    $db = getDB();
//    create empty adress in db
    $stmt = $db->prepare("INSERT INTO adress (street, nr, zip, city) VALUES (:street, :nr, :zip, :city)");
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':nr', $nr);
    $stmt->bindParam(':zip', $zip);
    $stmt->bindParam(':city', $city);
    $street = '';
    $nr = '';
    $zip = '';
    $city = '';
    $stmt->execute();
    $adress_id = $db->lastInsertId();
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO user (username, password, firstname, lastname, email, adress_id) VALUES (:username, :password, :firstname, :lastname, :email, :adress_id)");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':adress_id', $adress_id);
    $stmt->execute();
    return getUserByUsername($user);
}
function getUserByUsername($user) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM user WHERE username = :user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        return $result[0];
    } else {
        return false;
    }
}
?>