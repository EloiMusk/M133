<?php
session_start();
include 'adressFunc.php';
if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['create'])) {
            createAdress($_POST['add']);
        }
        if (isset($_POST['remove'])) {
            removeAdress();
        }
        if (isset($_GET['update'])) {
            updateAdress($_POST);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $result = getAdress();
        echo json_encode($result);
    }
}