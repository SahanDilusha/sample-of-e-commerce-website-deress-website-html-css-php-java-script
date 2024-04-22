<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body onload="onclick=show(2);">

    <?php

    include 'navbar.php';

    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/MyShop/login.php");
    } else {

        include "connecton.php";
        include "spinners.php";

        $user = $_SESSION["user"];

    ?>

        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0  ">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item" onclick="show(1);">
                                <div class="nav-link align-middle px-0 text-dark">
                                    <i class="fs-4 bi bi-person"></i> <span class="ms-1 d-none d-sm-inline">Personal
                                        Information</span>
                                </div>
                            </li>
                            <li>
                                <div class="nav-link px-0 align-middle text-dark" onclick="show(2);">
                                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">My Orders</span>
                                </div>
                            </li>
                            <li onclick="show(3);">
                                <div class="nav-link px-0 align-middle text-dark">
                                    <i class="fs-4 bi bi-heart"></i> <span class="ms-1 d-none d-sm-inline">My
                                        Wishlist</span>
                                </div>
                            </li>
                            <li onclick="show(4);">
                                <div class="nav-link px-0 align-middle text-dark">
                                    <i class="fs-4 bi bi-geo-alt"></i> <span class="ms-1 d-none d-sm-inline">Manage
                                        Addresses</span>
                                </div>
                            </li>
                            <li onclick="show(5);">
                                <div class="nav-link px-0 align-middle text-dark">
                                    <i class="fs-4 bi bi-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Saved
                                        Cards</span>
                                </div>
                            </li>
                            <li onclick="show(6);">
                                <div class="nav-link px-0 align-middle text-dark">
                                    <i class="fs-4 bi bi-bell"></i> <span class="ms-1 d-none d-sm-inline">Notifications</span>
                                </div>
                            </li>
                            <li onclick="show(7);">
                                <div href="#" class="nav-link px-0 align-middle text-dark">
                                    <i class="fs-4 bi bi-gear"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
                                </div>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="col py-3" id="pi">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-dark fs-3 jost-bold">Personal Information</label>
                        </div>

                        <div class="col-12 d-flex justify-content-center flex-column flex-lg-row justify-content-lg-between algin-items-center mt-4">
                            <div class="justify-content-center align-items-center d-flex" onclick="uplodeImgModel();">
                                <div class="justify-content-center align-items-center d-flex">
                                    <i class="bi bi-pencil-square position-absolute p-2 rounded-circle bg-white"></i>

                                    <?php

                                    if ($user["stetus_dp"] == "2") {
                                    ?>
                                        <img src="resources/image/default_profile.png" width="110px" height="100px" class="rounded-circle" />

                                    <?php
                                    } else {

                                    ?>
                                        <img src="profile_images/<?php echo ($user["username"]); ?>.png" width="100px" height="100px" class="rounded-circle" />

                                    <?php
                                    }

                                    ?>

                                </div>
                                <div>
                                    <label class="fs-4 mx-3 fw-bold"><?php echo ($user["username"]); ?> <small class="fs-6 text-white rounded-2 p-1 bg-success">Active</small></label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center algin-items-center p-2 h-75">
                                <button class="btn btn-dark " onclick="enableEdit(1);" id="editPBtn"><i class="bi bi-pencil-square "></i> Edit Profile</button>
                                <button class="btn btn-dark d-none" onclick="enableEdit(0);" id="cBtn"><i class="bi bi-x-lg"></i> Cancel</button>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 mb-4 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" <?php echo ("value='" . $user["first_name"] . "'") ?> required disabled />
                        </div>
                        <div class="col-12 col-lg-6 mb-4 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" <?php echo ("value='" . $user["last_name"] . "'") ?> required disabled />
                        </div>
                        <div class="col-12 col-lg-6 mb-4 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="pn" <?php echo ("value='" . $user["mobile"] . "'") ?> required disabled />
                        </div>
                        <div class="col-12 col-lg-6 mb-4 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" <?php echo ("value='" . $user["email"] . "'") ?> required disabled />
                        </div>

                        <div class="col-12  mb-4 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">Biling Address</label>
                            <input type="text" class="form-control" id="ba" value="<?php
                                                                                    $getDAddress = Database::search("SELECT * FROM `user_address` INNER JOIN `city` ON `user_address`.`city_city_id` = `city`.`city_id`  WHERE `users_username` = '" . $user["username"] . "' AND `stetus_stetus_id` = '2';");
                                                                                    if ($getDAddress->num_rows !== 0) {
                                                                                        $row = $getDAddress->fetch_assoc();

                                                                                        echo ($row["line_1"] . ", " . $row["line_2"] . ", " . $row["city_name"]);
                                                                                    }
                                                                                    ?>" required disabled />
                        </div>
                        <div class="col-12 mb-4 mt-5 d-none" id="update-btn">
                            <button class="btn btn-outline-dark" onclick="updateProfile();">Update</button>
                        </div>
                    </div>
                </div>
                <!-- Personal Information -->

                <!-- Manage Address -->
                <div class="col py-3 d-none" id="ma">
                    <div class="row">
                        <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                            <label class="text-dark fs-3 jost-bold">Manage Address</label>
                            <button class="fs-6 btn btn-dark mt-3 p-lg-3 p-2" onclick="addNewAddressModel();"><i class="bi bi-plus"></i> Add New Address</button>
                        </div>

                        <?php

                        $getAddress = Database::search("SELECT * FROM `user_address` INNER JOIN `city` ON `user_address`.`city_city_id` = `city`.`city_id` 
                        WHERE `user_address`.`users_username` = '" . $user["username"] . "' AND  `user_address`.`stetus_stetus_id` != '4';");

                        if ($getAddress->num_rows == 0) {
                        ?>
                            <div class="col-12 mt-5 d-flex flex-column gap-3 justify-content-center align-items-center">
                                <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
                                <h5 class="text-secondary">not alivibal</h5>
                            </div>

                            <?php
                        } else {

                            for ($i = 0; $i < $getAddress->num_rows; $i++) {

                                $row = $getAddress->fetch_assoc();

                            ?>
                                <div class="col-12 mt-3 d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column gap-1">
                                        <label class="fs-5 fw-bold"><?php echo ($row["address_name"]); ?></label>
                                        <small><i class="bi bi-geo-alt"></i> <?php echo ($row["line_1"] . ", " . $row["line_2"] . ", " . $row["city_name"]); ?></small>
                                        <label><i class="bi bi-telephone"></i> <?php echo ($row["address_mobile"]) ?></label>
                                        <?php

                                        if ($row["stetus_stetus_id"] == "2") {
                                        ?>
                                            <label class="p-1 text-success fw-bold">Default</label>
                                        <?php
                                        }

                                        ?>
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <?php

                                        if ($row["stetus_stetus_id"] !== "2") {
                                        ?>
                                            <button class="btn btn-secondary bi bi-pencil-square" onclick="setDefaultAddress(<?php echo ($row['address_id']); ?>);"> Set Default</button>
                                        <?php
                                        }

                                        ?>
                                        <button class="btn btn-danger bi bi-trash3" onclick="deleteAddress(<?php echo ($row['address_id']); ?>);"> Delete</button>
                                    </div>
                                </div>

                        <?php

                            }
                        }

                        $getInvoice = Database::search("SELECT * FROM `invoice` INNER JOIN `stetus` ON `invoice`.`invoice_stetus`=`stetus`.`stetus_id` WHERE `invoice`.`users_username` = '" . $user["username"] . "' ORDER BY `invoice`.`date` ASC;");

                        ?>
                    </div>
                </div>
                <!-- Manage Address -->

                <!-- My Orders-->
                <div class="col d-none" id="mo">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-dark fs-3 jost-bold">My Orders <?php
                                                                                if ($getInvoice->num_rows != 0) {
                                                                                    echo ("(" . $getInvoice->num_rows . ")");
                                                                                }
                                                                                ?></label>
                        </div>

                        <?php

                        if ($getInvoice->num_rows != 0) {

                            for ($i = 0; $i < $getInvoice->num_rows; $i++) {

                                $row = $getInvoice->fetch_assoc();

                                $getItemCount = Database::search("SELECT COUNT(`invoice_items`.`invoice_items_id`) AS `count` FROM  `invoice_items` WHERE  `invoice_items`.`invoice_invoice_id` ='" . $row["invoice_id"] . "';");

                        ?>



                                <div class="col-12 mt-3 d-flex justify-content-between align-items-center">

                                    <div class="d-flex gap-1 mt-2 justify-content-center align-items-center gap-2">
                                        <div class="d-flex flex-column">
                                            <label class="fs-6 fw-bold"><?= $row["invoice_id"]; ?></label>
                                            <small>All Items: <?php

                                                                if ($getItemCount->num_rows != 1) {
                                                                    echo ("0");
                                                                } else {
                                                                    echo ($getItemCount->fetch_assoc()["count"]);
                                                                }

                                                                ?></small>
                                            <small class="fw-bold">LKR <?= $row["grand_total"]; ?></small>
                                        </div>
                                    </div>

                                    <div class="d-flex  justify-content-between  flex-column gap-3">
                                        <button class="btn btn-outline-dark bi bi-eye" onclick="ViewOrder('<?= $row['invoice_id']; ?>');"> View Order</button>

                                        <?php
                                        if ($row["invoice_stetus"] == "11") {
                                        ?>
                                            <button class="btn btn-outline-danger bi bi-x-lg"> Cancel</button>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($row["invoice_stetus"] == "14") {

                                        ?>
                                            <small class="bg-success text-center text-white rounded-3"><?= $row["stetus_name"] ?></small>
                                        <?php
                                        } else {
                                        ?>
                                            <small class="bg-secondary text-center text-white rounded-3"><?= $row["stetus_name"] ?></small>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                        <?php }
                        }
                        ?>

                    </div>
                </div>
                <!-- My Orders-->

                <!-- My Wishlist-->
                <div class="col d-none" id="mw">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-dark fs-3 jost-bold">My Wishlist</label>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <?php include "wishi-list-items.php"; ?>
                        </div>
                    </div>
                </div>
                <!-- My Wishlist-->

                <!-- Notifications -->
                <div class="col d-none" id="n">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-dark fs-3 jost-bold">Notifications</label>
                        </div>

                        <div class="col-12 mt-3 d-flex justify-content-between align-items-center">

                            <div class="d-flex gap-1 mt-2 justify-content-center align-items-center gap-2">
                                <div>
                                    <img src="profile_images/download.jpeg" width="50px" class="rounded-circle" />
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="fs-6 fw-bold">Profile Update</label>
                                    <small>You just update your profile picture</small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <label>Jest Now</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notifications -->

                <!-- Saved Cards -->
                <div class="col py-3 d-none" id="sc">
                    <div class="row">
                        <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                            <label class="text-dark fs-3 jost-bold">Saved Cards</label>
                            <button class="fs-6 btn btn-dark mt-3 p-lg-3 p-2" onclick="addNewCard();"><i class="bi bi-plus"></i> Add New Card</button>
                        </div>

                        <?php


                        $getCard = Database::search("SELECT * FROM `user_card` INNER JOIN `card_type` ON `user_card`.`card_type_card_type_id` = `card_type`.`card_type_id` WHERE `user_card`.`users_username` = '" . $user["username"] . "'");

                        if ($getCard->num_rows == 0) {

                        ?>
                            <div class="col-12 mt-5 d-flex flex-column gap-3 justify-content-center align-items-center">
                                <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
                                <h5 class="text-secondary">not alivibal</h5>
                            </div>

                            <?php

                        } else {

                            for ($i = 0; $i < $getCard->num_rows; $i++) {

                                $row = $getCard->fetch_assoc();


                            ?>

                                <div class="col-12 mt-3 d-flex justify-content-between align-items-center">

                                    <div class="d-flex gap-1 mt-2 justify-content-center align-items-center gap-2">
                                        <div>
                                            <?php

                                            if ($row["card_type_card_type_id"] == "1") {


                                            ?>
                                                <img src="resources/image/vcard.png" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="resources/image/mCard.png" />
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <label class="fs-5 fw-bold"><?php echo ($row["card_type_name"]); ?></label>
                                            <small><?php echo ($row["card_no"]); ?></small>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-danger bi bi-trash3" onclick="deleteCard(<?php echo ($row['card_no']); ?>);"> Delete</button>
                                    </div>
                                </div>

                        <?php

                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- Saved Cards -->

                <!-- Settings -->
                <div class="col d-none" id="se">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-dark fs-3 jost-bold">Setting</label>
                        </div>
                    </div>
                </div>
                <!-- Setting -->

            </div>
        </div>

        <!-- Modal View Order -->
        <div class="modal fade" id="ViewOrderModle" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="orderid"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="item-body">

                    </div>

                </div>
            </div>
        </div>
        <!-- Modal UpDate Img -->

        <!-- Modal UpDate Img -->
        <div class="modal fade" id="UpDateImg" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Update Profile image</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" class="form-control" accept=".png,.jpeg,.jpg" id="new_img" />
                        <small>Accept : png or jpeg only</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="updateProfileImg(2);">Remove</button>
                        <button type="button" class="btn btn-dark" onclick="updateProfileImg(1);">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal UpDate Img -->

        <!--  modal add new address-->
        <?php include "add-new-address-modle.php"; ?>
        <!--  modal add new address-->

        <!-- Modal add new card -->
        <div class="modal fade" id="addNewCard" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Card</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-12 mt-2">
                                    <label for="c_no" class="form-label">Card Number <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="c_no" required />
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="c_name" class="form-label">Name on the Card <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="c_name" required />
                                </div>

                                <div class="col-6 mt-2">
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
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-dark" onclick="saveCard();">Save</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal add new card -->


        <?php include  "footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>

    <?php
    }
    ?>
</body>

</html>