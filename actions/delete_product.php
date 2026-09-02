<?php
require_once '../inc/functions.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $products = get_products();
    $products = array_filter($products, fn($p) => $p['id'] != $id);
    save_products(array_values($products));
}

header('Location: ../index.php?page=products');
exit;