<?php

require_once "../../App/Core/helpers.php";
require_once "../../App\Models\product.php";

if (isset($_POST['productid'])) {
    $product = new product();
    $product->deleteProduct($_POST['productid']);
    helpers::redirect("product.php");
}else{
    helpers::redirect("product.php");
}
