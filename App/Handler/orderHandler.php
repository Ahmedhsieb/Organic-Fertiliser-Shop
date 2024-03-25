<?php

session_start();
//ini_set("display_errors", 0);

require_once "../Models/cart.php";
require_once "../Models/order.php";
$cart = new cart;
$orders = new order;
$product = new product;

$cart_total_price = $cart->getTotalPrice();

$delivery = 30;

$total_price_with_delivery = $cart_total_price + $delivery;

$carts = $cart->getAllProduct();

$products = [];


foreach ($carts as $cart){
    $p = $product->getProductData($cart['productid']);
    (new product)->updateProduct($p['productid'],
        [
            'productquantity' => $p['productquantity'] - $cart['quantity']
        ]
    );
    $products[$p['productname']] = $cart['quantity'];
}

$res = $orders->addOrder([
    'userid' => $_POST['userid'],
    'products' => serialize($products),
    'total_price' => $total_price_with_delivery,
    'time' => date("d/m/y H:i")
]);

if ($res){
    (new cart())->deleteAllProduct($_SESSION['user']['id']);
    header("location: ../../order.php");
}