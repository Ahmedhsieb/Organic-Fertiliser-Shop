<?php
session_start();
require_once "App/Models/category.php";
include "inc/navbar.php";
ini_set("display_errors", 0);
require_once "App/Models/product.php";

$category = new category();
$product = new product();

$categories = $category->getAllCategory();

if(isset($_GET['category'])){
    if ($_GET['category'] == 0){
        $products = $product->getAllProduct();
    }else{
        $products = $product->getProductByCategory($_GET['category']);

    }
}else{
    $products = $product->getAllProduct();
}


?>

    <!-- Content -->
    <main>
        <!-- Slider -->
        <div id="myCarousel" class="carousel slide mb-6 " style="margin-top: -110px" data-bs-ride="carousel" dir="ltr" >
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4" class=""></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100 h-50"  src="Assets/Images/Slider/1.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Organic</h1>
                            <p class="opacity-75">This Is My Organic Fertiliser Shop, hello.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">عرض المزيد</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="w-100" height="765px" src="Assets/Images/Slider/3.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Organic</h1>
                            <p class="opacity-75">This Is My Organic Fertiliser Shop, hello.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">عرض المزيد</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="w-100" height="765px" src="Assets/Images/Slider/4.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Organic</h1>
                            <p class="opacity-75">This Is My Organic Fertiliser Shop, hello.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">عرض المزيد</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="w-100 h-75" src="Assets/Images/Slider/5.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Organic</h1>
                            <p class="opacity-75">This Is My Organic Fertiliser Shop, hello.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">عرض المزيد</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Slider -->

        <!-- Products -->
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">المنتجات</h2>

            <div class="row g-4">

                <?php
                if (!empty($products)):
                foreach ($products as $product):
                ?>
                <div class="col-3">

                    <div class="card text-center" style="width: 18rem;">
                    <a href="details.php?id=<?=$product['productid']?>&category=<?=$product['categoryid']?>">
                        <img src="<?=$product['image']?>" height="250" width="50" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title"><?=$product['productname']?></h5>
                            <h6 class="card-text"><?=$product['price']?>£</h6>
                            <p class="card-text"><?=substr($product['productdesc'],0, 10)?>...</p>
                            <a href="details.php?id=<?=$product['productid']?>&category=<?=$product['categoryid']?>" class="btn btn-primary">التفاصيل</a>

                            <?php if ($product['productquantity'] == 0 ) : ?>
                                <h1><div class="badge bg-danger">نفذت الكميه</div></h1>
                            <?php else:?>
                            <?php if (isset($_SESSION['user'])): ?>

                                <form action="App/Handler/cartHandler.php" method="post" class="text-center">

                                    <input type="hidden" name="quantity" class="form-control form-control-color m-auto" id="exampleColorInput" value=1>
                                    <input type="hidden" name="productid" value="<?= $product['productid'] ?>">
                                        <button type="submit" name="add" class="btn btn-success mt-2">
                                            اضف الي السله
                                        </button>

                                </form>
                                <?php endif; ?>


                            <?php endif;?>
                        </div>
                    </div>

                </div>

                <?php
                endforeach;
                endif;
                ?>

            </div>
        </div>
        <!-- Products -->

    </main>
    <!-- Content -->

    <!-- Footer -->
    <div class="container">
        <footer class="d-flex sticky-bottom flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <!-- Logo -->
            <div class="col-md-4 d-flex align-items-center">
                <a class="navbar-brand" href="index.html">
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