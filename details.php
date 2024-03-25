<?php
session_start();
include "inc/navbar.php";

require_once "App\Models\product.php";

if (isset($_GET['id'])) {
    $product = new product();

    $products = $product->getProductData($_GET['id']);

    $related_product = $product->getRelatedProduct($_GET['category'], $_GET['id']);

} else {
    header("location: index.php");
}

?>

<!-- Content -->
<main class="container">
    <div class="card m-auto w-75">
        <img src="<?= $products['image'] ?>" class="card-img-top " height="500" alt="...">
        <div class="card-body">

            <?php if (isset($_SESSION['errors'])) :
                foreach ($_SESSION['errors'] as $error):
                    ?>
                    <ul>
                        <li>
            <div class="alert alert-danger text-center"><?=$error?></div>

                        </li>
                    </ul>
                <?php
                endforeach;
                unset($_SESSION['errors']);
            endif; ?>

<!--            <div class="alert alert-warning text-center">out of rang</div>-->

            <h5 class="card-title"> <?= $products['productname'] ?></h5>
            <p class="card-text">تفاصيل:
                <?= $products['productdesc'] ?></p>
            <p class="card-text">السعر <?= $products['price'] ?></p>
            <p class="card-text">(<?= $products['weight'] ?>)الوزن</p>

            <?php if (isset($_SESSION['user'])): ?>

            <form action="App/Handler/cartHandler.php" method="post" class="text-center">

                <input type="number" name="quantity" class="form-control form-control-color m-auto" id="exampleColorInput" value=1>
                <input type="hidden" name="productid" value="<?= $products['productid'] ?>">

                <?php if ($products['productquantity'] > 0 ) : ?>
                    <button type="submit" name="add" class="btn btn-primary mt-2">
                        اضف الي السله
                    </button>
                <?php else: ?>
                    <h1><div class="badge bg-danger">نفذت الكميه</div></h1>
                <?php endif; ?>

            </form>

            <?php endif; ?>


        </div>
    </div>


</main style="margin-top: 120px ">
<!-- Content -->

<!-- Footer -->
<div class="container">
    <footer class="d-flex sticky-bottom flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <!-- Logo -->
        <div class="col-md-4 d-flex align-items-center">
            <a class="navbar-brand" href="index.php">
                <img src="Assets/Images/logo.png" alt="" width="80" height="40">
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Company, Inc</span>
        </div>
        <!-- Logo -->


        <!-- Social Links -->
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><i  class="fab fa-twitter"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i  class="fab fa-instagram"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i  class="fab fa-facebook"></i></a></li>
        </ul>
        <!-- Social Links -->

    </footer>
</div>
<!-- Footer -->

<script src="Assets/Design/js/popper.min.js"></script>
<script src="Assets/Design/js/jquery-3.7.1.min.js"></script>
<script src="Assets/Design/js/bootstrap.min.js"></script>
<script src="Assets/Design/js/bootstrap.js"></script>
</body>
</html>