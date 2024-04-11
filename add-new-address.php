<?php

session_start();

$name = $_POST["name"];
$mobile = $_POST["mobile"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$district = $_POST["district"];
$city = $_POST["city"];
$zip_pin = $_POST["zip_pin"];
$is_default = $_POST["is_default"];

if ($name == "") {
    echo ("address name is required");
} else if ($mobile == "") {
    echo ("Mobile is required");
} else if (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo ("Invalid mobile number");
} else if ($line1 == "") {
    echo ("address line one is required");
} else if ($line2 == "") {
    echo ("address line two is required");
} else if ($district == "" || $district == "0") {
    echo ("Pleas select district from the list");
} else if ($city == "" || $city == "0") {
    echo ("Please select city name");
} else if ($zip_pin == "") {
    echo ("Zip code / Pincode is required");
} else {

    include "connecton.php";

    $checkAddress = Database::search("SELECT * FROM `user_address` WHERE `user_address`.`address_mobile` = '" . $mobile . "' OR `user_address`.`address_name` = '" . strtolower(preg_replace('/\s+/', ' ', $name)) . "';");

    if ($checkAddress->num_rows == 0) {

        Database::iud("INSERT INTO `user_address` (`line_1`,
        `line_2`,
        `city_city_id`,
        `stetus_stetus_id`,
        `users_username`,
        `address_name`,
        `address_mobile`) 
        VALUES('" . $line1 . "',
        '" . $line2 . "',
        '" . $city . "',
        '" . $is_default . "',
        '" . $_SESSION["user"]["username"] . "',
    '" . strtolower(preg_replace('/\s+/', ' ', $name)) . "',
'" . $mobile . "');");

        echo "ok";
    } else {
        $row = $checkAddress->fetch_assoc();

        if ($row["address_name"] == strtolower(preg_replace('/\s+/', ' ', $name))) {
            echo "Already exist address with this name";
        } else if ($row["address_mobile"] == $mobile) {
            echo ("This mobile number already used for another address.");
        }
    }
}
