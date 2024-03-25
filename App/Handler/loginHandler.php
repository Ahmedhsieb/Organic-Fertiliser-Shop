<?php
session_start();

include "../Core/helpers.php";
include "../Core/validations.php";

require_once "../Models/user.php";

$user  = new user();

$errors = [];

if(helpers::checkMethod('POST')){

    foreach ($_POST as $key => $value){
        $$key = helpers::clearInput($value);
    }

    if (validations::emptyAndRequired($email)){
        $errors[] = 'الايميل مطلوب ';
    }elseif (!validations::checkEmail($email)) {
        $errors[] = 'example@example.example :ادخل ايميل صحيح مثل';
    }

    if (validations::emptyAndRequired($password)){
        $errors[] = 'كلمة المرور مطلوبه';
    }

    if (empty($errors)){
        $exists = $user->checkUserExist($email, $password);

        if (!empty($exists)){
            $_SESSION['user'] = $exists;
            helpers::redirect("../../index.php");
        }else{
            $errors[] = "الايميل او كلمة المرور غير صحيحين ان لم يكن لك حساب قم بانشاء حساب جديد.";
            $_SESSION['errors'] = $errors;
            helpers::redirect("../../auth/login.php");
        }

    }else{
        $_SESSION['errors'] = $errors;
        helpers::redirect("../../auth/login.php");
    }




}
