<?php
session_start();
include "../core/helpers.php";
include "../core/validations.php";

require_once "../Models/user.php";

$user  = new user();

$errors = [];

if(helpers::checkMethod('POST')){

    foreach ($_POST as $key => $value){
        $$key = helpers::clearInput($value);
    }

    //check validations and record the errors
    if (!is_null(validations::checkInput($fname, 25, 3, 'الاسم الاول'))){
        $errors[] = validations::checkInput($fname, 25, 3, 'الاسم الاول');
    }

    if (!is_null(validations::checkInput($lname, 25, 3, 'الاسم الاخير'))){
            $errors[] = validations::checkInput($lname, 25, 3, 'الاسم الاخير');
    }

    if (!is_null(validations::checkInput($password, 20, 5, 'كلمة المرور'))){
        $errors[] = validations::checkInput($password, 20, 5, 'كلمة المرور');
    }

    if (!is_null(validations::checkInput($phone, 20, 5, 'رقم الهاتف'))){
        $errors[] = validations::checkInput($phone, 20, 5, 'رقم الهاتف');
    }

    if ($password != $confirmPassword){
        $errors[] = "كلمة المرور لا تتطابق";
    }

    if (validations::emptyAndRequired($email)){
        $errors[] = 'الايميل مطلوب ';
    }elseif (!validations::checkEmail($email)){
        $errors[] = 'example@example.example :ادخل ايميل صحيح مثل';
    }



    // finish check the errors and record the errors

    if (empty($errors) && $_POST['term']){

        $exists = $user->checkUserExist("$email", $password);

        if (empty($exists)){
            $data = [
                "fname" => $fname,
                "lname" => $lname,
                "email" => $email,
                "password" => $password,
                "phone" => $phone
            ];

            $user->addUser($data);

            $_SESSION['user'] = $user->checkUserExist("$email", $password);

            sleep(1);
            helpers::redirect("../../index.php");
        }else{
            $errors[] = "الايميل وكلمة المرور مستخدمين من قبل مستخدم اخر.";
            $_SESSION['errors'] = $errors;
            helpers::redirect("../../auth/index.php");
        }

    }else{
        if (!$_POST['term']){
            $errors[] = "الموافقه علي الشروط والاحكام مطلوبه";
        }
        $_SESSION['errors'] = $errors;
        helpers::redirect("../../auth/index.php");
    }




}
