<?php
require_once 'inc/header.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'products':
        include 'views/products.php';
        break;
    case 'product-details':
        include 'views/product.php';
        break;
    case 'product-create':
    case 'product-edit':
        include 'views/product-create.php';
        break;
    case 'cart':
        include 'views/cart.php';
        break;
    case 'checkout':
        include 'views/checkout.php';
        break;
    case 'about':
        include 'views/about.php';
        break;
    case 'contact':
        include 'views/contact.php';
        break;
    default:
        include 'views/home.php';
        break;
}

require_once 'inc/footer.php';