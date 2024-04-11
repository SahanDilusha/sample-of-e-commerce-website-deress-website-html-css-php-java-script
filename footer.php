<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="container-fluid  p-0">

        <footer class="bg-dark text-center  text-lg-start text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row mt-4">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <img src="resources/image/Logo_white.png" class="mb-3" />

                        <ul class="list-unstyled mb-0">
                            <li class="mb-2 ">
                                <i class="bi bi-telephone fs-6 jost-bold "> (704) 555-0127</i>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-envelope fs-6 jost-bold"> krist@exampale.com</i>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-geo-alt fs-6 jost-bold"> 3891 Ranchview Dr. Richardson,<br /> California</i>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase jost-bold jost-bold">Infromation</h5>

                        <ul class="list-unstyled">

                            <?php

                            if (isset($_SESSION["user"])) {
                            ?>
                                <li class="mb-2">
                                    <a href="my-profile.php" class="text-white jost-bold text-decoration-none"></i>My Account</a>
                                </li>
                                <li class="mb-2">
                                    <a href="my-cart.php" class="text-white jost-bold text-decoration-none">My Cart</a>
                                </li>
                                <li class="mb-2">
                                    <a href="my-wishlist.php" class="text-white jost-bold text-decoration-none">My Wishlist</a>
                                </li>
                                <li class="mb-2">
                                    <a  class="text-white jost-bold text-decoration-none" onclick="Logout();">Logout</a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="mb-2">
                                    <a href="login.php" class="text-white jost-bold text-decoration-none"></i>Login or Register</a>
                                </li>
                            <?php
                            }

                            ?>

                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase jost-bold">Service</h5>

                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#!" class="text-white jost-bold text-decoration-none">About Us</a>
                            </li>
                            <li class="mb-2">
                                <a href="#!" class="text-white jost-bold text-decoration-none">Careers</a>
                            </li>
                            <li class="mb-2">
                                <a href="#!" class="text-white jost-bold text-decoration-none">Delivery Policy</a>
                            </li>
                            <li class="mb-2">
                                <a href="#!" class="text-white jost-bold text-decoration-none">Privacy Policy</a>
                            </li>
                            <li class="mb-2">
                                <a href="#!" class="text-white jost-bold text-decoration-none">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase jost-bold mb-2">Subscribe</h5>

                        <p class="jost-bold fs-6">Enter your email below to be the frist to know adout new collection and product launches.</p>
                        <div class="d-flex justify-content-between  align-items-center border rounded-2 border-2">
                            <i class="text-white bi bi-envelope-fill px-2 fs-5"></i>
                            <input type="email" class="form-control bg-dark text-white px-1 border-0" id="subscribe_email" />
                            <button class="text-white btn px-2 fs-5 border-0" onclick="Subscribe();">→</button>
                        </div>

                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3 jost-bold" style="background-color: rgba(0, 0, 0, 0.2)">
                © <?php echo (date("Y")); ?> Copyright:
                <a class="text-white jost-bold" href="https://Krist.com/">Krist.com</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>
    <!-- End of .container -->

    <!-- Modal -->
    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="fs-5" id="error-text"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>