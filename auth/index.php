<?php session_start();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORGNIC</title>
    <!--css-link -->
    <link rel="stylesheet" href="../Assets/Design/Auth/auth.css">

</head>
<body>
<div class="wraper">
    <form action="../App/Handler/signupHandler.php" method="post" dir="rtl">
        <h1>
            انشاء حساب جديد
        </h1>
        <?php
        if (isset($_SESSION['errors'])):
            foreach ($_SESSION['errors'] as $error):
                ?>
                <div>
                    <ul>
                        <li style="color: #ececec">
                            <?= $error ?>
                        </li>
                    </ul>
                </div>
            <?php
            endforeach;
            unset($_SESSION['errors']);
        endif;

        ?>
        <div class="inputbox">
            <div class="inputfield">
                <input type="text" name="fname" placeholder="الاسم الاول">
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputfield">
                <input type="text" name="lname" placeholder="الاسم الاخير">
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputfield">
                <input type="text" name="email" placeholder="الايميل">
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="inputfield">
                <input type="text" name="phone" placeholder="رقم الهاتف">
                <i class='bx bxs-phone'></i>
            </div>
            <div class="inputfield">
                <input type="password" name="password" placeholder="كلمه المرور">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="inputfield">
                <input type="password" name="confirmPassword" placeholder="تاكيد كلمه المرور">
                <i class='bx bxs-lock-alt'></i>
            </div>
        </div>

        <label><input name="term" type="checkbox"> متاكد من البينات المدخله اوفق علي الشروط والاحكام</label>
        <button type="submit" class="btn">تسجيل الدخول</button>

    </form>
</div>
</body>
</html>