<?php

session_start();

if (isset($_SESSION["user"])) {

    if ($_POST["id"] !== "") {
        include "connecton.php";
        Database::iud("DELETE FROM `cart` WHERE  `cart`.`cart_item_id` = '" . $_POST["id"] . "';");

        echo ("ok");
    }
} else {
    header("Location: login.php");
}
