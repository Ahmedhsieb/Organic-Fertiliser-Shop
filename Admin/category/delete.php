<?php

require_once "../../App/Core/helpers.php";
require_once "../../App\Models\category.php";

if (isset($_POST['categoryid'])){
    $category = new category();
    $category->deleteCategory($_POST['categoryid']);
    helpers::redirect("category.php");
}else{
    helpers::redirect("category.php");
}