<?php
require_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $products = get_products();

        foreach ($products as &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $_POST['product_name'] ?? $product['name'];
                $product['category'] = $_POST['category_id'] ?? $product['category'];
                $product['price'] = (float)($_POST['price'] ?? $product['price']);
                $product['stock'] = (int)($_POST['stock_quantity'] ?? $product['stock']);
                $product['image'] = $_POST['image_url'] ?? $product['image'];
                $product['description'] = $_POST['description'] ?? $product['description'];
                $product['status'] = $_POST['status'] ?? $product['status'];
                break;
            }
        }

        save_products($products);
    }

    header('Location: ../index.php?page=products');
    exit;
}