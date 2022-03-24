<?php
include 'productFunc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_REQUEST["action"] === 'create') {
        createProduct();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if ($_REQUEST["action"] === 'delete') {
        deleteProduct($_GET['id']);
    }
}

//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    header('Content-type: application/json');
//    getAllProducts();
//}

?>