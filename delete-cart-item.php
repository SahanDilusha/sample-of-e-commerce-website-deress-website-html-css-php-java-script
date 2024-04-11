<?php

session_start();

if (isset($_SESSION["user"])) {

    if ($_POST["id"] !== "") {
        include "connecton.php";

        $check = Database::search("SELECT `product`.`id` FROM `product` WHERE `product`.`id` = '" . $_POST["id"] . "';");

        if ($check->num_rows !==0) {
            Database::iud("DELETE FROM `cart` WHERE `cart`.`users_username` ='".$_SESSION["user"]["username"]."' AND `cart`.`product_id` = '".$_POST["id"]."';");

        echo ("ok");
        }

       
    }
} else {
    header("Location: login.php");
}
