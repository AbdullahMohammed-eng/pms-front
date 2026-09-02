<?php
require_once '../inc/functions.php';

$id = $_GET['id'] ?? null;

if ($id) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

header('Location: ../index.php?page=cart');
exit;