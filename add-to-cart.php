<?php

session_start();

if (isset($_SESSION["user"])) {

    if ($_POST["id"] == "") {
        echo ("item not found!");
    } else if (!isset($_POST["size_id"])) {
        echo ("Plese select your size");
    } else if (empty($_POST["size_id"])) {
        echo ("Plese select your size");
    } else if ($_POST["size_id"] == "0") {
        echo ("Plese select your size");
    } else {

        include "connecton.php";

        $checkCart = Database::search("SELECT * FROM `cart` WHERE `cart`.`users_username` = '" . $_SESSION["user"]["username"] . "' AND `cart`.`product_id` = '" . $_POST["id"] . "' AND `cart`.`product_size_size_id` = '" . $_POST["size_id"] . "';");

        if ($checkCart->num_rows == 0) {

            $getQTY = Database::search("SELECT `product`.`product_qty` FROM `product` WHERE `product`.`id` = '" . $_POST["id"] . "';");

            if ($getQTY->num_rows == 0) {
                echo ("item not found!");
            } else {

                $qty = $getQTY->fetch_assoc()['product_qty'];

                if ($qty >= 2) {
                    Database::iud("INSERT INTO `cart`(`cart`.`users_username`,`cart`.`product_id`,`cart`.`qty`,`cart`.`product_size_size_id`)VALUES('" . $_SESSION["user"]["username"] . "','" . $_POST["id"] . "','1','" . $_POST["size_id"] . "');");
                    echo ("item add to  cart successfully!");
                } else {
                    echo ("there is no item in stock");
                }
            }
        } else {
            echo ("This item is already in your cart!");
        }
    }
} else {
    echo ("Please Login to Continue Shopping");
}
