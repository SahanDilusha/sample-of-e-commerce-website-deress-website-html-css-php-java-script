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

<body>

    <?php

    include "navbar.php";

    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/MyShop/login.php");
        exit();
    } else {
        include "connecton.php";


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

                        <div class="w-100 d-flex gap-2 mt-4 mb-4">

                            <?php
                            if ($getAddress->num_rows !== 0) {

                                for ($i = 0; $i < $getAddress->num_rows; $i++) {

                                    $row = $getAddress->fetch_assoc();

                            ?>


                                    <div class="col-md-3   px-2 py-1 <?php if ($_SESSION["address_id"] ==  $row["address_id"]) {
                                                                        ?> 
                                        bg-danger-subtle 
                                        <?php
                                                                        } else { ?> bg-secondary-subtle <?php } ?> " onclick="SelectShoppingAddress(<?= $row['address_id']; ?>);">
                                        <div class="w-100 m-2 p-1 d-flex justify-content-between align-items-center">
                                            <label class="fs-5 fw-bold"><?php echo ($row["address_name"]); ?></label>

                                        </div>
                                        <div class="w-100 px-1 d-flex gap-2 flex-column">
                                            <label><?php echo ($row["line_1"] . ", " . $row["line_2"] . ", " . $row["city_name"]); ?></label>
                                            <label><?php echo ($row["address_mobile"]) ?></label>
                                        </div>
                                        <div class="d-flex  mt-2 mb-2 justify-content-between align-items-center">
                                            <?php

                                            if ($row["stetus_stetus_id"] !== "2") {
                                            ?>
                                                <button class="btn btn-secondary bi bi-pencil-square" onclick="setDefaultAddress(<?php echo ($row['address_id']); ?>);"> Set Default</button>
                                            <?php
                                            }
                                            if ($row["stetus_stetus_id"] == "2") {
                                            ?>
                                                <label class="p-1 text-success fw-bold">Default</label>
                                            <?php
                                            } ?>
                                            <button class="btn bg-danger-subtle border-danger bi bi-trash3" onclick="deleteAddress(<?php echo ($row['address_id']); ?>)"> Delete</button>
                                        </div>
                                    </div>

                            <?php }
                            } ?>

                        </div>

                        <button class="fs-6 btn btn-dark mt-3  p-2" onclick="addNewAddressModel();"><i class="bi bi-plus"></i> Add New Address</button>

                        <h5 class="mt-4 mb-4">Select a payment method</h5>



                        <div class="form-check mt-3 mb-3" >
                            <input class="form-check-input bg-black" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onchange="methodHide();">
                            <label class="form-check-label fw-bold" for="flexRadioDefault1" >
                                Chash on delivery
                            </label>
                        </div>
                        <div class="form-check mb-3" >
                            <input class="form-check-input bg-black" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="methodShow();">
                            <label class="form-check-label fw-bold" for="flexRadioDefault2">
                                Debit/Credit Card
                            </label>
                        </div>
                        <div class="d-none" id="card-from">
                            <?php
                            $getCard = Database::search("SELECT * FROM `user_card` INNER JOIN `card_type` ON `user_card`.`card_type_card_type_id` = `card_type`.`card_type_id` WHERE `user_card`.`users_username` = '" . $user["username"] . "'");

                            if ($getCard->num_rows !== 0) {

                            ?>

                                <div class="w-100 d-flex gap-2">

                                    <?php
                                    for ($i = 0; $i < $getCard->num_rows; $i++) {

                                        $row = $getCard->fetch_assoc();
                                    ?>
                                        <div class="col-md-3 gap-2 m-2 bg-secondary-subtle d-flex py-3 px-1 justify-content-center align-items-center" onclick="filCard('<?= $row['card_no'] ?>','<?= $row['h_name'] ?>','<?= $row['cvv'] ?>','<?= $row['ex_y'] ?>','<?= $row['ex_m'] ?>');">

                                            <?php

                                            if ($row["card_type_card_type_id"] == "1") {


                                            ?> <img src="resources/image/vcard.png" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="resources/image/mCard.png" />
                                            <?php
                                            }
                                            ?>

                                            <small class="fw-bold"><?= $row["card_no"]; ?></small>

                                        </div>

                                    <?php } ?>
                                </div>
                            <?php } ?>




                            <div class="col-md-6 mt-2">
                                <label for="c_no" class="form-label">Card Number <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="c_no" required />
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="c_name" class="form-label">Name on the Card <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="c_name" required />
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="c_cvv" class="form-label">CVV <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="c_cvv" required />
                            </div>

                            <div class="col-6 mt-2">
                                <label for="c_ed" class="form-label">Expiry Date <small class="text-danger">*</small></label>
                                <div class="d-flex justify-content-center align-items-center g-2">
                                    <input type="text" class="form-control mx-1" id="c_ed_y" required placeholder="YY" />
                                    -
                                    <input type="text" class="form-control mx-1" id="c_ed_m" required placeholder="MM" />
                                </div>

                            </div>

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
                            <button class="btn btn-dark w-100 p-2">Pay Now</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="script.js"></script>


</body>

</html>