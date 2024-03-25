<?php
require_once "App/Models/category.php";

$category = new category();

$categories = $category->getAllCategory();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Assets/Design/css/bootstrap.css">
    <link rel="stylesheet" href="Assets/Design/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Design/fontawesome-free/css/all.css">



    <style>
        :root {
            --bg-color: #f5f9f8;
            --text-color: #111111;
            --main-color: #c8815f;
            --big-font: 4.5rem;
            --h2-font: 3.3rem;
            --h3-font: 2rem;
            --normal-font: 1rem;
        }
        .menu {
            position: relative;
        }

        .menu .subment {
            position: absolute;
            top: 42px;
            left: 0;
            width: 220px;
            background-color: rgb(33, 37, 41);
            padding: 10px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .5);
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .5);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .5);
            display: none;
        }

        .subment li {
            color: #777;
            text-decoration: none;
        }

        .subment li a:hover {
            color: rgb(201, 206, 201);
        }


        .menu:hover .subment {
            display: block;
        }

    </style>


    <title>ORGANIC</title>
</head>
<body dir="rtl">

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="Assets/Images/logo.png" alt="" width="90" height="65">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">الرئيسية</a>
                    </li>
                    <li class="nav-item  menu">
                        <a class="nav-link" href="index.php">المنتجات</a>
                        <ul class="subment navbar-nav">
                            <li><a class="nav-link" href="index.php">الكل</a></li>

                            <?php
                if (!empty($categories)):
                    foreach ($categories as $category):
                        ?>
                            <li>
                                <a class="nav-link" href="index.php?category=<?= $category['categoryid'] ?>"><?= $category['categoryname'] ?></a>
                            </li>
                            <?php
                    endforeach;
                endif;
                ?>

                            <li>
                            </li>
                        </ul>
                    </li>

                    <?php if (!isset($_SESSION['user'])): ?>
                   <li class="nav-item"><a class="nav-link" href="auth/index.php">تسجيل حساب</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth/login.php">تسجيل دخول</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user'])): ?>

                    <?php if ($_SESSION['user']['is_admin'] == 1): ?>
                    <li class="nav-item"><a class="nav-link" href="Admin/order/order.php">وحدة التحكم</a></li>
                    <?php endif;?>

                    <li class="nav-item"><a class="nav-link" href="cart.php">السله</a></li>
                    <li class="nav-item"><a class="nav-link" href="order.php"> الطلبات </a></li>
                   <li class="nav-item"><a class="nav-link" href="auth/logout.php">تسجيل خروج</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>

    </nav>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-bottom: 100px">
        <div class="container-fluid">

        </div>

    </nav>


</header>
<!-- Header -->