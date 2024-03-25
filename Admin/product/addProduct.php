<?php

include "inc/head.php";

require_once "../../App/Core/helpers.php";
require_once "../../App\Models\product.php";
require_once "../../App/Core/validations.php";

$res = 0;
$category = new category;
if ($category->getAllCategory() > 0 ) {
    $category_list = $category->getAllCategory();
}else{
    $res = 1;
}

$success = '';
$error = '';


if (isset($_POST['productName'])) {

//    print_r($category->getCategoryById($_POST['categoryId'])) ;die;

    $product = new product();
    $product_image = helpers::handleImage($_FILES['productImg'], $_POST['productName'] . "_" . $category->getCategoryById($_POST['categoryId'])['categoryname'], "Assets/Products/");
    $res = $product->addProduct(
        [
            "productname" => $_POST['productName'],
            "price" => $_POST['productPrice'],
            "productdesc" => $_POST['productDesc'],
            "productquantity" => $_POST['productQuantity'],
            "weight" => $_POST['weight'],
            "categoryid" => $_POST['categoryId'],
            "image" => $product_image
            ]
    );

//    print_r($product->getProductData(6));die;

    if ($res) {
        $success = "Product Inserted";
        helpers::redirect("product.php");
    } else {
        $error = "Product Not Inserted";
    }


}


?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
            <h3 class="card-title">Add New Product</h3>
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
            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="productName" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Desc</label>
                        <textarea class="form-control" name="productDesc" rows="3" placeholder="Enter Product Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="text" name="productPrice" class="form-control" id="exampleInputEmail1"
                               placeholder="Enter Product Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Quantity</label>
                        <input type="text" name="productQuantity" class="form-control" id="exampleInputEmail1"
                               placeholder="Enter Product Quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Weight</label>
                        <input type="text" name="weight" class="form-control" id="exampleInputEmail1"
                               placeholder="Enter Product Weight in g or kg">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <select name="categoryId" class="form-control">
                            <?php
                                if(!$res):
                                foreach($category_list as $category):
                             ?>

                                    <option value="<?=$category['categoryid']?>"><?=$category['categoryname']?></option>

                            <?php
                                endforeach;
                                endif;
                             ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image</label>
                        <input type="file" name="productImg" class="form-control" >
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">ADD</button>
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