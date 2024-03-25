<?php
//include "inc/head.php";
require_once "../../App/Models/order.php";
require_once "../../App/Core/helpers.php";

if (isset($_POST['id'])){

    $order = new order;
    $res = $order->cancelOrder($_POST['id']);

    if ($res){
        helpers::redirect("order.php");
    }
}else{
    helpers::redirect("order.php");
}

?>