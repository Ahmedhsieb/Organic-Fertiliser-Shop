<?php
session_start();
include "inc/navbar.php";
ini_set("display_errors", 0);

require_once "App/Models/cart.php";
$cart = new cart;

$cart_total_price = $cart->getTotalPrice();

$delivery = 30;

$total_price_with_delivery = $cart_total_price + $delivery;

$carts = $cart->getCartUserData($_SESSION['user']['id']);

$products = new product();

?>
<!-- Content -->
<main class="container h-100"  style="margin-top: 120px ">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">المنتجات</th>
            <th scope="col">الكميه</th>
            <th scope="col">السعر</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($carts as $index => $cart):
        $product = $products->getProductData($cart['productid'])
        ?>
        <tr>
            <th scope="row"><?=$index + 1?></th>
            <td><img src="<?= $product['image']?>" alt="" width="50" height="50">
                <a href="details.php?id=<?=$product['productid']?>&category=<?=$product['categoryid']?>"><?= $product['productname']?></a>
            </td>
            <td><?= $cart['quantity']?></td>
            <td><?= $cart['price']?></td>
            <td><a href="App/Handler/cartHandler.php?id=<?=$cart['id']?>"> حذف</a></td>
        </tr>
        <?php endforeach;?>


        </tbody>
    </table>
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item"> سعر المنتجات: <?= $cart_total_price?></li>
                <li class="list-group-item"> توصيل: <?= $delivery?></li>
                <li class="list-group-item"> المجموع: <?= $total_price_with_delivery?></li>
            </ul>
        </div>
        <div class="col-9 align-self-center text-center">

            <?php if (!empty($carts)):?>
                <center>
                    <form action="App/Handler/orderHandler.php" method="post">
                        <input type="hidden" name="userid" value="<?=$_SESSION['user']['id']?>">
                        <button class="btn btn-primary"  type="submit">
                            اكمال الطلب
                        </button>
                    </form>
                </center>
            <?php endif;?>

<!--            <a href="" class="btn btn-primary">Order</a>-->
        </div>
    </div>
</main>
<!-- Content -->

<!-- Footer -->
<div class="container">
    <footer class="d-flex fixed-bottom flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <!-- Logo -->
        <div class="col-md-4 d-flex align-items-center">
            <a class="navbar-brand" href="index.php">
                <img src="Assets/Images/logo.png" alt="" width="80" height="40">
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Company, Inc</span>
        </div>
        <!-- Logo -->


        <!-- Social Links -->
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><i  class="fab fa-twitter"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i  class="fab fa-instagram"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i  class="fab fa-facebook"></i></a></li>
        </ul>
        <!-- Social Links -->

    </footer>
</div>
<!-- Footer -->

<script src="Assets/Design/js/popper.min.js"></script>
<script src="Assets/Design/js/jquery-3.7.1.min.js"></script>
<script src="Assets/Design/js/bootstrap.min.js"></script>
<script src="Assets/Design/js/bootstrap.js"></script>
</body>
</html>