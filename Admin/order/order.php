<?php
include "inc/head.php";
require_once "../../App/Models/order.php";
require_once "../../App/Models/user.php";
require_once "../../App/Models/state.php";
require_once "../../App/Models/payment.php";

//ini_set("display_errors", 0);

$res = 0;
$order = new order;
$state = new state;
$payment = new payment;
$user = new user;
if ($order->getAllOrders() > 0 ) {
    $order_list = $order->getAllOrders();
}else {
    $res = 1;
}




?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Orders</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Orders</a></li>
                            <li class="breadcrumb-item active">Orders Table</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Time</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                            <th>State</th>
                            <th>Confirm</th>
                            <th>Cancel</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!$res):?>
                            <?php foreach($order_list as $key => $order):?>
                                <tr>
                                    <td><?= $key + 1?></td>
                                    <td><?= $user->getUserById($order['userid'])['fname'] ?></td>
                                    <td><?= $user->getUserById($order['userid'])['lname'] ?></td>
                                    <td><?= $order['time'] ?></td>
                                    <td><?= $order['total_price'] ?></td>
                                    <td><?= $payment->getPaymentData($order['paymentid'])['type'] ?></td>
                                    <td><?= $state->getStateData($order['stateid'])['state'] ?></td>
                                    <td>
                                        <form action="deliver.php" method="post">
                                            <input type="hidden" name="id" value="<?=$order['id']?>">
                                            <input type="submit"  class="btn btn-primary" value="Delivered">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="cancel.php" method="post">
                                            <input type="hidden" name="id" value="<?=$order['id']?>">
                                            <input type="submit"  class="btn btn-danger" value="Cancell">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                            </tr>
                        <?php endif; ?>


                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </section>

    </div>
    <!-- ./wrapper -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../Assets/Dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../Assets/Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Assets/Dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>