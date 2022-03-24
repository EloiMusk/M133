<?php
include dirname(__FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'getDB.php';

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

function deleteProduct($id) {
    $dblink = getDB();
    $dblink->beginTransaction();
    $sql = 'DELETE FROM product WHERE id=?;';
    $sth = $dblink->prepare($sql);
    $sth->execute(array($id));
    $dblink->commit();

}

function getAllProducts(){
    $dblink = getDB();
    $sql = 'SELECT * FROM product;';
    $sth = $dblink->prepare($sql);
    $sth->execute();
    $allProducts = $sth->fetchAll();
    return $allProducts;
}
?>