<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Now</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body onload="getChecoutAddress();">

    <?php

    include "navbar.php";

    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/MyShop/login.php");
        exit();
    } else {
        include "connecton.php";
        include "spinners.php";


        $user = $_SESSION["user"];

        $getAddress = Database::search("SELECT * FROM `user_address` INNER JOIN `city` ON `user_address`.`city_city_id` = `city`.`city_id` 
                        WHERE `user_address`.`users_username` = '" . $user["username"] . "' AND  `user_address`.`stetus_stetus_id` != '4';");
    ?>

        <div class="container min-vh-100">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">

                    <div class="col-md-9">
                        <h3 class="mb-3">Place Order</h3>

                        <h5 class="mt-2 mb-2">Select a delivery address</h5>
                        <small class="mb-2">Is the address you'd like to use displayed below? If so, click the corresponding "Deliver to this address" button. Or you can enter a new deliver address.</small>

                        <div class="w-100 d-flex gap-2 mt-4 mb-4" id="ad-body">

                            
                        </div>

                        <button class="fs-6 btn btn-dark mt-3  p-2" onclick="addNewAddressModel();"><i class="bi bi-plus"></i> Add New Address</button>

                        <h5 class="mt-4 mb-4">Select a payment method</h5>



                        <div class="form-check mt-3 mb-3">
                            <input class="form-check-input bg-black" type="radio" name="flexRadioDefault" id="c_on" checked onchange="methodHide();">
                            <label class="form-check-label fw-bold" for="c_on">
                                Chash on delivery
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input bg-black" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="methodShow();">
                            <label class="form-check-label fw-bold" for="flexRadioDefault2">
                                Debit/Credit Card
                            </label>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                            <p class="fw-bold fs-5">Subtotal</p>
                            <p class="fw-bold fs-5">Rs. <?= $_SESSION["total"]["subtotal"]; ?></p>
                        </div>

                        <div class="p-1 w-100 mt-3">
                            <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                                <p class="fs-6">Total Items</p>
                                <p class="fs-6"><?= $_SESSION["total"]["items"]; ?></p>
                            </div>
                            <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                                <p class="fs-6">Delivery Charge</p>
                                <p class="fs-6">Rs. <?= $_SESSION["total"]["deliveryCharge"]; ?></p>
                            </div>
                            <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                                <p class="fs-6">Discount</p>
                                <p class="fs-6">Rs. <?= $_SESSION["total"]["discount"]; ?></p>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                            <p class="fw-bold fs-5">Grand Total</p>
                            <p class="fw-bold fs-5">Rs. <?= $_SESSION["total"]["grandTotal"]; ?></p>
                        </div>

                        <div class="d-flex justify-content-center flex-column gap-2 align-items-center w-100 mt-2 mb-2">
                            <button class="btn btn-dark w-100 p-2" onclick="payCheck();">Place Order</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="toast toast-container position-fixed bottom-0 end-0 p-3 mb-4 bg-dark" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
            <div class="toast-header">
                <strong class="me-auto">message</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <label class="text-white" id="msg_l"></label>
            </div>
        </div>

    <?php
    }
    ?>

    <?php


    include "add-new-address-modle.php";

    include "footer.php";

    ?>
    <script src="https://www.paypal.com/sdk/js?client-id=AacVFATBU3IRA0tP72nBWr0RrEyEbB4W86RfNcDcf3lkLxZQfClcW7u356jjZV8n4rss4iDSLtHZ2NOP"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>