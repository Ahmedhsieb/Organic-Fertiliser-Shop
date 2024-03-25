<?php
session_start();
include "inc/navbar.php";
ini_set("display_errors", 0);

require_once "App/Models/order.php";
require_once "App/Models/state.php";
require_once "App/Models/payment.php";
$order = new order;
$payment = new payment();
$state = new state();

$orders = $order->getUserOrderData($_SESSION['user']['id'])

?>

<!-- Content -->
<main class="container" style="margin-top: 120px ">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">السعر</th>
            <th scope="col">طريقة الدفع</th>
            <th scope="col">الحاله</th>
            <th scope="col">الوقت</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($orders as $key => $order):?>

        <tr>
            <th scope="row"><?= $key+1?></th>
            <td><?= $order['total_price']?></td>
            <td><?= $payment->getPaymentData($order['paymentid'])['type']?></td>
            <td><?= $state->getStateData($order['stateid'])['state']?></td>
            <td><?= $order['time']?></td>
        </tr>
        <?php endforeach;?>


        </tbody>
    </table>
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