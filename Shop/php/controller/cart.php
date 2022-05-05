<?php
include 'cartFunct.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        addToCart($_POST['add']['id'], $_POST['add']['quantity']);
    }
    if (isset($_POST['remove'])) {
        removeFromCart($_POST['remove']['id']);
    }
}

