<?php
include "inc/head.php";
require_once "../../App/Models/user.php";
require_once "../../App/Core/helpers.php";

//ini_set("display_errors", 0);

$success = '';
$error = '';

if (isset($_POST['id'])){
    $user = new user;
    $id = $_POST['id'];
    $user_to_update = $user->getUserById($id);

    if (isset($_POST['fname'])) {
        $res = $user->updateUser($id,
            [
                "fname" => $_POST['fname'],
                "lname" => $_POST['lname'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "password" => $_POST['password'],
                "is_admin" => $_POST['is_admin']]
        );

        if ($res) {
            $success = "User Updated";
            helpers::redirect("order.php",1);
        } else {
            $error = "User Not Updated";
        }
    }

}else{
    helpers::redirect("order.php");

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
                            <li class="breadcrumb-item active">Update User</li>
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
                <div class="card-header">
                    <h3 class="card-title">Update User</h3>
                </div>
                <div class="card-body">
                    <?php if (strlen($success) > 0): ?>
                        <div class="alert alert-success" role="alert">
                            <?=$success?>
                        </div>
                    <?php endif; ?>

                    <?php if (strlen($error) > 0): ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$error?>
                        </div>
                    <?php endif; ?>
                    <form action="update.php" method="post">
                        <div class="card-body">


                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="fname" value="<?=$user_to_update['fname']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter First Name">
                            </div><div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" name="lname" value="<?=$user_to_update['lname']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="<?=$user_to_update['email']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter User Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" name="password" value="<?=$user_to_update['password']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter User Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" value="<?=$user_to_update['phone']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter User Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is Admin</label>
                                <input type="text" name="is_admin" value="<?=$user_to_update['is_admin']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Is Admin -> 1 or Not -> 0">
                                <input type="hidden" name="id" value="<?=$user_to_update['id']?>">
                            </div>

                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
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
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../Assets/Dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../Assets/Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Assets/Dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>
