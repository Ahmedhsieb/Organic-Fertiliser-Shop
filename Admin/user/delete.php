<?php

require_once "../../App/Models/user.php";
require_once "../../App/Core/helpers.php";

if (isset($_POST['id'])){
    $user = new user;
    $user->deleteUser($_POST['id']);
    helpers::redirect("user.php");
}else{
    helpers::redirect("user.php");
}