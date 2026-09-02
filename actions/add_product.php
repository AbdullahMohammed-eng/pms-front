<?php
require_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $products = get_products();

    $new_product = [
        'id' => time(),
        'name' => $_POST['product_name'] ?? '',
        'category' => $_POST['category_id'] ?? '',
        'price' => (float)($_POST['price'] ?? 0),
        'stock' => (int)($_POST['stock_quantity'] ?? 1),
        'image' => $_POST['image_url'] ?? '',
        'description' => $_POST['description'] ?? '',
        'status' => $_POST['status'] ?? 'active'
    ];

    $products[] = $new_product;
    save_products($products);

    header('Location: ../index.php?page=products');
    exit;
}