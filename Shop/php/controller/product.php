<?php
include '../config/getDB.php';

function createProduct()
{
    $dblink = getDB();
    $dblink->beginTransaction();
    $sql = "INSERT INTO product
    (name, price, description, image, categoryId)
    VALUES (?, ?, ?, ?, ?)";

    echo $_POST['name'];
    echo "<br>";
    echo $_POST['price'];
    echo "<br>";
    echo $_POST['description'];
    echo "<br>";
    echo $_POST['image'];
    echo "<br>";
    echo $_POST['category'];

    $sth = $dblink->prepare($sql);
    $sth->execute(
        array(
            $_POST['name'],
            $_POST['price'],
            $_POST['description'],
            $_POST['image'],
            $_POST['category']
        ));
    $dblink->commit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_REQUEST["action"] === 'create') {
        createProduct();
    }
}

?>