<?php
include 'adressFunc.php';
session_start();
if (isset($_SESSION['user'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['create'])) {
            createAdress($_POST['add']);
        }
        if (isset($_POST['remove'])) {
            removeAdress();
        }
        if (isset($_POST['update'])) {
            updateAdress($_POST['update']['adress']);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        getAdress();
    }
}