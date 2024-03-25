<?php
include "inc/head.php";
require_once "../../App/Core/helpers.php";
require_once "../../App\Models\category.php";
require_once "../../App/Core/validations.php";

$success = '';
$error = '';
//
if (isset($_POST['categoryid'])){
    $category = new category();

    $id = $_POST['categoryid'];

    $category_to_update = $category->getCategoryById($id);


    if (isset($_POST['category'])) {

        $validation = validations::emptyAndRequired($_POST['category']);

        if (!$validation) {
            $category = new category;
            $res = $category->updateCategory($id,
                ["categoryname" => $_POST['category']]
            );

            if ($res) {
                $success = "Category Updated";
                helpers::redirect("category.php", 1);
            } else {
                $error = "Category Not Updated";
            }
        } else {
            $error = "Category Name is required";
        }
    }
}else{
    helpers::redirect("category.php");
}


?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
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
                    <h3 class="card-title">Add New Category</h3>
                </div>
                <div class="card-body">
                    <?php if (strlen($success) > 0): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $success ?>
                        </div>
                    <?php endif; ?>

                    <?php if (strlen($error) > 0): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <form action="update.php" method="post">
                        <div class="card-body">


                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category" value="<?=$category_to_update['categoryname']?>" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter New Category">

                            </div>
                                <input type="hidden" name="categoryid" value="<?=$category_to_update['categoryid']?>">
                            <input type="submit"  class="btn btn-primary" value="Update">
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
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../Assets/Dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../Assets/Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Assets/Dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>