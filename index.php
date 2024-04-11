<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Krist</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body onload="startCountdown();">

    <?php
    include "connecton.php";
    include "navbar.php"; ?>

    <div class="container-fluid">
        <div class="row">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="resources/image/new-line-farm-rio-web.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resources/image/new-line-farm-rio-web.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resources/image/new-line-farm-rio-web.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop by Categories start -->

    <div class="container py-5 min-vh-100">

        <div class="row">
            <div class="col-12">
                <h3 class="jost-bold mt-4 mb-4">Shop by Categories</h3>
            </div>
        </div>

        <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/img1-1.png">
                                        <img class="pic-2" src="product_image/img1-3.png">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> T-Shirts & Polos </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d1.jpg">
                                        <img class="pic-2" src="product_image/d2.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Dresses </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d3.jpg">
                                        <img class="pic-2" src="product_image/d4.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Jeans & Joggers </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d5.jpg">
                                        <img class="pic-2" src="product_image/d6.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Overcoats & Cardigans </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item active">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d7.jpg">
                                        <img class="pic-2" src="product_image/d8.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Baby Collection </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d9.jpg">
                                        <img class="pic-2" src="product_image/d10.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Footwear </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d11.jpg">
                                        <img class="pic-2" src="product_image/d12.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Hand Bags & Wallets </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="product-grid">

                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/d13.jpg">
                                        <img class="pic-2" src="product_image/d14.jpg">
                                    </a>
                                </div>
                                <div class=" position-relative mt-2 d-flex justify-content-center align-items-center gap-5">
                                    <button class="btn btn-outline-dark rounded-3 p-2"> Sarong </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more carousel items here if needed -->
            </div>
            <!-- Previous & Next buttons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#product-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#product-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Shop by Categories end -->

        <!-- Our Bestseller start-->

        <div class="row">
            <div class="col-12">
                <h3 class="jost-bold mt-5 mb-4 text-center">Our Bestseller</h3>
            </div>

            <?php

            $getProduct = Database::search("SELECT * FROM `product` WHERE `product`.`stetus_stetus_id` != '6' AND `product`.`star` >= '200' LIMIT 20;");

            include "product-card.php";

            ?>


        </div>

        <!-- Our Bestseller End -->
    </div>

    <!-- Deals of the Month start -->
    <div class="container-fluid">
        <div class="row d-flex flex-row justify-content-center mb-5">

            <div class="col-md-10 col-lg-6 d-flex justify-content-center align-items-center">
                <div class="timer-box">

                    <h3>Deals of the Month</h3>

                    <p>Slash is Sri Lanka's first Buy-One-Get-One Free focused app with deals and discount coupons from
                        locations across Sri Lanka.</p>

                    <div class="countdown mt-4" id="countdown">
                        <p id="demo" class="jost-bold"></p>
                    </div>

                    <button class="btn btn-dark fs-5 mt-3 ">Shop Now →</button>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center align-items-center  d-none d-lg-block">
                <img src="resources/image/Rectangle 3463272.png" width="400px">
            </div>

        </div>

    </div>

    <!-- Deals of the Month end-->

    <!-- What our Customer say's start -->

    <div class="container-fluid  mb-5 py-2" style="background-color: rgb(247, 247, 248);">

        <div class="col-12">
            <h3 class="jost-bold mt-5 mb-4 text-center mt-5">What our Customer say's</h3>
        </div>

        <div class="row g-2">
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">

                    <div class="user-image">

                        <img src="profile_images/download.jpeg" class="rounded-circle" width="80">

                    </div>

                    <div class="user-content">

                        <h5 class="mb-0">Bruce Hardy</h5>
                        <span>Software Developer</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>

                    </div>

                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>

                </div>
            </div>

            <div class="col-md-4">

                <div class="card p-3 text-center px-4">

                    <div class="user-image">

                        <img src="profile_images/download.jpeg" class="rounded-circle" width="80">

                    </div>

                    <div class="user-content">

                        <h5 class="mb-0">Mark Smith</h5>
                        <span>Web Developer</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>

                    </div>

                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card p-3 text-center px-4">

                    <div class="user-image">

                        <img src="profile_images/download.jpeg" class="rounded-circle" width="80">

                    </div>

                    <div class="user-content">

                        <h5 class="mb-0">Veera Duncan</h5>
                        <span>Software Architect</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>

                    </div>

                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- What our Customer say's end -->

    <!-- Instagram Stories start -->

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <h3 class="text-center jost-bold">Our Instagram Stories</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-4 col-lg-3 mb-5 d-flex justify-content-center align-items-center ">

                <div class="ins position-absolute d-flex justify-content-center flex-column align-items-center">
                    <i class="bi bi-instagram fs-1 text-white"></i>
                    <p class="fs-4 fw-bold text-white text-uppercase d-none">hjhcahbc</p>
                </div>

                <a href="">
                    <img src="resources/image/Rectangle 3463273 (1).png" class="" width="300px" />
                </a>
            </div>
            <div class="col-md-4 col-lg-3 mb-5 d-flex justify-content-center align-items-center ">

                <div class="ins position-absolute d-flex justify-content-center flex-column align-items-center">
                    <i class="bi bi-instagram fs-1 text-white"></i>
                    <p class="fs-4 fw-bold text-white text-uppercase d-none">hjhcahbc</p>
                </div>

                <a href="">
                    <img src="resources/image/Rectangle 3463272.png" class="" width="300px" />
                </a>
            </div>
            <div class="col-md-4 col-lg-3 mb-5 d-flex justify-content-center align-items-center ">

                <div class="ins position-absolute d-flex justify-content-center flex-column align-items-center">
                    <i class="bi bi-instagram fs-1 text-white"></i>
                    <p class="fs-4 fw-bold text-white text-uppercase d-none">hjhcahbc</p>
                </div>

                <a href="">
                    <img src="resources/image/Rectangle 3463273.png" class="" width="300px" />
                </a>
            </div>
            <div class="col-md-4 col-lg-3 mb-5 d-flex justify-content-center align-items-center ">

                <div class="ins position-absolute d-flex justify-content-center flex-column align-items-center">
                    <i class="bi bi-instagram fs-1 text-white"></i>
                    <p class="fs-4 fw-bold text-white text-uppercase d-none">hjhcahbc</p>
                </div>

                <a href="">
                    <img src="resources/image/Rectangle 3463273 (1).png" class="" width="300px" />
                </a>
            </div>
        </div>

        <div class="row mb-5">

            <div class="col-md-4 col-lg-3 mb-5 mt-5 d-flex flex-column justify-content-center align-items-center  justify-content-lg-start align-items-lg-start">
                <i class="bi bi-box fs-1"></i>
                <h4>Free Shipping</h4>
                <small>Free shipping for order above $150</small>
            </div>

            <div class="col-md-4 col-lg-3 mb-5 mt-5 d-flex flex-column justify-content-center align-items-center  justify-content-lg-start align-items-lg-start">
                <i class="bi bi-coin fs-1"></i>
                <h4>Money Guarantee</h4>
                <small>Within 30 days for an exchnage</small>
            </div>

            <div class="col-md-4 col-lg-3 mb-5 mt-5 d-flex flex-column justify-content-center align-items-center  justify-content-lg-start align-items-lg-start">
                <i class="bi bi-headset fs-1"></i>
                <h4>Online Support</h4>
                <small>24 hours a day,7days a week</small>
            </div>

            <div class="col-md-4 col-lg-3 mb-5 mt-5 d-flex flex-column justify-content-center align-items-center  justify-content-lg-start align-items-lg-start">
                <i class="bi bi-credit-card-2-back fs-1"></i>
                <h4>Flexible Payment</h4>
                <small>Pay with multiple credit cards</small>
            </div>

        </div>

    </div>

    <!-- Instagram Stories end -->

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
        <div class="toast-header">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>


    <?php include  "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>