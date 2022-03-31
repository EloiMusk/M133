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

function getAllCategory()
{
    $dblink = getDB();
    $sql = "SELECT * FROM category";
    $sth = $dblink->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getProduct($id) {
    $dblink = getDB();
    $sql = 'SELECT * FROM product WHERE id=?;';
    $sth = $dblink->prepare($sql);
    $sth->execute(array($id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getAllProducts(){
    $dblink = getDB();
    $sql = 'SELECT * FROM product;';
    $sth = $dblink->prepare($sql);
    $sth->execute();
    $allProducts = $sth->fetchAll();
    return $allProducts;
}

function deleteProduct($id)
{
    $dblink = getDB();
    $sql = 'DELETE FROM product WHERE id=?;';
    $sth = $dblink->prepare($sql);
    $sth->execute(array($id));
}

function updateProduct($id, $name, $price, $description, $image, $category)
{
    $dblink = getDB();
    $sql = 'UPDATE product SET name=?, price=?, description=?, image=?, categoryId=? WHERE id=?;';
    $sth = $dblink->prepare($sql);
    $sth->execute(array($name, $price, $description, $image, $category, $id));
}
?>