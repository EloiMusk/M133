<?php
session_start();
include dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'getDB.php';
function addToCart($productId, $quantity)
{
    $_SESSION['cart'][$productId]['quantity'] += $quantity;
}

function removeFromCart($productId)
{
    unset($_SESSION['cart'][$productId]);
}