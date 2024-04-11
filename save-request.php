<?php

session_start();

if (isset($_SESSION["user"])) {

    $msg = $_POST["msg"];
    $type_id = $_POST["type_id"];
    $p_id = $_POST["p_id"];

    if ($type_id == "" || $type_id == "0") {
        echo ("Plase select request type!");
    } else if ($msg == "") {
        echo ("Plese enter your request!");
    } elseif ($p_id == "") {
        echo ("Product not fund!");
    } else {

        include "connecton.php";

        Database::iud("INSERT INTO `request_product`(`request_product`.`msg`,`request_product`.`date`,
        `request_product`.`request_type_request_type_id`,`request_product`.`stetus_stetus_id`,`request_product`.`product_id`,`request_product`.`users_username`) 
        VALUE ('" . $msg . "','" . date('Y-m-d H:i:s') . "','" . $type_id . "','7','" . $p_id . "','" . $_SESSION["user"]["username"] . "');");

        echo ("Request saved!");
    }
} else {
    header("location: http://localhost/MyShop/login.php");
    exit();
}
