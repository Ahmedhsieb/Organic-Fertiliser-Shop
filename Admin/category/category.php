<?php
include "inc/head.php";
require_once "../../App\Models\category.php";

$res = 0;
$category = new category;
if ($category->getAllCategory() > 0) {
    $category_list = $category->getAllCategory();
} else {
    $res = 1;
}

?>    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item active">Category Table</li>
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
                            <th>Category</th>
                            <th>Details</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!$res): ?>
                            <?php foreach ($category_list as $cat): ?>
                                <tr>
                                    <td><?= $cat['categoryid'] ?></td>
                                    <td><?= $cat['categoryname'] ?></td>
                                    <td><a href="categoryDetails.php?id=<?= $cat['categoryid'] ?>">Details</a></td>
                                    <td>
                                        <form action="update.php" method="post">
                                            <input type="hidden" name="categoryid" value="<?=$cat['categoryid']?>">
                                            <input type="submit"  class="btn btn-primary" value="Update">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="categoryid" value="<?=$cat['categoryid']?>">
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