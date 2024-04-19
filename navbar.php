<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="resources/image/Logo.png" width="110px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class=" nav-link jost-bold" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class=" nav-link jost-bold dropdown-toggle" href="#" data-bs-toggle="dropdown"> Shop </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            This is content of megamenu. <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link jost-bold" href="#">Our Story</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link jost-bold" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link jost-bold" href="contact_us.php">Contact Us</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="d-flex justify-content-end align-items-center gap-4">

                        <a href="search-product.php" class="text-decoration-none"><i class="bi bi-search fs-4"></i></a>

                        <?php
                        if (!isset($_SESSION["user"])) {
                        ?>
                            <a href="login.php" class="text-decoration-none"><i class="bi bi-heart fs-4"></i></a>
                            <a href="login.php" class="text-decoration-none"><i class="bi bi-handbag fs-4"></i></a>
                            <a href="login.php" class="btn btn-dark me-4 text-white">Login</a>
                        <?php
                        } else {
                        ?>
                            <a href="my-wishlist.php" class="text-decoration-none"><i class="bi bi-heart fs-4"></i></a>
                            <a href="my-cart.php" class="text-decoration-none"><i class="bi bi-handbag fs-4"></i></a>
                            <a href="my-profile.php" class=" me-4 ">
                                <img src="<?php if ($_SESSION["user"]["stetus_dp"] == "2") {
                                    echo("resources/image/default_profile.png");
                                }else {
                                    # code...
                                 echo('profile_images/'.$_SESSION["user"]["username"].'.png');}?>" width="35px" height="35px" class="rounded-5" />
                            </a>
                        <?php
                        }
                        ?>

                    </div>
                </span>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>