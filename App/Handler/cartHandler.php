<?php
session_start();
require_once "../Models/cart.php";

$cart = new cart;
$error = [];
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {

$product = (new product)->getProductData($_POST['productid']);

    $exists = !empty($cart->checkCartDataExist($_POST['productid']));

//    var_dump($exists);die;

    if ($product['productquantity'] >= $_POST['quantity'] && !$exists) {
        $res = $cart->addProduct(
            [
                'productid' => $product['productid'],
                'quantity' => $_POST['quantity'],
                'price' => $product['price'] * $_POST['quantity'],
                'userid' => $_SESSION['user']['id']
            ]
        );


        if ($res) {
            header("location: ../../cart.php");
        } else {
            $error[] = "لم يتم اضافة المنتج بشكل ناجح";
        }
    } elseif($product['productquantity'] >= ($_POST['quantity'] + ($cart->getProductCartQuantity($_POST['productid']))['quantity']) && $exists) {
        $res = $cart->updateProduct($_POST['productid'],
            [
                'quantity' => ($_POST['quantity'] + ($cart->getProductCartQuantity($_POST['productid']))['quantity']),
                'price' => $product['price'] * ($_POST['quantity'] + ($cart->getProductCartQuantity($_POST['productid']))['quantity']),
            ]
        );
        if ($res) {
            header("location: ../../cart.php");
        } else {
            $error[] = "لم يتم اضافة المنتج بشكل ناجح";
        }
    }else{
        $error[] = "لقد تخطيت الكميه المتاحه";
        $_SESSION['errors'] = $error;
        $id = $product['productid'];
        $catid = $product['categoryid'];
        header("location: ../../details.php?id=$id&category=$catid");
    }



} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    $cart_data = $cart->getCartData($_GET['id']);

    $product = new product;
    $product_data = $product->getProductData($cart_data['productid']);
    $res = $product->updateProduct($cart_data['productid'],
    [
        'productquantity' => $product_data['productquantity'] + $cart_data['quantity']
    ]
    );

    $cart->deleteProduct($_GET['id']);
    header("location: ../../cart.php");

} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
//    $cartProductData = $cart->getCartData($_POST['id']);

    $res = $cart->updateProduct($_POST['id'],
        [
            'quantity' => $_POST['quantity'],
        ]
    );

    if ($res) {
        header("location: ../../cart.php");
    } else {
        echo "<h2 style='color:red'>Error</h2><br> <h3 style='color:red'>The Product doesn't update on cart </h3>";
    }
}