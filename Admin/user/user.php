<?php
include "inc/head.php";
require_once "../../App/Models/user.php";

ini_set("display_errors", 0);

$res = 0;
$user = new user;
if ($user->getUserList() > 0 ) {
    $user_list = $user->getUserList();
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
                        <h1 class="m-0">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">User Table</li>
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
                            <th>Email</th>
                            <th>Password</th>
                            <th>Is Admin</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!$res):?>
                            <?php foreach($user_list as $u):?>
                                <tr>
                                    <td><?= $u['id'] ?></td>
                                    <td><?= $u['fname'] ?></td>
                                    <td><?= $u['lname'] ?></td>
                                    <td><?= $u['email'] ?></td>
                                    <td><?= $u['password'] ?></td>
                                    <td><?= $u['is_admin'] ?></td>
                                    <td>
                                        <form action="update.php" method="post">
                                            <input type="hidden" name="id" value="<?=$u['id']?>">
                                            <input type="submit"  class="btn btn-primary" value="Update">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="id" value="<?=$u['id']?>">
                                            <input type="submit"  class="btn btn-danger" value="Delete">
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