<?php

require_once "../../App/Core/helpers.php";
require_once "../../App\Models\product.php";

if (isset($_POST['productid'])) {
    $product = new product();
    $product->deleteProduct($_POST['productid']);
    $id = $_POST['id'];
    helpers::redirect("categoryDetails.php?id=$id");
}else{
    helpers::redirect("categoryDetails.php");
}
