<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('PRODUCTS_FILE', __DIR__ . '/../data/products.json');
define('ORDERS_FILE', __DIR__ . '/../data/orders.json');

function get_products() {
    if (!file_exists(PRODUCTS_FILE)) return [];
    $content = file_get_contents(PRODUCTS_FILE);
    return json_decode($content, true) ?? [];
}

function save_products($products) {
    if (!file_exists(__DIR__ . '/../data')) {
        mkdir(__DIR__ . '/../data', 0777, true);
    }
    file_put_contents(PRODUCTS_FILE, json_encode($products, JSON_PRETTY_PRINT));
}

function get_product_by_id($id) {
    $products = get_products();
    foreach ($products as $product) {
        if ($product['id'] == $id) return $product;
    }
    return null;
}

function get_cart_count() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) return 0;
    return array_sum($_SESSION['cart']);
}

function save_order($order_data) {
    if (!file_exists(__DIR__ . '/../data')) {
        mkdir(__DIR__ . '/../data', 0777, true);
    }
    $orders = [];
    if (file_exists(ORDERS_FILE)) {
        $orders = json_decode(file_get_contents(ORDERS_FILE), true) ?? [];
    }
    $orders[] = $order_data;
    file_put_contents(ORDERS_FILE, json_encode($orders, JSON_PRETTY_PRINT));
}