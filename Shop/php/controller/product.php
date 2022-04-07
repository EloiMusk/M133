<?php
include 'productFunc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_REQUEST["action"] === 'create') {
        createProduct();
    }
    if ($_REQUEST["action"] === 'edit') {
        updateProduct();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if ($_REQUEST["action"] === 'delete') {
        deleteProduct();
    }
    if ($_REQUEST["action"] === 'getById') {
        echo json_encode(getProduct($_GET['id']));
    }
}

//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    header('Content-type: application/json');
//    getAllProducts();
//}

?>